<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Spot;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class DashboardController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    
    public function show()
    {
        $spotCount = Spot::all()->count();
        $transactionCount = Reservation::all()->count();
        $totalIncome= Reservation::all()->sum('bill');
        $userCount = User::all()->count();
        $topSpots = DB::select('SELECT name as pleace,(SELECT COUNT(customer) FROM reservations WHERE reservations.spot_id=spots.id) as total FROM spots ORDER BY total DESC; ');

        return Inertia::render('Dashboard',[
            "spotCount" => $spotCount,
            "transactionCount" => $transactionCount,
            "totalIncome" => $totalIncome,
            "userCount" => $userCount,
            "topSpots" => $topSpots,
        ]);
    }
}
