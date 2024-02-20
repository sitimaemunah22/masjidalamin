<?php

namespace App\Http\Controllers;

use App\Models\LogAct;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class LogActController extends Controller
{
    public function index(){
        return view('Log.index');
    }

    public function getData(Request $request){
        if ($request->ajax()) {
            $log = LogAct::all();

            return DataTables::of($log)
            ->editColumn('id',function($query){
                return $query->id;
            })

            ->editColumn('user_id',function($query){
                return $query->user_id;
            })
                ->editColumn('keterangan',function($query){
                    return $query->keterangan;
                })
                ->editColumn('time', function($query){
                    return $query->created_at;
                })
                
                ->rawColumns(['id','user_id','keterangan','waktu'])
                ->make(true);
        }
    }
}
