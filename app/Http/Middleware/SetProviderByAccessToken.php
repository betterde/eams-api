<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use League\OAuth2\Server\ResourceServer;
use Symfony\Bridge\PsrHttpMessage\Factory\DiactorosFactory;

class SetProviderByAccessToken
{
    private $server;

    /**
     * @param ResourceServer $server
     */
    public function __construct(ResourceServer $server)
    {
        $this->server = $server;
    }


    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $psr = (new DiactorosFactory)->createRequest($request);

        try {
            $psr = $this->server->validateAuthenticatedRequest($psr);
            $token_id = $psr->getAttribute('oauth_access_token_id');
            if ($token_id) {
                $access_token = DB::table('oauth_access_token_providers')->where('oauth_access_token_id', $token_id)->first();

                if ($access_token) {
                    Config::set('auth.guards.api.provider', $access_token->provider);
                }
            }
        } catch (Exception $e) {

        }

        return $next($request);
    }
}
