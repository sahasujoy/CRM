<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Payment;
use App\Models\Registration;
use Illuminate\Http\Request;

class DueController extends Controller
{
    //
    public function regDueView()
    {
        return view('due.regdues');
    }

    public function flatDueView()
    {
        return view('due.flatdues');
    }
    public function fetchAllRegDues()
    {
        $customers = Customer::with('prices')->with('payments')->has('prices')->has('payments')->get();
        // print_r($engs);
        // echo $engs;
        return response()->json($customers);
    }

    public function fetchAllFlatDues()
    {
        $customers = Customer::with('prices')->with('payments')->has('prices')->has('payments')->get();
        // print_r($engs);
        // echo $engs;
        return response()->json($customers);
    }
}
