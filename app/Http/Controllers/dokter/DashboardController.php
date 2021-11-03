<?php

namespace App\Http\Controllers\dokter;

use App\Http\Controllers\Controller;
use App\Models\Antrian;
use App\Models\Obat;
use App\Models\Rekam_medik;
use App\Models\Status_pasien;
use App\Models\Tindakan;
use App\Models\Transaksi_pasien;
use Carbon\Carbon;
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
        $data['total'] = Antrian::whereHas(
            'status',
            function ($query) {
                // $query->select('id', 'status');
                $query->where('status', "=", 'selesai');
            }
        )
            // ->where('dokter',auth()->user())
            ->where('dokter', 2)
            ->count();
        $data['selesai_hari_ini'] = Antrian::whereDate('tgl_periksa', Carbon::now())->whereHas(
            'status',
            function ($query) {
                // $query->select('id', 'status');
                $query->where('status', "=", 'Selesai');
            }
        )
            // ->where('dokter',auth()->user())
            ->where('dokter', 2)
            ->count();
        $data['antrian_hari_ini'] = Antrian::whereDate('tgl_periksa', Carbon::now())->whereHas(
            'status',
            function ($query) {
                // $query->select('id', 'status');
                $query->where('status', "=", 'Antri');
            }
        )
            // ->where('dokter',auth()->user())
            ->where('dokter', 2)
            ->count();
        $data['antrian'] = Antrian::with([
            'pasien' => function ($query) {
                $query->select('id', 'nama', 'alamat', 'jenis_kelamin', 'usia');
            },
            'poliklinik' => function ($query) {
                $query->select('id', 'nama');
            },
            'status' => function ($query) {
                $query->select('id', 'status');
                // $query->where('status',"=", 'Antri');
            }
        ])->whereDate('tgl_periksa', Carbon::now())->whereHas(
            'status',
            function ($query) {
                // $query->select('id', 'status');
                $query->where('status', "=", 'Antri');
            }
        )
            // ->where('dokter',auth()->user())
            ->where('dokter', 2)
            ->get([
                'antrian.id as id',
                'antrian.pasien as pasien',
                'antrian.status as status',
                'antrian.poliklinik as poliklinik',
            ]);
        return response()->json([
            'type' => 'success',
            'message' => 'Geted.',
            'data' => $data
        ]);
    }
    public function batal($id)
    {
        // $data = Status_pasien::findOrFail($id);
        // $data->status = "Batal";
        // $data->push();

        $data = Antrian::findOrFail($id);
        $data->status()->update(['status' => 'Batal']);
        return response()->json([
            'type' => 'success',
            'message' => 'Updated.',
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
        $status_pasien = Status_pasien::findOrfail($request->status_pasien);

        $rm = new Rekam_medik;
        $rm->pasien = $status_pasien->pasien;
        $rm->keluhan = $request->keluhan;
        $rm->hasil_diaknosa = $request->hasil_diaknosa;
        $rm->catatan = $request->catatan;
        $rm->keterangan = $request->keterangan;
        $rm->tanggal_periksa = $status_pasien->tanggal;
        // $rm->dokter = auth()->user();
        $rm->dokter = 2;
        $status_pasien->rekam_medik()->save($rm);
        $no_rm = Carbon::parse($status_pasien->tanggal)->isoFormat('YYMMDD') . sprintf("%'06d", $status_pasien->rekam_medik->id);
        $status_pasien->rekam_medik()->update(['no_rekam_medik' => $no_rm]);
        $rm = Rekam_medik::findOrfail($status_pasien->rekam_medik->id);
        $data['tindakan'] = array();
        for ($i = 0; $i < $request->count_tindakan; $i++) {
            array_push($data['tindakan'], ['tindakan' => $request->tindakan[$i + 1]]);
        }
        $rm->rm_tindakan()->createMany($data['tindakan']);
        $data['obat'] = array();
        for ($i = 0; $i < $request->count_obat; $i++) {
            array_push($data['obat'], array(
                'obat' => $request->obat[$i + 1],
                'dosis' => $request->dosis[$i + 1],
                'aturan_minum' => $request->aturan_minum[$i + 1],
                'jumlah' => $request->jumlah[$i + 1],
            ));
        }
        $rm->rm_obat()->createMany($data['obat']);
        // $status_pasien->update(['status' => 'Antri Obat']);
        if ($request->keterangan == 'Rujukan') {
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
                ->whereKey($rm->id)
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
            foreach ($data->rm_obat as $key => $value) {
                $obat += $value->obat_->harga * $value->jumlah;
            }
            $kartu = 0;
            $transakasi = new Transaksi_pasien();
            $transakasi->pasien = $data->pasien;
            $transakasi->tanggal_periksa = $data->tanggal_periksa;
            $transakasi->tebus_obat = 'tebus';
            $transakasi->biaya_obat = $obat;
            $transakasi->biaya_tindakan = $tindakan;
            $transakasi->biaya_kartu = $kartu;
            $transakasi->biaya_total = $tindakan + $obat + $kartu;
            $transakasi->jumlah_bayar = 0;
            $transakasi->jumlah_kembalian = 0;
            $transakasi->status_bayar = 'belum';
            $transakasi->status_pasien = $data->status_pasien;
            $data->transaksi()->save($transakasi);
            $data->status()->update(['status' => 'Perlu Data Rujukan']);
        }
        return response()->json([
            'type' => 'success',
            'message' => 'Created.',
            'data' => $status_pasien
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
        $data['antrian'] = Antrian::whereKey($id)->with([
            'pasien' => function ($query) {
                $query->select('id', 'no_kartu', 'nama', 'jenis_kelamin', 'alamat', 'agama', 'usia', 'gol_darah');
            }, 'dokter' => function ($query) {
                $query->select('id', 'nama');
            }, 'poliklinik' => function ($query) {
                $query->select('id', 'nama');
            }, 'status' => function ($query) {
                $query->select('id', 'status');
            }
        ])->firstOrFail(['id', 'tgl_periksa', 'pasien', 'dokter', 'poliklinik', 'status']);
        $data['antrian']->status()->update(['status' => 'Peiksa']);
        $data['tindakan'] = Tindakan::get(['id', 'nama']);
        $data['obat'] = Obat::get(['id', 'nama']);
        $data['tindakan_count'] = 1;
        $data['obat_count'] = 1;
        return response()->json([
            'type' => 'success',
            'message' => 'Updated.',
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
