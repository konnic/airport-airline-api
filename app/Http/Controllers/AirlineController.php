<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Airline;
use App\Models\Association;
use Illuminate\Http\Request;

class AirlineController extends Controller {
    public function getAirlines() {
        return response()->json(Airline::all());
    }

    public function getAirlineById($id) {
        $airline = Airline::findOrFail($id);

        return response()->json($airline, 200);
    }

    public function createAirline(Request $request) {
        $airline = Airline::create($request->all());
        
        return response()->json($airline, 201);
    }

    public function updateAirline($id, Request $request) {
        $airline = Airline::findOrFail($id);
        $airline->update($request->all());
        
        return response()->json($airline, 200);
    }

    public function deleteAirline($id) {
        Airline::findOrFail($id)->delete();

        $associations = Association::all();
        $associations = $associations->where('airline_id', '=', $id);
        foreach ($associations as $association) {
            $associationId = $association->id;
            Log::info($associationId);
            Association::findOrFail($associationId)->delete();
        }
        
        return response('Airline successfully deleted', 200);
    }
}