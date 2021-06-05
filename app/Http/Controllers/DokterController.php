<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dokter;
use App\Http\Requests\PegawaiRequest;
use Illuminate\Support\Facades\File;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        // $datas = Pegawai::all();
        $datas = dokter::where('nama', 'LIKE', '%'.$keyword.'%')
            ->orWhere('jabatan', 'LIKE', '%'.$keyword.'%')
            ->paginate();
        $datas->withPath('dokter');
        $datas->appends($request->all());
        return view('dokter.index', compact(
            'datas', 'keyword'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new dokter;
        return view('dokter.create', compact(
            'model'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PegawaiRequest $request)
    {
        $model = new Dokter;
        $model->nama = $request->nama;
        $model->jabatan = $request->jabatan;
       

        
        }
        $model->save();

        return redirect('pegawai')->with('success', "Data berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = dokter::find($id);
        return view('dokter.edit', compact(
            'model'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PegawaiRequest $request, $id)
    {
        $model = dokter::find($id);
        $model->nama = $request->nama;
        $model->jabatan = $request->jabatan;
        
        }

        $model->save();

        return redirect('dokter')->with('success', "Data berhasil diperbaharui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = dokter::find($id);
        $model->delete();
        return redirect('dokter');
    }
}
