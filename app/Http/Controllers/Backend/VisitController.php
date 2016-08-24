<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class VisitController extends Controller
{
    public function index(){
        $visit_record=\App\Models\visit_count::select(DB::raw('ip,created_at,count(ip) count'))->groupby('ip')->orderBy('created_at', 'desc')->get();
        return view('backend.visit.index',compact('visit_record'));
    }
}
