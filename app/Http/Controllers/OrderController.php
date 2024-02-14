<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Spot;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Inertia\Inertia;

class OrderController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function show ()
    {
        $spot = Spot::find(request('index')); 
        return Inertia::render('Order',
        [
            "spot"=>$spot,
        ]);
    }

    public function insert ()
    {
        date_default_timezone_set("Asia/Jakarta");

        $newData = new Reservation;
        $newData->id = request ('customer').'/'.date("dmY").'/'.date("Hms");
        $newData->customer = request ('customer');
        $newData->spot_id = request ('spot_id');
        $newData->status_id = request ('status_id');
        $newData->date = request ('date');
        $newData->person = request ('person');
        $newData->bill = request ('bill');
        $newData->save();

       session([
         'code' => request('customer').'/'.date("dmY").'/'.date("Hms"),
         'name' => request('customer'),
         'bill' => request('bill'),
         'date' => request('date')
       ]);
       
       return redirect('/');
    }
}