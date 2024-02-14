<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\Reservation;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class ReservationsController extends BaseController
{
    
    use AuthorizesRequests, ValidatesRequests;
    
    public function show()
    {
        // display data
        $Reservations = Reservation::all();

        return Inertia::render('Reservations', [
            'Reservations' => $Reservations
        ]);
    
    }

    public function edit()
    {
        // Get id which computer will delete
      $theID = request('index');
      // find the data using laravel eloquent Model 
      $theData = Reservation::find($theID);
      // change each designated 
      $theData->person = request('person');
      $theData->status_id = request('status_id');
      $theData->bill = request('bill');
      $theData->date = request('date');
      return redirect()->back();
    }


    public function delete()
    {
      $theID = request('index');
      Reservation::destroy($theID);
      return redirect()->back();
    }

   
}
    





