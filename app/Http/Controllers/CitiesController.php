<?php

namespace App\Http\Controllers;

use DB;
use App\CityCouncil;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class CitiesController extends Controller
{
    public function __construct(){
         $this->middleware('ajax');
    }

    public function index()
    {
        $cities = CityCouncil::all();
        return $cities;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $city = new CityCouncil;
        $city->name = $request->name;
        $city->state_id = $request->state_id;
        $city->created_at = Carbon::now();
        $city->updated_at = Carbon::now();
        $city->save();

        return 'true';
    }

    public function show($id)
    {
        $city = CityCouncil::findOrFail($id);
        return $city;
    }

    public function edit($id)
    {
        $city = CityCouncil::findOrFail($id);
        return $city;
    }

    public function update(Request $request, $id)
    {
        $city = CityCouncil::find($id);
        $city->name = $request->name;
        $city->state_id = $request->state_id;
        $city->updated_at = Carbon::now();
        $city->save();
        return 'true';
    }

    public function destroy($id)
    {
        CityCouncil::find($id)->delete;
        return 'true';
    }
}
