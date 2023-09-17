<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\View;

class IndexController extends Controller
{
    /**
     * Index page view
     *
     * Date: 2020/5/21
     * @return JsonResponse|\Illuminate\View\View
     * @author George
     */
    public function index()
    {
        $view = 'index';
        if (View::exists($view)) {
            return view($view);
        } else {
            return message("The index page does not exist. Please install the front-end dependencies and execute the 'npm run build' or 'yarn build' command to complete, then you can access it.");
        }
    }
}
