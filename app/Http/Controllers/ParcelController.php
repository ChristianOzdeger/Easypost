<?php

namespace App\Http\Controllers;

use App\Models\Parcel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ParcelController extends Controller
{
    public function home_index() {
        $parcels = Parcel::all();
        $nbParcels = count($parcels);
        
        return view('welcome', ['nbParcels' => $nbParcels]);
    }
    
    public function register_index() {
        return view('register');
    }
    
    public function register_new_parcel(Request $request) {
        $trackingNumber = rand(100000000, 999999999);
        $message = "Votre colis a été enregistré. Son numéro est le : $trackingNumber.";

        // Validate form fields
        $validator = Validator::make($request->all(), [
            'address_dep' => 'required|string|max:255',
            'address_arr' => 'required|string|max:255',
            'weight'      => 'required|numeric|min:1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        // Insert into the database
        $parcel = Parcel::create([
            'address_dep'     => $request->address_dep,
            'address_arr'     => $request->address_arr,
            'weight'          => $request->weight,
            'tracking_number' => $trackingNumber,
        ]);

        return view('register', ['message' => $message]);
    }

    public function tracking_index() {
        return view('tracking');
    }

    public function tracking_search(Request $request) {
        $validator = Validator::make($request->all(), [
            'tracking_number' => 'required|numeric|min:1',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $trackingNumber = $request->tracking_number;
        $parcel = Parcel::where('tracking_number', $trackingNumber)->first();
        
        if (!$parcel) {
            return redirect()->back()->with('error', "Aucun colis comportant ce numéro de suivi n'a été trouvé.");
        }

        return view('tracking', ['parcel' => $parcel]);
    }
}
