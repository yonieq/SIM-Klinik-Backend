<?php

namespace App\Http\Controllers\apotek;

use App\Http\Controllers\Controller;
use App\Models\Rekam_medik;
use App\Models\Transaksi_pasien;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
            'dokter' => function ($query) {
                $query->select('id', 'nama');
            },
        ])->whereHas(
            'status',
            function ($query) {
                // $query->select('id', 'status');
                $query->where('status', "=", 'Antri Obat');
            }
        )
            ->get([
                'id',
                'no_rekam_medik',
                'pasien',
                'dokter',
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
        $data = Rekam_medik::with([
            'rm_tindakan' => function ($query) {
                $query->select(
                    'id',
                    'rekam_medik',
                    'tindakan'
                );
            },
            'rm_tindakan.tindakan_' => function ($query) {
                $query->select(
                    'id',
                    'harga',
                );
            },
            'rm_obat' => function ($query) {
                $query->select(
                    'id',
                    'rekam_medik',
                    'obat',
                    'jumlah'
                );
            },
            'rm_obat.obat_' => function ($query) {
                $query->select('id', 'harga');
            },
        ])
            // ->whereHas(
            //     'status',
            //     function ($query) {
            //         // $query->select('id', 'status');
            //         $query->where('status', "=", 'Antri Obat');
            //     }
            // )
            ->whereKey($request->rm)
            ->firstOrFail([
                'id',
                'pasien',
                'tanggal_periksa',
                'status_pasien'
            ]);
        $tindakan = 0;
        foreach ($data->rm_tindakan as $key => $value) {
            $tindakan += $value->tindakan_->harga;
        }
        $obat = 0;
         if ($request->tebus_obat=='tebus') {
            foreach ($data->rm_obat as $key => $value) {
                $obat += $value->obat_->harga * $value->jumlah;
            }
        }
        $kartu= 0;
        $transakasi = new Transaksi_pasien;
        $transakasi->pasien = $data->pasien;
        $transakasi->tanggal_periksa = $data->tanggal_periksa;
        $transakasi->tebus_obat = $request->tebus_obat;
        $transakasi->biaya_obat = $obat;
        $transakasi->biaya_tindakan = $tindakan;
        $transakasi->biaya_kartu = $kartu;
        $transakasi->biaya_total = $tindakan + $obat + $kartu;
        $transakasi->jumlah_bayar =0;
        $transakasi->jumlah_kembalian =0;
        $transakasi->status_bayar = 'belum';
        $transakasi->status_pasien = $data->status_pasien;
        $data->transaksi()->save($transakasi);
        $data->status()->update(['status' => 'Antri Pembayaran']);
        return response()->json([
            'type' => 'success',
            'message' => 'Geted.',
            'data' => $data->transaksi
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

    public function cetak($id)
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
