<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;
use Validator;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis = Jenis::all();
        return view('jenis.index',[
            'jenis' => $jenis
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id_jenis' => 'required',
            'nama' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            // Back to form page with validation error messages
            return redirect()->back()->withErrors($validator->errors())->withInput();
        } else {
            $jenis = new Jenis;
            $jenis->id_jenis = $request->id_jenis;
            $jenis->nama = $request->nama;
            $jenis->status = $request->status;
            $jenis->save();
            return redirect()->route('jenis.index')->with(['message' => 'Berhasil menambah data.']);

        }
        // dd($request->all());
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function update(Jenis $jenis, Request $request)
    {
        $jenis = Jenis::find($request->id);

        // dd($jenis);

        $validator = Validator::make($request->all(), [
            'id_jenis' => 'required',
            'nama' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            // Back to form page with validation error messages
            return redirect()->back()->withErrors($validator->errors())->withInput();
        } else {
            $jenis->update([
                'id_jenis' => $request->id_jenis,
                'nama' => $request->nama,
                'status' => $request->status
            ]);
            return redirect()->route('jenis.index')->with(['message' => 'Berhasil mengubah data.']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function edit(Request $request, Jenis $jenis)
    {
        $data = [
            'jenis'=> Jenis::query()->find($request->id)
        ];
        return view('jenis.edit',$data);
    }

    public function detail(Request $request, Jenis $jenis)
    {
        $data = Jenis::find($request->id);
        $tipe = $data->status == 2 ? 'pemasukan' : 'pengeluaran';
        
        return view('jenis.detail',[
            'jenis' => $data,
            'tipe' => $tipe
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Jenis $jenis, Request $request)
    {
        $jenis = Jenis::find($request->id);
        $jenis->delete();
        return redirect()->route('jenis.index')->with(['message' => 'Berhasil menghapus data.']);
    }
}
