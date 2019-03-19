<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class UsersController extends Controller
{
    public function __construct(){
         $this->middleware('ajax');
    }

    public function index()
    {
        $users = User::all();
        return $users;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // $img = $request->img_profile;
        // $img_new_name = time().$img->getClientOriginalName();
        // $img->move('uploads/profile',$img_new_name);

        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->created_at = Carbon::now();
        $user->updated_at = Carbon::now();

        $user->save();
        return $user;
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return $user;
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return $user;
    }

    public function update(Request $request, $id)
    {
        $img = $request->img_profile;
        $img_new_name = time().$img->getClientOriginalName();
        $img->move('uploads/profile',$img_new_name);

        $user = User::findOrFail($id);
        // dd($user);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->img_profile = 'uploads/profile/' . $img_new_name;
        $user->updated_at = Carbon::now();

        $user->save();
        return $user;
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return 'true';
    }
}
