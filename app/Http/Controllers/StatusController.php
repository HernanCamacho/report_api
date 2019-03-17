<?php

namespace App\Http\Controllers;

use DB;
use App\Status;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::all();
        return $statuses;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $status = new Status;
        $status->name = $request->name;
        $status->created_at = Carbon::now();
        $status-> updated_at = Carbon::now();
        $status->save();

        return 'true';
    }

    public function show($id)
    {
        $status = Status::findOrFail($id);
        return $status;
    }

    public function edit($id)
    {
        $status = Status::findOrFail($id);
        return $status;
    }

    public function update(Request $request, $id)
    {
        $status = Status::findOrFail($id);
        $status->name = $request->name;
        $status-> updated_at = Carbon::now();
        $status->save();

        return 'true';
    }

    public function destroy($id)
    {
        Status::find($id)->delete();
        return 'true';
    }
}
