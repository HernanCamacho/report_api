<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\UserEmployee;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class UsersEmployeesController extends Controller
{
    public function index()
    {
        $uss_emp = UserEmployee::all();
        return $uss_emp;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $img = $request->img_profile;
        $img_new_name = time().$img->getClientOriginalName();
        $img->move('uploads/profile',$img_new_name);


        $us_emp = new UserEmployee;
        $us_emp->first_name = $request->first_name;
        $us_emp->last_name = $request->last_name;
        $us_emp->email = $request->email;
        $us_emp->worker_number = $request->worker_number;
        $us_emp->password = bcrypt($request->password);
        $us_emp->img_profile = 'uploads/profile/' . $img_new_name;
        $us_emp->department_id = $request->department_id;
        $us_emp->role_id = $request->role_id;
        $us_emp->checked = 0;
        $us_emp->created_at = Carbon::now();
        $us_emp->updated_at = Carbon::now();

        $us_emp->save();
        return 'true';
    }

    public function show($id)
    {
        $us_emp = UserEmployee::findOrFail($id);
        return $us_emp;
    }

    public function edit($id)
    {
        $us_emp = UserEmployee::findOrFail($id);
        return $us_emp;
    }

    public function update(Request $request, $id)
    {
        $img = $request->img_profile;
        $img_new_name = time().$img->getClientOriginalName();
        $img->move('uploads/profile',$img_new_name);


        $us_emp = UserEmployee::findOrFail($id);
        $us_emp->first_name = $request->first_name;
        $us_emp->last_name = $request->last_name;
        $us_emp->email = $request->email;
        $us_emp->worker_number = $request->worker_number;
        $us_emp->img_profile = 'uploads/profile/' . $img_new_name;
        $us_emp->checked = $request->checked;
        $us_emp->updated_at = Carbon::now();

        $us_emp->save();
        return 'true';
    }

    public function destroy($id)
    {
        UserEmployee::find($id)->delete();
        return 'true';
    }
}
