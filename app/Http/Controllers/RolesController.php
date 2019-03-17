<?php

namespace App\Http\Controllers;

use DB;
use App\Role;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return $roles;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $role = new Role;
        $role->role = $request->role;
        $role->created_at = Carbon::now();
        $role->updated_at = Carbon::now();
        $role->save();

        return 'true';
    }

    public function show($id)
    {
        $role = Role::findOrFail($id);
        return $role;
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return $role;
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->role = $request->role;
        $role->created_at = Carbon::now();
        $role->updated_at = Carbon::now();
        $role->save();

        return 'true';
    }

    public function destroy($id)
    {
        Role::find($id)->delete();
        return 'true';
    }
}
