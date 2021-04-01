<?php

namespace App\Http\Controllers;

use App\Models\Association;
use Illuminate\Http\Request;

class AssociationController extends Controller {
    public function getAssociations(Request $request) {
        $associations = Association::all();

        if ($request->has('airport_id')) {
            $associations = $associations->where('airport_id', '=', $request->airport_id);
        }

        if ($request->has('airline_id')) {
            $associations = $associations->where('airline_id', '=', $request->airline_id);
        }

        return response()->json($associations);
    }

    public function createAssociation(Request $request) {
        $association = Association::create($request->all());
        
        return response()->json($association, 201);
    }
}