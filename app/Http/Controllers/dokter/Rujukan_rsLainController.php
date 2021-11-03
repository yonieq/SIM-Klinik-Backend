<?php

namespace App\Http\Controllers\dokter;

use App\Http\Controllers\Controller;
use App\Models\Rekam_medik;
use App\Models\Rujukan_pasien;
use Illuminate\Http\Request;

class Rujukan_rsLainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['antrian'] = Rekam_medik::with([
            'pasien' => function ($query) {
                $query->select('id', 'nama', 'alamat');
            },
        ])->whereHas(
            'status',
            function ($query) {
                // $query->select('id', 'status');
                $query->where('status', "=", 'Perlu Data Rujukan');
            }
        )
            // ->where('dokter',auth()->user())
            ->where('dokter', 2)
            ->get([
                'id',
                'no_rekam_medik',
                'pasien',
                'tanggal_periksa',
            ]);
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
        $data = Rekam_medik::findOrFail($request->rm);
        $rujukan = new Rujukan_pasien();
        $rujukan->kondisi= $request->kondisi;
        $rujukan->rs= $request->rs;
        $rujukan->dokter= $request->dokter;
        $rujukan->status_pasien = $data->status_pasien;
        $data->rujukan()->save($rujukan);
        $data->status()->update(['status' => 'Antri Pembayaran']);
        return response()->json([
            'type' => 'success',
            'message' => 'Geted.',
            'data' => $data->rujukan
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
        $data['antrian'] = Rekam_medik::with([
            'pasien' => function ($query) {
                $query->select('id', 'nama', 'alamat');
            },
            'dokter' => function ($query) {
                $query->select('id', 'nama');
            },
            'rm_obat' => function ($query) {
                $query->select(
                    'id',
                    'rekam_medik',
                    'obat',
                    'dosis',
                    'aturan_minum',
                    'jumlah'
                );
            },
            'rm_obat.obat' => function ($query) {
                $query->select('id', 'nama');
            },
            'rm_tindakan' => function ($query) {
                $query->select(
                    'id',
                    'rekam_medik',
                    'tindakan'
                );
            },
            'rm_tindakan.tindakan' => function ($query) {
                $query->select('id', 'nama');
            },
        ])
            // ->whereHas(
            //     'status',
            //     function ($query) {
            //         // $query->select('id', 'status');
            //         $query->where('status', "=", 'Antri Obat');
            //     }
            // )
            ->whereKey($id)
            ->firstOrFail([
                'id',
                'no_rekam_medik',
                'pasien',
                'dokter',
                'keluhan',
                'hasil_diaknosa',
                'tanggal_periksa',
                'catatan',
            ]);
        return response()->json([
            'type' => 'success',
            'message' => 'Geted.',
            'data' => $data
        ]);
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
