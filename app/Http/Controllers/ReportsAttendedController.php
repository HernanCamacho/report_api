<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Report;
use App\Http\Requests;
use App\ReportAttended;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class ReportsAttendedController extends Controller
{
    public function index()
    {
        $reports_status = ReportAttended::all();
        return $reports_status;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //The next three lines store the image image, firts we rename the image,
        //then we move the image to public/uploads/posts
        $evidence = $request->evidence;
        $evidence_new_name = time().$evidence->getClientOriginalName();
        $evidence->move('uploads/posts',$evidence_new_name);
        $rp_a = new ReportAttended;
        $rp_a->evidence = 'uploads/posts/' . $evidence_new_name;
        $rp_a->comments = $request->comments;
        $rp_a->report_id = $request->report_id;
        $rp_a->user_id = Auth::id();
        $rp_a->status_id = 0;
        $rp_a->created_at = Carbon::now();
        $rp_a->updated_at = Carbon::now();
        $rp_a->save();

        return 'true';
    }

    public function show($id)
    {
        $report_status = ReportAttended::findOrFail($id);
        return $report_status;
    }

    public function edit($id)
    {
        $report_status = ReportAttended::findOrFail($id);
        return $report_status;
    }

    public function update(Request $request, $id)
    {

        //The next three lines store the image image, firts we rename the image,
        //then we move the image to public/uploads/posts
        $evidence = $request->evidence;
        $evidence_new_name = time().$evidence->getClientOriginalName();
        $evidence->move('uploads/posts',$evidence_new_name);
        $rp_a = ReportAttended::findOrFail($id);
        $rp_a->evidence = 'uploads/posts/' . $evidence_new_name;
        $rp_a->comments = $request->comments;
        $rp_a->user_id = Auth::id();
        $rp_a->status_id = $request->status_id;
        $rp_a->updated_at = Carbon::now();
        $rp_a->save();

        return 'true';
    }

    public function destroy($id)
    {
        ReportStatus::find($id)->delete();
        return 'true';
    }
}
