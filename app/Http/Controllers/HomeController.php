<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Home\HomeResource;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Services\HomeService;

class HomeController extends Controller
{
    //

    public function index()
    {
        $home = HomeService::index();
        return $home;
    }
}
