<?php

namespace App\Http\Controllers\pendaftaran;

use App\Http\Controllers\Controller;
use App\Models\Antrian;
use App\Models\Pasien;
use App\Models\Poliklinik;
use App\Models\Status_pasien;
use Illuminate\Http\Request;

class Pasien_lamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pasien'] = Pasien::get(['id', 'no_kartu','nik','nama']);
        $data['poliklinik'] = Poliklinik::get(['id', 'nama']);
        return response()->json([
            'type' => 'success',
            'message' => 'Geted.',
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = new Status_pasien();
        $status->status = "Antri";
        $status->tanggal = $request->tanggal_periksa;
        $status->pasien = $request->pasien;
        $status->save();
        $antrian = new Antrian();
        $antrian->tgl_periksa = $request->tanggal_periksa;
        $antrian->dokter = $request->dokter;
        $antrian->pasien = $request->pasien;
        $antrian->poliklinik = $request->poliklinik;
        $status->antrian()->save($antrian);
        return response()->json([
            'type' => 'success',
            'message' => 'Created.',
            'data' => $antrian
        ]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
