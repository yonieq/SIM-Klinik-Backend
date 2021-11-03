<?php

namespace App\Http\Controllers\pendaftaran;

use App\Http\Controllers\Controller;
use App\Models\Antrian;
use App\Models\Jadwal_Dokter;
use App\Models\Jenis_layanan;
use App\Models\KotaKabupaten;
use App\Models\Layanan_pasien;
use App\Models\Pasien;
use App\Models\Poliklinik;
use App\Models\Status_pasien;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Pasien_baruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['jenis_layanan'] = Jenis_layanan::get(['id', 'nama']);
        $data['agama'] = array(
            ['nama' => 'Islam'],
            ['nama' => 'Kristen'],
            ['nama' => 'Katholik'],
            ['nama' => 'Budha'],
            ['nama' => 'Konghucu']
        );
        $data['gol_darah'] = array(
            ['nama' => 'A'],
            ['nama' => 'B'],
            ['nama' => 'O'],
            ['nama' => 'AB'],
            ['nama' => 'Belum Diketahui']
        );
        $data['kota_kabupaten'] = KotaKabupaten::get(['id', 'name']);
        $data['poliklinik'] = Poliklinik::get(['id', 'nama']);
        return response()->json([
            'type' => 'success',
            'message' => 'Geted.',
            'data' => $data
        ]);
    }
    public function getDokter($tanggal, $poli)
    {
        Carbon::setLocale('id');
        $hari = Carbon::parse($tanggal)->isoFormat('dddd');

        // $data = Jadwal_Dokter::join('users', 'jadwal_dokter.dokter_id', '=', 'users.id')
        //     ->join('poliklinik', 'jadwal_dokter.poli', '=', 'poliklinik.id')
        //     ->where('jadwal_dokter.hari', $hari)
        //     ->get([
        //         'jadwal_dokter.id as id',
        //         // 'jadwal_dokter.hari as hari',
        //         // 'jadwal_dokter.dokter_id as dokter_id',
        //         'users.name as name',
        //         'poliklinik.name as poli',
        //         'jadwal_dokter.jam_mulai as jam_mulai',
        //         'jadwal_dokter.jam_akhir as jam_akhir',
        //     ]);
        $data = Jadwal_Dokter::where(['hari' => $hari, 'poliklinik' => $poli])
            ->with(['dokter' => function ($query) {
                $query->select('id', 'nama');
            },])->get(['id', 'dokter', 'jam_mulai']);
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
        $pasien = new Pasien;
        $alamat = $request->kota_kabupaten . ", Kec. " . $request->kecamatan .
            ', ' . $request->desa_kelurahan . ', RT/RW ' . $request->RT_RW .
            ', ' . $request->alamat;
        $pasien->nik = $request->nik;
        $pasien->nama = $request->nama;
        $pasien->tempat_lahir = $request->tempat_lahir;
        $pasien->tanggal_lahir = $request->tanggal_lahir;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->alamat = $alamat;
        $pasien->agama = $request->agama;
        $pasien->pekerjaan = $request->pekerjaan;
        $pasien->no_telepon = $request->no_telepon;
        $pasien->gol_darah = $request->gol_darah;
        $pasien->usia = $request->usia;
        $pasien->save();
        $no_kartu = Carbon::now()->isoFormat('YYMMDD') . sprintf("%'06d", $pasien->id);
        $pasien->no_kartu = $no_kartu;
        $pasien->save();
        $layanan = new Layanan_pasien;
        $layanan->no_layanan = $request->no_layanan;
        $layanan->layanan = $request->jenis_layanan;
        $pasien->layanan()->save($layanan);
        $status = new Status_pasien;
        $status->status = "Antri";
        $status->tanggal = $request->tanggal_periksa;
        $pasien->status()->save($status);
        $antrian = new Antrian;
        $antrian->tgl_periksa = $request->tanggal_periksa;
        $antrian->dokter = $request->dokter;
        $antrian->pasien = $pasien->id;
        $antrian->poliklinik = $request->poliklinik;
        $status->antrian()->save($antrian);

        $data = array('id' => $pasien->id, 'no_kartu' => $pasien->no_kartu, 'nama' => $pasien->nama, 'alamat' => $pasien->alamat,);
        return response()->json([
            'type' => 'success',
            'message' => 'Created.',
            'data' => $data
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
