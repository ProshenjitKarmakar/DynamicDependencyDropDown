<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Country, City, State};

class DynamicDependencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::select('id', 'name')->get();
        return view('dynamicDependencies.index', compact('countries'));
    }
    public function validation()
    {
        return view('index');
    }

    public function fetchState(Request $request)
    {
        $state = State::where('country_id', $request->country_id)
                    ->select('id', 'name')
                    ->get();

        return response()->json([
            'state' => $state
        ]);
    }

    public function fetchCity(Request $request)
    {
        $city = City::where('state_id', $request->state_id)
                    ->select('id', 'name')
                    ->get();

        return response()->json([
            'city' => $city
        ]);
    }


}
