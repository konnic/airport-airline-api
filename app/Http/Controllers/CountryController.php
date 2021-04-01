<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller {
    public function getCountries() {
        return response()->json(Country::all());
    }

    public function getCountryById($id) {
        $country = Country::findOrFail($id);

        return response()->json($country, 200);
    }
}