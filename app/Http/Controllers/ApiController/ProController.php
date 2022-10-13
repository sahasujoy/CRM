<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use App\Models\Building;
use Illuminate\Http\Request;
use App\Models\Flat;
use App\Models\Land;
use Illuminate\Support\Facades\Storage;

class ProController extends Controller
{
    //:::::::::::::::::::::::::::::::::::::: Land Methods ::::::::::::::::::::::::::::::::::::::::::::::
    public function landViewApi()
    {
        $lands = Land::all();
        return $lands;
    }

    public function storeLandApi(Request $req)
    {
        // print_r($_POST); // print js console.log
        // print_r($_FILES); // print js console.log
        $file = $req->file('image');
        $filename = '';
        if ($file) {
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $filename);
        } else {
            $filename = '';
        }

        $landData = [
            'mouza_name' => $req->mouza_name,
            'size' => $req->size,
            'kcs' => $req->kcs,
            'ksa' => $req->ksa,
            'krs' => $req->krs,
            'kbs' => $req->kbs,
            'dcs' => $req->dcs,
            'dsa' => $req->dsa,
            'drs' => $req->drs,
            'dbs' => $req->dbs,
            'address' => $req->address,
            'image' => $filename,
        ];

        Land::create($landData);
        return response()->json([
            'status' => 200
        ]);
    }

    public function editLandApi($id)
    {
        $land = Land::find($id);
        return response()->json($land);
    }

    public function updateLandApi(Request $req, $id)
    {
        $filename = '';
        $land = Land::find($id);
        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $filename);
            if ($land->image) {
                Storage::delete('public/images', $land->image);
            }
        } else {
            $filename = $req->image;
        }
        $landData = [
            'mouza_name' => $req->mouza_name,
            'size' => $req->size,
            'kcs' => $req->kcs,
            'ksa' => $req->ksa,
            'krs' => $req->krs,
            'kbs' => $req->kbs,
            'dcs' => $req->dcs,
            'dsa' => $req->dsa,
            'drs' => $req->drs,
            'dbs' => $req->dbs,
            'address' => $req->address,
            'image' => $filename,
        ];

        $land->update($landData);
        return response()->json([
            'status' => 200,
            'message' => "Land data updated successfully!"
        ]);
    }

    public function deleteLandApi($id)
    {
        $land = Land::find($id);
        if ($land) {
            $land->delete();
            return response()->json([
                'message' => "Land Deleted Successfully!",
                'status' => 200
            ]);
        } else {
            return response()->json([
                'message' => "Land with id:$id does not exist!"
            ]);
        }
    }

    //:::::::::::::::::::::::::::::::::::: Building Methods ::::::::::::::::::::::::::::::::::::::
    public function buildingView()
    {
        $buildings = Building::with('lands')->get();
        return response()->json($buildings);
    }

    public function storeBuilding(Request $req)
    {
        $buildingData = [
            'land_id' => $req->land_id,
            'name' => $req->name,
            'road_no' => $req->road_no,
            'no' => $req->no,
            'face_direction' => $req->face_direction,
            'location' => $req->location,
            'floors' => $req->floors,
            'flats' => $req->flats,
            'start_date' => $req->start_date,
            'complete_date' => $req->complete_date,
            'complete_extended_date' => $req->complete_extended_date,
        ];

        Building::create($buildingData);
        return response()->json([
            'status' => 200
        ]);
    }

    public function editBuilding($id)
    {
        $building = Building::find($id);
        return response()->json($building);
    }

    public function updateBuilding(Request $req, $id)
    {
        $building = Building::find($id);
        $buildingData = [
            'land_id' => $req->land_id,
            'name' => $req->name,
            'road_no' => $req->road_no,
            'no' => $req->no,
            'face_direction' => $req->face_direction,
            'location' => $req->location,
            'floors' => $req->floors,
            'flats' => $req->flats,
            'start_date' => $req->start_date,
            'complete_date' => $req->complete_date,
            'complete_extended_date' => $req->complete_extended_date,
        ];

        $building->update($buildingData);
        return response()->json([
            'status' => 200,
            'message' => "Building data updated successfully!"
        ]);
    }

    public function deleteBuilding($id)
    {
        $building = Building::find($id);
        if ($building) {
            $building->delete();
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


    //:::::::::::::::::::::::::::::::::::: Flat Methods ::::::::::::::::::::::::::::::::::::::::::
    public function flatView()
    {
        $flats = Flat::with('building')->get();
        return response()->json($flats);
    }

    public function storeFlat(Request $req)
    {
        $flatData = [
            'building_id' => $req->building_id,
            'no' => $req->no,
            'floor' => $req->floor,
            'face_direction' => $req->face_direction,
            'size' => $req->size,
            'sell_status' => $req->sell_status,
        ];


        Flat::create($flatData);
        return response()->json([
            'status' => 200
        ]);
    }

    public function editFlat($id)
    {
        $flat = Flat::find($id);
        return response()->json($flat);
    }

    public function updateFlat(Request $req, $id)
    {
        $flat = Flat::find($id);
        $flatData = [
            'building_id' => $req->building_id,
            'no' => $req->no,
            'floor' => $req->floor,
            'face_direction' => $req->face_direction,
            'size' => $req->size,
            'sell_status' => $req->sell_status,
        ];

        $flat->update($flatData);
        return response()->json([
            'status' => 200,
            'message' => "Flat data updated successfully!"
        ]);
    }

    public function deleteFlat($id)
    {
        $flat = Flat::find($id);
        if ($flat) {
            $flat->delete();
            return response()->json([
                'message' => "Flat Data Deleted Successfully!",
                'status' => 200
            ]);
        } else {
            return response()->json([
                'message' => "Flat with id:$id does not exist!"
            ]);
        }
    }

    //::::::::::::::::::::::::::::::::::::::: Building and Flat Details ::::::::::::::::::::::::::::::::::::::::::::
    public function bnfDetails()
    {
        // $flat = Flat::where('building_id', 1)->where('sell_status', 'Unsold')->count();
        // dd($flat);
        $buildings = Building::withcount(['flats as no_of_sold'=>function($query)
        {
            $query->where('sell_status', 'Sold');
        }, 'flats as no_of_unsold' => function($query)
        {
            $query->where('sell_status', 'Unsold');
        }])->get();
        // dd($buildings);
        $count = 0;
        $lands = Land::all();
        // return view('property.bnf_details', compact('buildings', 'count', 'lands'));
        return response()->json(['buildings' => $buildings, 'count' => $count, 'lands' => $lands]);
    }
}
