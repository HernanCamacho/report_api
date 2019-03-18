<?php

namespace App\Http\Controllers;

use DB;
use App\Report;
use Carbon\Carbon;
use App\ReportStatus;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class ReportsController extends Controller
{
    public function index()
    {
        $reports = Report::all();
        return $reports;
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
        $report = new Report;
        $report->latitude = $request->latitude;
        $report->longitude = $request->longitude;
        $report->evidence = 'uploads/posts/' . $evidence_new_name;
        $report->comments = $request->comments;
        $report->department_id = $request->department_id;
        $report->user_id = $request->user_id;
        $rp_a->status_id = 1;
        $report->created_at = Carbon::now();
        $report->updated_at = Carbon::now();

        $report->save();

        return 'true';
    }

    public function show($id)
    {
        $report = Report::findOrFail($id);
        return $report;
    }

    public function edit($id)
    {
        $report = Report::findOrFail($id);
        return $report;
    }

    public function update(Request $request, $id)
    {
        //The next three lines store the image image, firts we rename the image,
        //then we move the image to public/uploads/posts
        $evidence = $request->evidence;
        $evidence_new_name = time().$evidence->getClientOriginalName();
        $evidence->move('uploads/posts',$evidence_new_name);
        $report = Report::findOrFail($id);
        $report->evidence = 'uploads/posts/' . $evidence_new_name;
        $report->comments = $request->comments;
        $report->department_id = $request->department_id;
        $report->updated_at = Carbon::now();

        $report->save();

        return 'true';
    }

    public function destroy($id)
    {
        Report::find($id)->delete();
        return 'true';
    }
}
