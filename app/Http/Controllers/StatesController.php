<?php

namespace App\Http\Controllers;

use DB;
use App\State;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class StatesController extends Controller
{
    public function __construct(){
         $this->middleware('ajax');
    }

    public function index()
    {
        $states = State::all();
        return $states;
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $state = new State;
        $state->name = $request->name;
        $state->created_at = Carbon::now();
        $state->received_at = Carbon::now();
        $state->save();

        return 'true';
    }

    public function show($id)
    {
        $state = State::findOrFail($id);
        return $state;
    }

    public function edit($id)
    {
        $state = State::findOrFail($id);
        return $state;
    }

    public function update(Request $request, $id)
    {
        $state = State::findOrFail($id);
        $state->name = $request->name;
        $state->created_at = Carbon::now();
        $state->received_at = Carbon::now();
        $state->save();

        return 'true';
    }

    public function destroy($id)
    {
        State::find($id)->delete();
        return 'true';
    }
}
