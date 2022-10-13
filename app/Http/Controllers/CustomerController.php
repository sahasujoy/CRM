<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Customer;
use App\Models\Flat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    //
    public function customerView()
    {
        $buildings = Building::all();
        return view('customer.customers', compact('buildings'));
    }

    public function getFlats($building_id)
    {
        $flats = Flat::where('building_id', $building_id)->where('sell_status', 'Unsold')->get();
        return response()->json($flats);
    }

    public function getFlatSize($flat_id)
    {
        $flat = Flat::find($flat_id);
        return $flat->size;

    }

    public function storeCustomer(Request $req)
    {
        // print_r($_POST); // print js console.log
        // print_r($_FILES); // print js console.log
        $file1 = $req->file('customer_image');
        $customer_image = 'customer-'. time() . '.' . $file1->getClientOriginalExtension();
        $file1->storeAs('public/images', $customer_image);

        $file2 = $req->file('nominee_image');
        $nominee_image = 'nominee-'. time() . '.' . $file2->getClientOriginalExtension();
        $file2->storeAs('public/images', $nominee_image);

        $file3 = $req->file('agreements');
        $agreements = 'agreement-'. time() . '.' . $file3->getClientOriginalExtension();
        $file3->storeAs('public/images', $agreements);

        $customerData = [
            'file_no' => $req->file_no,
            'name1' => $req->name1,
            'customer_id' => $req->customer_id,
            'father_name1' => $req->father_name1,
            'mother_name1' => $req->mother_name1,
            'hus_wife_name' => $req->hus_wife_name,
            'relationship' => $req->relationship,
            'nid_no' => $req->nid_no,
            'date_of_birth' => $req->date_of_birth,
            'phone' => $req->phone,
            'others_file_no' => $req->others_file_no,
            'name2' => $req->name2,
            'father_name2' => $req->father_name2,
            'booking_date' => $req->booking_date,
            'profession' => $req->profession,
            'designation' => $req->designation,
            'email' => $req->email,
            'mailing_address' => $req->mailing_address,
            'permanent_address' => $req->permanent_address,
            'office_address' => $req->office_address,
            'country' => $req->country,
            'nominee_name' => $req->nominee_name,
            'relation_with_nominee' => $req->relation_with_nominee,
            'nominee_phone' => $req->nominee_phone,
            'nominee_address' => $req->nominee_address,
            'nominee_gets' => $req->nominee_gets,
            'building_no' => $req->building_no,
            'flat_no' => $req->flat_no,
            'flat_size' => $req->flat_size,
            'media_name' => $req->media_name,
            'media_phone' => $req->media_phone,
            'customer_image' => $customer_image,
            'nominee_image' => $nominee_image,
            'agreements' => $agreements,
        ];

        Customer::create($customerData);
        return response()->json([
            'status' => 200
        ]);
    }

//fetch all employee
public function fetchAllCustomers()
{
    $customers = Customer::all();
    return $customers;
}

public function editCustomer($id)
{
    $customer = Customer::find($id);
    return response()->json($customer);
}

public function updateCustomer(Request $req, $id)
{
    $customer = Customer::find($id);
    if ($req->hasFile('customer_image')) {
        $file1 = $req->file('customer_image');
        $customer_image = 'customer-' . time() . '.' . $file1->getClientOriginalExtension();
        $file1->storeAs('public/images', $customer_image);
        if ($customer->customer_image) {
            Storage::delete('public/images', $customer->customer_image);
        }
    } else {
        $customer_image = $req->customer_image;
    }

    if ($req->hasFile('nominee_image')) {
        $file2 = $req->file('nominee_image');
        $nominee_image = 'nominee-' . time() . '.' . $file2->getClientOriginalExtension();
        $file2->storeAs('public/images', $nominee_image);
        if ($customer->nominee_image) {
            Storage::delete('public/images', $customer->nominee_image);
        }
    } else {
        $nominee_image = $req->nominee_image;
    }

    if ($req->hasFile('agreements')) {
        $file3 = $req->file('agreements');
        $agreements = 'agreement-' . time() . '.' . $file3->getClientOriginalExtension();
        $file3->storeAs('public/images', $agreements);
        if ($customer->agreements) {
            Storage::delete('public/images', $customer->agreements);
        }
    } else {
        $agreements = $req->agreements;
    }
    $customerData = [
        'file_no' => $req->file_no,
        'name1' => $req->name1,
        'customer_id' => $req->customer_id,
        'father_name1' => $req->father_name1,
        'mother_name1' => $req->mother_name1,
        'hus_wife_name' => $req->hus_wife_name,
        'relationship' => $req->relationship,
        'nid_no' => $req->nid_no,
        'date_of_birth' => $req->date_of_birth,
        'phone' => $req->phone,
        'others_file_no' => $req->others_file_no,
        'name2' => $req->name2,
        'father_name2' => $req->father_name2,
        'booking_date' => $req->booking_date,
        'profession' => $req->profession,
        'designation' => $req->designation,
        'email' => $req->email,
        'mailing_address' => $req->mailing_address,
        'permanent_address' => $req->permanent_address,
        'office_address' => $req->office_address,
        'country' => $req->country,
        'nominee_name' => $req->nominee_name,
        'relation_with_nominee' => $req->relation_with_nominee,
        'nominee_phone' => $req->nominee_phone,
        'nominee_address' => $req->nominee_address,
        'nominee_gets' => $req->nominee_gets,
        'building_no' => $req->building_no,
        'flat_no' => $req->flat_no,
        'flat_size' => $req->flat_size,
        'media_name' => $req->media_name,
        'media_phone' => $req->media_phone,
        'customer_image' => $customer_image,
        'nominee_image' => $nominee_image,
        'agreements' => $agreements,
    ];

    $customer->update($customerData);
    return response()->json([
        'status' => 200,
        'message' => "Customer data updated successfully!"
    ]);
}

public function deleteCustomer($id)
{
    $customer = Customer::find($id);
    if ($customer) {
        $customer->delete();
        if ($customer->customer_image) {
            Storage::delete('public/images', $customer->customer_image);
        }
        if ($customer->nominee_image) {
            Storage::delete('public/images', $customer->nominee_image);
        }
        if ($customer->agreements) {
            Storage::delete('public/images', $customer->agreements);
        }
        return response()->json([
            'message' => "Customer Deleted Successfully!",
            'status' => 200
        ]);
    } else {
        return response()->json([
            'message' => "Customer with id:$id does not exist!"
        ]);
    }
}


    public function customerDetails($id)
    {
        $customer = Customer::with('flat')->find($id);
        return view('customer.customer_details', compact('customer'));
    }

    public function customerDetailsApi($id)
    {
        $customer = Customer::find($id);
        return $customer;
    }
}
