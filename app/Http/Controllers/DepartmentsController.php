<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Department;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class DepartmentsController extends Controller
{
    public function __construct(){
         $this->middleware('ajax');
    }

    public function index()
    {
        $departments = Department::all();
        return $departments;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $department = new Department;
        $department->name = $request->name;
        $department->description = $request->description;
        $department->type_of_department_id = $request->type_of_department_id;
        $department->city_council_id = $request->city_council_id;
        $department->created_at = Carbon::now();
        $department->updated_at = Carbon::now();
        $department->save();
        return $department;
    }

    public function show($id)
    {
        $department = Department::findOrFail($id);
        return $department;
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return $department;
    }

    public function update(Request $request, $id)
    {
        $department = Department::find($id);
        $department->name = $request->name;
        $department->description = $request->description;
        $department->type_of_department_id = $request->type_of_department_id;
        $department->city_council_id = $request->city_council_id;
        $department->updated_at = Carbon::now();
        $department->save();
        return $department;
    }

    public function destroy($id)
    {
        Department::find($id)->delete();
        return 'true';
    }
}
