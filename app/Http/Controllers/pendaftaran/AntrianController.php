<?php

namespace App\Http\Controllers\pendaftaran;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GanerateCodeAntrian;
use App\Http\Requests\ValidateAntrian;
use App\Http\Requests\ValidateUpdateAntrian;
use App\Models\Antrian;
use App\Models\Jadwal_Dokter;
use App\Models\Pasien;
use App\Models\Status_pasien;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AntrianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Antrian::join('pasien', 'antrian.nik', '=', 'pasien.no_ktp')
            ->join('jadwal_dokter', 'antrian.jadwal_id', '=', 'jadwal_dokter.id')
            ->join('poliklinik', 'jadwal_dokter.poli', '=', 'poliklinik.id')
            ->join('status_pasien', 'antrian.status', '=', 'status_pasien.id')
            ->join('users', 'antrian.dokter', '=', 'users.id')
            ->get([
                'antrian.id as id',
                'antrian.no_antri as no_antri',
                'pasien.name as name',
                'antrian.tgl_periksa as tgl_periksa',
                'users.name as dokter',
                'poliklinik.name as poli',
                'status_pasien.status as status'
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
        $pasien = Pasien::get([
            'id',
            'name',
            'no_ktp',
        ]);
        return response()->json([
            'type' => 'success',
            'message' => 'Geted.',
            'data' => [
                'pasien' => $pasien
            ]
        ]);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateAntrian $request)
    {
        Carbon::setLocale('id');
        $hari = Carbon::parse($request->tgl_periksa)->isoFormat('dddd');

        $datadokter = $this->getDataDokter($request->jadwal_id);
        if (strtolower($hari) !=  $datadokter->hari) {
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'jadwal_id' => ['Dokter dan poli tidak sesuai tanggal'],
                ]
            ], 422);
        }
        $status = Status_pasien::create([
            'pasien_id' => Pasien::where('no_ktp', $request->nik)->first('id')->id,
            'status' => 'antri',
            'tanggal' => $request->tgl_periksa,
        ]);
        $data = Antrian::create([
            'no_antri' => GanerateCodeAntrian::ganerate("antrian", 'tgl_periksa', $request->tgl_periksa, 'dokter', $datadokter->dokter_id, 'jam', $datadokter->jam_mulai, 'ANTR|' . $datadokter->kode, "no_antri"),
            'nik' => $request->nik,
            'tgl_periksa' => $request->tgl_periksa,
            'jam' => $datadokter->jam_mulai,
            'jadwal_id' => $request->jadwal_id,
            'dokter' => $datadokter->dokter_id,
            'status' => $status->id
        ]);
        return response()->json([
            'type' => 'success',
            'message' => 'Created.',
            'data' => $data
        ]);;
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

        $antrian = Antrian::where('antrian.id', $id)
            ->join('pasien', 'antrian.nik', '=', 'pasien.no_ktp')
            ->join('status_pasien', 'antrian.status', '=', 'status_pasien.id')
            ->join('users', 'antrian.dokter', '=', 'users.id')
            ->firstOrFail([
                'antrian.id as id',
                'antrian.no_antri as no_antri',
                'pasien.name as name',
                'antrian.tgl_periksa as tgl_periksa',
                'users.name as dokter',
                'status_pasien.status as status'
            ]);
        if ($antrian->status != "antri") {
            return response()->json([
                'type' => 'failed',
                'message' => 'Data tidak dapat dirubah.',
            ], 403);
        }
        Carbon::setLocale('id');
        $hari = Carbon::parse($antrian->tgl_periksa)->isoFormat('dddd');
        $list = Jadwal_Dokter::join('users', 'jadwal_dokter.dokter_id', '=', 'users.id')
            ->join('poliklinik', 'jadwal_dokter.poli', '=', 'poliklinik.id')
            ->where('jadwal_dokter.hari', $hari)
            ->get([
                'jadwal_dokter.id as id',
                // 'jadwal_dokter.hari as hari',
                // 'jadwal_dokter.dokter_id as dokter_id',
                'users.name as name',
                'poliklinik.name as poli',
                'jadwal_dokter.jam_mulai as jam_mulai',
                'jadwal_dokter.jam_akhir as jam_akhir',
            ]);
        return response()->json([
            'type' => 'success',
            'message' => 'Geted.',
            'data' => [
                'antrian' => $antrian,
                'polidkter' => $list
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateUpdateAntrian $request, $id)
    {
        Carbon::setLocale('id');
        $hari = Carbon::parse($request->tgl_periksa)->isoFormat('dddd');

        $datadokter = $this->getDataDokter($request->jadwal_id);
        if (strtolower($hari) !=  $datadokter->hari) {
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'jadwal_id' => ['Dokter dan poli tidak sesuai tanggal'],
                ]
            ], 422);
        }
        $antrian = Antrian::where('antrian.id', $id)
            ->join('status_pasien', 'antrian.status', '=', 'status_pasien.id')
            ->firstOrFail([
                'status_pasien.status as status'
            ]);
        if ($antrian->status != "antri") {
            return response()->json([
                'type' => 'failed',
                'message' => 'Data tidak dapat dirubah.',
            ], 403);
        }
        $data = Antrian::findOrFail($id);
        $data->no_antri = GanerateCodeAntrian::ganerate(
            "antrian",
            'tgl_periksa',
            $request->tgl_periksa,
            'dokter',
            $datadokter->dokter_id,
            'jam',
            $datadokter->jam_mulai,
            'ANTR|' . $datadokter->kode,
            "no_antri"
        );
        $data->tgl_periksa = $request->tgl_periksa;
        $data->jam = $datadokter->jam_mulai;
        $data->jadwal_id = $request->jadwal_id;
        $data->dokter = $datadokter->dokter_id;
        $data->update();
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
        $antrian = Antrian::where('antrian.id', $id)
            ->join('status_pasien', 'antrian.status', '=', 'status_pasien.id')
            ->firstOrFail([
                'status_pasien.status as status'
            ]);
        if ($antrian->status != "antri") {
            return response()->json([
                'type' => 'failed',
                'message' => 'Data tidak dapat dirubah.',
            ], 403);
        }
        $antrian->delete();
        return response()->json([
            'type' => 'success',
            'message' => 'Deleted.',
            'data' => $antrian
        ]);
    }
    public function getDokter($tanggal)
    {
        Carbon::setLocale('id');
        $hari = Carbon::parse($tanggal)->isoFormat('dddd');

        $data = Jadwal_Dokter::join('users', 'jadwal_dokter.dokter_id', '=', 'users.id')
            ->join('poliklinik', 'jadwal_dokter.poli', '=', 'poliklinik.id')
            ->where('jadwal_dokter.hari', $hari)
            ->get([
                'jadwal_dokter.id as id',
                // 'jadwal_dokter.hari as hari',
                // 'jadwal_dokter.dokter_id as dokter_id',
                'users.name as name',
                'poliklinik.name as poli',
                'jadwal_dokter.jam_mulai as jam_mulai',
                'jadwal_dokter.jam_akhir as jam_akhir',
            ]);
        return response()->json([
            'type' => 'success',
            'message' => 'Geted.',
            'data' => $data
        ]);
    }
    public function getDataDokter($id)
    {
        $data = Jadwal_Dokter::join('users', 'jadwal_dokter.dokter_id', '=', 'users.id')
            ->join('poliklinik', 'jadwal_dokter.poli', '=', 'poliklinik.id')
            ->where('jadwal_dokter.id', $id)
            ->first([
                'jadwal_dokter.dokter_id as dokter_id',
                'jadwal_dokter.jam_mulai as jam_mulai',
                'jadwal_dokter.hari as hari',
                'poliklinik.kode as kode',
            ]);
        return  $data;
    }
}
