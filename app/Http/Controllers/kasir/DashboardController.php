<?php

namespace App\Http\Controllers\kasir;

use App\Http\Controllers\Controller;
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
        $data['antrian'] = Transaksi_pasien::with([
            'pasien' => function ($query) {
                $query->select('id', 'nama', 'alamat','jenis_kelamin','usia');
            },
        ])
        ->whereHas(
            'status',
            function ($query) {
                // $query->select('id', 'status');
                $query->where('status', "=", 'Antri Pembayaran');
            }
        )
            ->get([
                'id',
                'pasien',
                'tanggal_periksa',
                'tebus_obat',
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['antrian'] = Transaksi_pasien::with([
            'pasien' => function ($query) {
                $query->select('id', 'nama', 'alamat','jenis_kelamin','usia');
            },
            'rekam_medik' => function ($query) {
                $query->select('id', 'no_rekam_medik','dokter','keterangan');
            },
            'rekam_medik.dokter' => function ($query) {
                $query->select('id', 'nama');
            },
            'rekam_medik.rm_tindakan' => function ($query) {
                $query->select('id', 'tindakan','rekam_medik');
            },
            'rekam_medik.rm_tindakan.tindakan' => function ($query) {
                $query->select('id', 'nama');
            },
            'rekam_medik.rm_obat' => function ($query) {
                $query->select('id', 'obat','rekam_medik');
            },
            'rekam_medik.rm_obat.obat' => function ($query) {
                $query->select('id', 'nama','harga');
            },
        ])
        ->whereHas(
            'status',
            function ($query) {
                // $query->select('id', 'status');
                $query->where('status', "=", 'Antri Pembayaran');
            }
        )
        ->whereKey($id)
            ->firstOrFail([
                'id',
                'pasien',
                'rekam_medik',
                'biaya_obat',
                'biaya_tindakan',
                'biaya_kartu',
                'biaya_total',
                'tanggal_periksa',
                'tebus_obat',
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
        $data = Transaksi_pasien::findOrFail($id);
        if ($request->jumlah_bayar < $data->biaya_total) {
            return response()->json([
                'type' => 'failed',
                'message' => 'jumlah kurang.',
            ],403);
        }
        $data->jumlah_bayar =$request->jumlah_bayar;
        $data->jumlah_kembalian = $request->jumlah_bayar-$data->biaya_total;
        $data->status_bayar = 'sudah';
        $data->push();
        if ($data->rm->keterangan=="Rujukan") {
            $data->status()->update(['status' => 'Antri Rujukan']);
        } else {
            $data->status()->update(['status' => 'Selesai']);
        }
        
        return response()->json([
            'type' => 'success',
            'message' => 'Updated.',
            'data' => $data
        ]);
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
