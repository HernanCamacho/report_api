<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Http\Requests;
use App\TypesOfDepartment;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;;

class TypesOfDepartmentsController extends Controller
{
    public function __construct(){
         $this->middleware('ajax');
    }

    public function index()
    {
        $ty_of_deps = TypesOfDepartment::all();
        return $ty_of_deps;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $icon = $request->icon;
        $icon_new_name = time().$icon->getClientOriginalName();
        $icon->move('uploads/icons',$icon_new_name);
        $ty_of_dep = new TypesOfDepartment;
        $ty_of_dep->name = $request->name;
        $ty_of_dep->icon = 'uploads/icons/' . $icon_new_name;
        $ty_of_dep->created_at = Carbon::now();
        $ty_of_dep->updated_at = Carbon::now();
        $ty_of_dep->save();

        return 'true';
    }

    public function show($id)
    {
        $ty_of_dep = TypesOfDepartment::findOrFail($id);
        return $ty_of_dep;
    }

    public function edit($id)
    {
        $ty_of_dep = TypesOfDepartment::findOrFail($id);
        return $ty_of_dep;
    }

    public function update(Request $request, $id)
    {
        $ty_of_dep = TypesOfDepartment::findOrFail($id);
        $ty_of_dep->name = $request->name;
        $ty_of_dep->updated_at = Carbon::now();
        $ty_of_dep->save();

        return 'true';
    }

    public function destroy($id)
    {
        TypesOfDepartment::find($id)->delete();
        return 'true';
    }
}
