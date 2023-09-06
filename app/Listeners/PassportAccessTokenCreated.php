<?php

namespace App\Listeners;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PassportAccessTokenCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $guard = Config::get('auth.passport.guard');
        $provider = Config::get('auth.guards.' . $guard . '.provider');

        DB::table('oauth_access_token_providers')->insert([
            "oauth_access_token_id" => $event->tokenId,
            "provider" => $provider,
            "created_at" => new Carbon(),
            "updated_at" => new Carbon()
        ]);
    }
}
