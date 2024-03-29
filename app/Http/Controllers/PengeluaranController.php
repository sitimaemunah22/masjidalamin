<?php

namespace App\Http\Controllers;

use PDF;
use Validator;
use Carbon\Carbon;
use App\Models\Jenis;
use App\Models\LogAct;
use App\Models\Donatur;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Response;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengeluaran = Pengeluaran::all(); // Misalnya, pengambilan data dari model Pengeluaran
        return view('pengeluaran.index', compact('pengeluaran'));
    }
    public function getData(Request $request){

        if ($request->ajax()) {
            $pengeluaran = Pengeluaran::all();

            return DataTables::of($pengeluaran)
                ->editColumn('nama_jenis', function ($pengeluaran) {
                    if($pengeluaran->jenis == null){
                        return "-";
                    }else{
                        return $pengeluaran->jenis->nama;
                    }
                })
                ->editColumn('tanggal_pengeluaran',function($pengeluaran){
                    return $pengeluaran->tanggal_pengeluaran;
                })
                ->editColumn('jumlah_pengeluaran',function($pengeluaran){
                    return $pengeluaran->jumlah_pengeluaran;
                })
                ->editColumn('opsi', function($pengeluaran){
                    $edit_pengeluaran = route('pengeluaran.edit', $pengeluaran->id_pengeluaran);
                    $delete_pengeluaran = route('pengeluaran.delete',['id'=>$pengeluaran->id_pengeluaran]);
                    $download = route('pengeluaran.download',['id'=>$pengeluaran->id_pengeluaran]);
                    $show = route('pengeluaran.show',['id'=>$pengeluaran->id_pengeluaran]);

                    $cek = (auth()->user()->role == 'masyarakat') ? 'd-none' : '';
                    $cek_2 = (auth()->user()->role != 'admin') ? 'd-none' : '';

                    $a_link = '<a href="'.$edit_pengeluaran.'" class="btn btn-success btn-sm m-1 '.$cek.'">Edit</a>';
                    $detail = '<a href="'.$show.'" class="btn btn-success btn-sm m-1">Detail</a>';
                    $form = '<form class="'.$cek_2.'" method="POST" action="'.$delete_pengeluaran.'">'.csrf_field().'<input type="submit" onclick="return confirm(\'Data Akan Dihapus?\')" class="btn btn-success btn-sm m-1" value="Delete"></form>';
                    $download_link = '<a target="_blank" href="'.$download.'" class="btn btn-success btn-sm m-1">Download</a>';
                    
                    return 
                    '<div class="d-flex">'.$a_link.''.$detail.''.$form.''.$download_link.'</div>';
                })
                ->rawColumns(['opsi','nama_jenis','tanggal_pengeluaran','jumlah_pengeluaran'])
                ->make(true);
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis = Jenis::select('id_jenis', 'nama')->where('status','=', 2)->get();
        $donatur = Donatur::select('id_donatur', 'nama')->get();
        $pengeluaran = Pengeluaran::all();
        // $pengeluaran = Pengeluaran::select('id_pengeluaran', 'nama')->where('status','=', 2)->get();
        return view('pengeluaran.create',[
            'jenis' => $jenis,
            'donatur' => $donatur,
            'pengeluaran' => $pengeluaran
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis_id' => 'required',
            'jumlah_pengeluaran' => 'required',
            'file_upload' => 'required|file',
            'tanggal_pengeluaran' => 'required'
        ]);
        

        if ($validator->fails()) {
            // Back to form page with validation error messages
            return redirect()->back()->withErrors($validator->errors())->withInput();
        } else {

            $cek_file = $request->file('file_upload')->getClientOriginalName();
            $cek_type = $request->file('file_upload')->getClientOriginalExtension();

            $path = $request->file('file_upload')->move(public_path('assets/uploads/pengeluaran'), $cek_file);
            
            $pengeluaran = new pengeluaran;
            $pengeluaran->id_pengeluaran = $request->id_pengeluaran;
            $pengeluaran->id_jenis = $request->jenis_id;
            $pengeluaran->jumlah_pengeluaran = $request->jumlah_pengeluaran;
            $pengeluaran->upload = $cek_file;
            $pengeluaran->tanggal_pengeluaran = $request->tanggal_pengeluaran;
            $pengeluaran->id_donatur = $request->donatur_id;
            $pengeluaran->save();

            // $date = Carbon::now();
            $log = new LogAct;
            $log->user_id = auth()->user()->id_user;
            $log->keterangan = auth()->user()->name.' Menambah Pengeluaran dengan nominal '.$request->jumlah_pengeluaran.' pada '.$request->tanggal_pengeluaran;
            
            $log->save();

            return redirect()->route('pengeluaran.index')->with(['message' => 'Berhasil menambah data.']);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengeluaran $pengeluaran, Request $request)
    {
        $pengeluarans = Pengeluaran::find($request->id);
        $jenis = Jenis::select('id_jenis', 'nama')->where('status','=', 1)->get();
        $donatur = Donatur::select('id_donatur', 'nama')->get();
        return view('pengeluaran.show',[
            'pengeluaran' => $pengeluarans,
            'jenis' => $jenis,
            'donatur'=>$donatur
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengeluaran $pengeluaran,Request $request)
    {
     
        $pengeluarans = Pengeluaran::find($request->id);
        $jenis = Jenis::select('id_jenis', 'nama')->where('status','=', 1)->get();
        $donatur = Donatur::select('id_donatur', 'nama')->get();
        return view('pengeluaran.edit',[
            'pengeluaran' => $pengeluarans,
            'jenis' => $jenis,
            'donatur'=>$donatur
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        // dd($request->all());

        $pengeluaran = Pengeluaran::find($request->id);

        $validator = Validator::make($request->all(), [
            'id_pengeluaran' => 'required',
            'id_jenis' => 'required',
            'id_donatur'=> 'sometimes',
            'jumlah_pengeluaran' => 'required',
            'upload' => 'required|file',
            'tanggal_pengeluaran' => 'required'
        ]);
        

        if ($validator->fails()) {
            // Back to form page with validation error messages
            return redirect()->back()->withErrors($validator->errors())->withInput();
        } else {

            if($request->hasFile('upload')){
                $cek_file = $request->file('upload')->getClientOriginalName();
                $cek_type = $request->file('upload')->getClientOriginalExtension();
                
                $path = $request->file('upload')->move(public_path('assets/uploads/pengeluaran'), $cek_file);
                
            }else{
                $cek_file = $pengeluaran->upload;
            }
            // $date = Carbon::now();

            $log = new LogAct;
            $log->user_id = auth()->user()->id_user;
            $log->keterangan = auth()->user()->name.' Mengubah Pengeluaran dengan nominal'.$request->jumlah_pengeluaran.' pada'.$request->tanggal_pengeluaran;
            $log->save();
            $pengeluaran->id_pengeluaran = $request->id_pengeluaran;
            $pengeluaran->id_jenis = $request->id_jenis;
            $pengeluaran->jumlah_pengeluaran = $request->jumlah_pengeluaran;
            // $pengeluaran->id_donatur = $request->id_donatur;
            $pengeluaran->upload = $cek_file;
            $pengeluaran->tanggal_pengeluaran = $request->tanggal_pengeluaran;
            $pengeluaran->update();
            return redirect()->route('pengeluaran.index')->with(['message' => 'Berhasil Mengubah data.']);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengeluaran $pengeluaran,Request $request)
    {
        $pengeluaran = Pengeluaran::find($request->id);

        // $date = Carbon::now();

            $log = new LogAct;
            $log->user_id = auth()->user()->id_user;
            $log->keterangan = auth()->user()->name.' Menghapus data '.$pengeluaran->jumlah_pengeluaran;
            
            $log->save();

        $pengeluaran->delete();
        return redirect()->back()->with(['message' => 'Berhasil menghapus data.']);
    }

    public function getPDF(){

        $pengeluaran = pengeluaran::all();
        
        $pdf = PDF::loadview('pengeluaran.pdf',[
            'pengeluaran' => $pengeluaran
        ]);
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream('Laporan Pengeluaran Kas Masjid.pdf');

    }

    public function download(Request $request){
        
        $pengeluaran = Pengeluaran::find($request->id);
        $file = public_path('assets/uploads/pengeluaran/'.$pengeluaran->upload);
        return Response::download($file);
    }
}
