<?php

namespace App\Http\Controllers\administrasi;

use App\Http\Controllers\Controller;
use App\Models\Rujukan_pasien;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['antrian'] = Rujukan_pasien::with([
            'rekam_medik' => function ($query) {
                $query->select('id', 'nama','pasien','dokter');
            },
            'rekam_medik.pasien' => function ($query) {
                $query->select('id', 'nama', 'alamat');
            },
        ])->whereHas(
            'status',
            function ($query) {
                // $query->select('id', 'status');
                $query->where('status', "=", 'Antri Rujukan');
            }
        )
            ->get([
                'id',
                'rekam_medik',
                'rs',
                'dokter',
                'kondisi',
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['antrian'] = Rujukan_pasien::with([
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
        ])
            ->whereHas(
                'status',
                function ($query) {
                    // $query->select('id', 'status');
                    $query->where('status', "=", 'Antri Obat');
                }
            )
            ->whereKey($id)
            ->firstOrFail([
                'id',
                'no_rekam_medik',
                'pasien',
                'dokter',
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
