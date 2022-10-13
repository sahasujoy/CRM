<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Price;
use App\Models\Registration;
use Illuminate\Http\Request;

class PriceController extends Controller
{
        //
        public function regPriceView()
        {
            $customers = Customer::all();
            return view('price.regprices', compact('customers'));
        }

        public function flatPriceView()
        {
            $customers = Customer::all();
            return view('price.flatprices', compact('customers'));
        }

        public function storePrice(Request $req)
        {
        $priceData = [
            'registration_id' => $req->registration_id,
            'land_reg_cost' => $req->land_reg_cost,
            'mutation_cost' => $req->mutation_cost,
            'flat_reg_cost' => $req->flat_reg_cost,
            'poa_cost' => $req->poa_cost,
            'flat_price' => $req->flat_price,
            'utility_charge' => $req->utility_charge,
            'car_parking' => $req->car_parking,
            'additional_cost' => $req->additional_cost,
            'installments' => $req->installments,
        ];

        Price::create($priceData);
        return response()->json([
            'status' => 200
        ]);
        }

    //fetch all employee
    public function fetchAllRegPrices()
    {
        $regprices = Price::with('customer')->get();
        // print_r($engs);
        // echo $engs;
        return response()->json($regprices);
    }

    public function fetchAllFlatPrices()
    {
        $flatprices = Price::with('customer')->get();
        // print_r($engs);
        // echo $engs;
        return response()->json($flatprices);
    }

    public function editPrice($id)
    {
        $price = Price::find($id);
        return response()->json($price);
    }

    public function updatePrice(Request $req, $id)
    {
        $price = Price::find($id);
        $priceData = [
            'registration_id' => $req->registration_id,
            'land_reg_cost' => $req->land_reg_cost,
            'mutation_cost' => $req->mutation_cost,
            'flat_reg_cost' => $req->flat_reg_cost,
            'poa_cost' => $req->poa_cost,
            'flat_price' => $req->flat_price,
            'utility_charge' => $req->utility_charge,
            'car_parking' => $req->car_parking,
            'additional_cost' => $req->additional_cost,
            'installments' => $req->installments,
        ];

        $price->update($priceData);
        return response()->json([
            'status' => 200,
            'message' => "Price data updated successfully!"
        ]);
    }

    public function deletePrice($id)
    {
        $price = Price::find($id);
        if ($price) {
            $price->delete();
            return response()->json([
                'message' => "Building Data Deleted Successfully!",
                'status' => 200
            ]);
        } else {
            return response()->json([
                'message' => "Building with id:$id does not exist!"
            ]);
        }
    }
}
