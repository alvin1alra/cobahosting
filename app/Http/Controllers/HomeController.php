<?php

namespace App\Http\Controllers;

use App\Models\Spot;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Inertia\Inertia;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

class HomeController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function show()
    {
        $spots = Spot::all();

        if (session('code')) {

            return Inertia::render(
                'Welcome',
                [
                    "spots" => $spots,
                    'canLogin' => Route::has('login'),
                    'canRegister' => Route::has('register'),
                    'laravelVersion' => Application::VERSION,
                    'phpVersion' => PHP_VERSION,
                    'code' => session('code'),
                    'customer' => session('customer'),
                    'bill' => session('bill'),
                    'date' => session('date'),
                    'name' => session('name'),
                ]
            );
        } else {
            return Inertia::render(
                'Welcome',
                [
                    "spots" => $spots,
                    'canLogin' => Route::has('login'),
                    'canRegister' => Route::has('register'),
                    'laravelVersion' => Application::VERSION,
                    'phpVersion' => PHP_VERSION,
                ]
            );
        }
    }
}
