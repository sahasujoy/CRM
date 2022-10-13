<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Payment;
use App\Models\Registration;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function regPaymentView()
    {
        $customers = Customer::all();
        return view('payment.regpayments', compact('customers'));
    }

    public function flatPaymentView()
    {
        $customers = Customer::all();
        return view('payment.flatpayments', compact('customers'));
    }

    //fetch all employee
    public function fetchAllRegPayments()
    {
        $regpayments = Payment::with('customer')->get();
        // print_r($engs);
        // echo $engs;
        return response()->json($regpayments);
    }

    public function fetchAllFlatPayments()
    {
        $flatpayments = Payment::with('customer')->get();
        // print_r($engs);
        // echo $engs;
        return response()->json($flatpayments);
    }

    public function storePayment(Request $req)
    {
        $paymentData = [
            'registration_id' => $req->registration_id,
            'land_reg_cost' => $req->land_reg_cost,
            'mutation_cost' => $req->mutation_cost,
            'flat_reg_cost' => $req->flat_reg_cost,
            'poa_cost' => $req->poa_cost,
            'booking_money' => $req->booking_money,
            'downpayment' => $req->downpayment,
            'land_piling_money1' => $req->land_piling_money1,
            'land_piling_money2' => $req->land_piling_money2,
            'building_piling' => $req->building_piling,
            'first_roof_cast' => $req->first_roof_cast,
            'top_roof_cast' => $req->top_roof_cast,
            'final_work_cost' => $req->final_work_cost,
            'car_parking' => $req->car_parking,
            'installments' => $req->installments,
        ];

        Payment::create($paymentData);
        return response()->json([
            'status' => 200
        ]);
    }

    public function editPayment($id)
    {
        $payment = Payment::find($id);
        return response()->json($payment);
    }

    public function updatePayment(Request $req, $id)
    {
        $payment = Payment::find($id);
        $paymentData = [
            'registration_id' => $req->registration_id,
            'land_reg_cost' => $req->land_reg_cost,
            'mutation_cost' => $req->mutation_cost,
            'flat_reg_cost' => $req->flat_reg_cost,
            'poa_cost' => $req->poa_cost,
            'booking_money' => $req->booking_money,
            'downpayment' => $req->downpayment,
            'land_piling_money1' => $req->land_piling_money1,
            'land_piling_money2' => $req->land_piling_money2,
            'building_piling' => $req->building_piling,
            'first_roof_cast' => $req->first_roof_cast,
            'top_roof_cast' => $req->top_roof_cast,
            'final_work_cost' => $req->final_work_cost,
            'car_parking' => $req->car_parking,
            'installments' => $req->installments,
        ];

        $payment->update($paymentData);
        return response()->json([
            'status' => 200,
            'message' => "Payment data updated successfully!"
        ]);
    }

    public function deletePayment($id)
    {
        $payment = Payment::find($id);
        if ($payment) {
            $payment->delete();
            return response()->json([
                'message' => "Payment Data Deleted Successfully!",
                'status' => 200
            ]);
        } else {
            return response()->json([
                'message' => "Payment with id:$id does not exist!"
            ]);
        }
    }
}
