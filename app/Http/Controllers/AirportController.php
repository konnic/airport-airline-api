<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Airport;
use App\Models\Association;
use Illuminate\Http\Request;

class AirportController extends Controller {
    public function getAirports() {
        return response()->json(Airport::all());
    }

    public function getAirportById($id) {
        $airport = Airport::findOrFail($id);

        return response()->json($airport, 200);
    }

    public function createAirport(Request $request) {
        $airport = Airport::create($request->all());
        
        return response()->json($airport, 201);
    }

    public function updateAirport($id, Request $request) {
        $airport = Airport::findOrFail($id);
        $airport->update($request->all());
        
        return response()->json($airport, 200);
    }

    public function deleteAirport($id) {
        Airport::findOrFail($id)->delete();

        $associations = Association::all();
        $associations = $associations->where('airport_id', '=', $id);
        foreach ($associations as $association) {
            $associationId = $association->id;
            Association::findOrFail($associationId)->delete();
        }
        
        return response('Airport successfully deleted', 200);
    }
}