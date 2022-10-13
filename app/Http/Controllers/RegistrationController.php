<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Flat;
use App\Models\FlatRegistration;
use App\Models\Registration;
use App\Models\Status;
use Illuminate\Http\Request;
use App\Models\LandRegistration;
use App\Models\MutationRegistration;
use App\Models\PoaRegistration;
use Doctrine\DBAL\Query;

class RegistrationController extends Controller
{
    //:::::::::::::::::::::::::::::::::::: POA Details ::::::::::::::::::::::::::::::::::::::::::::::::
    public function poaDetailsView()
    {
        return view('registration.poa_details');
    }

    public function poaDetails()
    {
        $customer = Customer::all();
        $poa_reg_details = PoaRegistration::with('customer', 'customer.building')->get();
        return response()->json(['customer' => $customer, 'poa_reg_details' => $poa_reg_details]);
    }

    public function storePoaDetails(Request $req)
    {
        // dd($req->customer_id);
        $regDetailsData = [
            'customer_id' => $req->customer_id,
            'poa_reg_date' => $req->poa_reg_date,
            'poa_reg_sub_deed_no' => $req->poa_reg_sub_deed_no,
            'individual_land_size' => $req->individual_land_size,
            'mouza_name' => $req->mouza_name,
            'poa_dcs' => $req->poa_dcs,
            'poa_dsa' => $req->poa_dsa,
            'poa_drs' => $req->poa_drs,
            'poa_dbs' => $req->poa_dbs,
            'poa_kcs' => $req->poa_kcs,
            'poa_ksa' => $req->poa_ksa,
            'poa_krs' => $req->poa_krs,
            'poa_kbs' => $req->poa_kbs,
        ];

        PoaRegistration::create($regDetailsData);
        return response()->json([
            'status' => 200
        ]);
    }

    //:::::::::::::::::::::::::::::::::::: Mutation Details ::::::::::::::::::::::::::::::::::::::::::::::::
    public function mutationDetailsView()
    {
        return view('registration.mutation_details');
    }

    public function mutationDetails()
    {
        $customer = Customer::all();
        $mutation_reg_details = MutationRegistration::with('customer', 'customer.building')->get();
        return response()->json(['customer' => $customer, 'mutation_reg_details' => $mutation_reg_details]);
    }

    public function storeMutationDetails(Request $req)
    {
        // dd($req->customer_id);
        $regDetailsData = [
            'customer_id' => $req->customer_id,
            'mutation_reg_date' => $req->mutation_reg_date,
            'mutation_misscase_no' => $req->mutation_misscase_no,
            'individual_land_size' => $req->individual_land_size,
            'mutation_dcs' => $req->mutation_dcs,
            'mutation_dsa' => $req->mutation_dsa,
            'mutation_drs' => $req->mutation_drs,
            'mutation_dbs' => $req->mutation_dbs,
            'mutation_kcs' => $req->mutation_kcs,
            'mutation_ksa' => $req->mutation_ksa,
            'mutation_krs' => $req->mutation_krs,
            'mutation_kbs' => $req->mutation_kbs,
        ];

        MutationRegistration::create($regDetailsData);
        return response()->json([
            'status' => 200
        ]);
    }


    //:::::::::::::::::::::::::::::::::::: Land Details ::::::::::::::::::::::::::::::::::::::::::::::::
    public function landDetailsView()
    {
        return view('registration.land_details');
    }

    public function landDetails()
    {
        $customer = Customer::all();
        $land_reg_details = LandRegistration::with('customer', 'customer.building')->get();
        return response()->json(['customer' => $customer, 'land_reg_details' => $land_reg_details]);
    }

    public function storeLandDetails(Request $req)
    {
        // dd($req->customer_id);
        $regDetailsData = [
            'customer_id' => $req->customer_id,
            'land_reg_date' => $req->land_reg_date,
            'land_reg_sub_deed_no' => $req->land_reg_sub_deed_no,
            'individual_land_size' => $req->individual_land_size,
            'mouza_name' => $req->mouza_name,
            'land_dcs' => $req->land_dcs,
            'land_dsa' => $req->land_dsa,
            'land_drs' => $req->land_drs,
            'land_dbs' => $req->land_dbs,
            'land_kcs' => $req->land_kcs,
            'land_ksa' => $req->land_ksa,
            'land_krs' => $req->land_krs,
            'land_kbs' => $req->land_kbs,
        ];

        LandRegistration::create($regDetailsData);
        return response()->json([
            'status' => 200
        ]);
    }

    //::::::::::::::::::::::::::::::::::::::: Flat Details ::::::::::::::::::::::::::::::::::::::::::
    public function flatDetailsView()
    {
        return view('registration.flat_details');
    }

    public function flatDetails()
    {
        $customer = Customer::all();
        $flat_reg_details = FlatRegistration::with('customer')->get();
        return response()->json(['customer' => $customer, 'flat_reg_details' => $flat_reg_details]);
    }

    public function storeFlatDetails(Request $req)
    {
        // dd($req->customer_id);
        $regDetailsData = [
            'customer_id' => $req->customer_id,
            'flat_reg_date' => $req->flat_reg_date,
            'flat_reg_sub_deed_no' => $req->flat_reg_sub_deed_no,
            'flat_size' => $req->flat_size,
            'land_size' => $req->land_size,
            'mouza_name' => $req->mouza_name,
            'flat_dcs' => $req->flat_dcs,
            'flat_dsa' => $req->flat_dsa,
            'flat_drs' => $req->flat_drs,
            'flat_dbs' => $req->flat_dbs,
            'flat_kcs' => $req->flat_kcs,
            'flat_ksa' => $req->flat_ksa,
            'flat_krs' => $req->flat_krs,
            'flat_kbs' => $req->flat_kbs,
        ];

        FlatRegistration::create($regDetailsData);
        return response()->json([
            'status' => 200
        ]);
    }


    public function registrationView()
    {
        $customers = Customer::all();
        $flats = Flat::all();
        return view('registration.registrations', compact('customers', 'flats'));
    }

    public function storeRegistration(Request $req)
    {
    // print_r($_POST); // print js console.log
    // print_r($_FILES); // print js console.log

    $registrationData = [
        'file_no' => $req->file_no,
        'customer_id' => $req->customer_id,
        'flat_id' => $req->flat_id,
        'date' => $req->date,
        'sub_deed_no' => $req->sub_deed_no,
    ];

    Registration::create($registrationData);
    return response()->json([
        'status' => 200
    ]);
    }

//fetch all employee
public function fetchAllRegistrations()
{
    $registrations = Registration::all();
    // print_r($engs);
    // echo $engs;
    $output = '';
    if($registrations->count() > 0)
    {
        // text-center is cut from table class
        $output .= '<table class="table table-dark table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">File No.</th>
            <th scope="col">Customer ID</th>
            <th scope="col">Flat No.</th>
            <th scope="col">Flat Registration Date</th>
            <th scope="col">Flat Reg. Sub-Deed No.</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>';
        foreach($registrations as $registration)
        {
          $output .= '<tr>
          <td>' .$registration->id. '</td>
          <td>' .$registration->file_no. '</td>
          <td>' .$registration->customer_id.'</td>
          <td>' .$registration->flat_id. '</td>
          <td>' .$registration->date. '</td>
          <td>' .$registration->sub_deed_no. '</td>
          <td>
            <a href="#" id="' .$registration->id. '" class = "text-success mx-1 editIcon" data-bs-toggle = "modal" data-bs-target = "#editEngineerModal"><i class = "bi-pencil-square h4"></i></a>
            <a href="#" id="' .$registration->id. '" class = "text-danger mx-1 deleteIcon"><i class = "bi-trash h4"></i></a>
            <a href="/registration_details/'.$registration->id.' " id="' .$registration->id. '" class = "text-danger mx-1 displayIcon"><i class="bi-display h4"></i></a>
          </td>
        </tr>';
        }
        $output .= '</tbody>
        </table>';
        echo $output;
    }
    else
    {
        echo '<h1 class = "text-center text-secondary my-5">No record present in the database!</h1>';
    }
}

    public function registrationDetails($id)
    {
        $reg = Registration::find($id);
        $customer = Customer::where('id', $reg->customer_id)->first();
        $flat = Flat::where('id', $reg->flat_id)->first();
        return view('registration.details', compact('reg', 'customer', 'flat'));
    }

    public function statusView()
    {
        $registrations = Customer::all();
        return view('registration.statuses', compact('registrations'));
    }

    public function storeStatus(Request $req)
    {
    // print_r($_POST); // print js console.log
    // print_r($_FILES); // print js console.log

    $statusData = [
        'registration_id' => $req->registration_id,
        'booking_date' => $req->booking_date,
        'land_status' => $req->land_status,
        'flat_status' => $req->flat_status,
        'mutation_status' => $req->mutation_status,
        'poa_status' => $req->poa_status,
    ];

    Status::create($statusData);
    return response()->json([
        'status' => 200
    ]);
    }

//fetch all employee
public function fetchAllStatuses()
{
    $statuses = Status::all();
    // print_r($engs);
    // echo $engs;
    $output = '';
    if($statuses->count() > 0)
    {
        // text-center is cut from table class
        $output .= '<table class="table table-secondary table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Customer\'s Booking Date</th>
            <th scope="col">Customer\'s Email</th>
            <th scope="col">Customer\'s Name</th>
            <th scope="col">Customer\'s ID</th>
            <th scope="col">Customer\'s Address</th>
            <th scope="col">Registration File No.</th>
            <th scope="col">Customer Land Registration Status</th>
            <th scope="col">Customer Flat Registration Status</th>
            <th scope="col">Customer Mutation Cost Status</th>
            <th scope="col">Customer Power of Attorney Cost Status</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>';
        foreach($statuses as $status)
        {
          $output .= '<tr>
          <td>' .$status->id. '</td>
          <td>' .$status->booking_date. '</td>
          <td>' .$status->customer->email. '</td>
          <td>' .$status->customer->name1. '</td>
          <td>' .$status->customer->customer_id. '</td>
          <td>' .$status->customer->mailing_address. '</td>
          <td>' .$status->customer->file_no. '</td>
          <td>' .$status->land_status.'</td>
          <td>' .$status->flat_status. '</td>
          <td>' .$status->mutation_status. '</td>
          <td>' .$status->poa_status. '</td>
          <td>
            <a href="#" id="' .$status->id. '" class = "text-success mx-1 editIcon" data-bs-toggle = "modal" data-bs-target = "#editEngineerModal"><i class = "bi-pencil-square h4"></i></a>
            <a href="#" id="' .$status->id. '" class = "text-danger mx-1 deleteIcon"><i class = "bi-trash h4"></i></a>
          </td>
        </tr>';
        }
        $output .= '</tbody>
        </table>';
        echo $output;
    }
    else
    {
        echo '<h1 class = "text-center text-secondary my-5">No record present in the database!</h1>';
    }
}

}
