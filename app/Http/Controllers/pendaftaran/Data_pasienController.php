<?php

namespace App\Http\Controllers\pendaftaran;

use App\Http\Controllers\Controller;
use App\Models\Jenis_layanan;
use App\Models\KotaKabupaten;
use App\Models\Pasien;
use Illuminate\Http\Request;

class Data_pasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Pasien::with([
            'layanan' => function ($query) {
                $query->select('pasien', 'layanan');
            },
            'layanan.layanan' => function ($query) {
                $query->select('id', 'nama');
            }
        ])
            ->get([
                'pasien.id as id',
                'pasien.created_at as tanggal',
                'pasien.no_kartu as no_kartu',
                'pasien.nik as nik',
                'pasien.nama as nama',
                'pasien.jenis_kelamin as jenis_kelamin',
                'pasien.alamat as alamat',
                'pasien.usia as usia',
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
    public function filter_tanggal(Request $request)
    {
        if ($request->mulai == $request->akhir) {
            $data = Pasien::with([
                'layanan' => function ($query) {
                    $query->select('pasien', 'layanan');
                },
                'layanan.layanan' => function ($query) {
                    $query->select('id', 'nama');
                }
            ])->whereDate('created_at',$request->mulai)
                ->get([
                    'pasien.id as id',
                    'pasien.created_at as tanggal',
                    'pasien.no_kartu as no_kartu',
                    'pasien.nik as nik',
                    'pasien.nama as nama',
                    'pasien.jenis_kelamin as jenis_kelamin',
                    'pasien.alamat as alamat',
                    'pasien.usia as usia',
                ]);
        } else {
            $data = Pasien::with([
                'layanan' => function ($query) {
                    $query->select('pasien', 'layanan');
                },
                'layanan.layanan' => function ($query) {
                    $query->select('id', 'nama');
                }
            ])->whereBetween('created_at', [$request->mulai, $request->akhir])
                ->get([
                    'pasien.id as id',
                    'pasien.created_at as tanggal',
                    'pasien.no_kartu as no_kartu',
                    'pasien.nik as nik',
                    'pasien.nama as nama',
                    'pasien.jenis_kelamin as jenis_kelamin',
                    'pasien.alamat as alamat',
                    'pasien.usia as usia',
                ]);
        }
        
        
        return response()->json([
            'type' => 'success',
            'message' => 'Geted.',
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
        $data['pasien'] = Pasien::whereKey($id)
            ->firstOrFail([
                'pasien.id as id',
                'pasien.no_kartu as mo_kartu',
                'pasien.nama as nama',
                'pasien.alamat as alamat',
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
        $data['pasien'] = Pasien::with([
            'tempat_lahir' => function ($query) {
                $query->select('id', 'name');
            },
            'layanan' => function ($query) {
                $query->select('pasien', 'layanan', 'no_layanan');
            },
            'layanan.layanan' => function ($query) {
                $query->select('id', 'nama');
            }
        ])
            ->whereKey($id)
            ->firstOrFail([
                'pasien.id as id',
                'pasien.no_kartu as mo_kartu',
                'pasien.nik as nik',
                'pasien.nama as nama',
                'pasien.tempat_lahir as tempat_lahir',
                'pasien.tanggal_lahir as tanggal_lahir',
                'pasien.jenis_kelamin as jenis_kelamin',
                'pasien.alamat as alamat',
                'pasien.agama as agama',
                'pasien.pekerjaan as pekerjaan',
                'pasien.no_telepon as no_telepon',
                'pasien.gol_darah as gol_darah',
                'pasien.usia as usia',
            ]);
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
        $alamat = explode(", ", $data['pasien']->alamat);
        $data['pasien']['alamat'] = array(
            'kota_kabupaten' => $alamat[0],
            'kecamatan'=>str_replace("Kec. ", "", $alamat[1]),
            'desa_kelurahan'=>$alamat[2],
            'RT_RW'=>str_replace("RT/RW ", "", $alamat[3]),
            'alamat'=>$alamat[4]
        );
        $data['kota_kabupaten'] = KotaKabupaten::get(['id', 'name']);
        return response()->json([
            'type' => 'success',
            'message' => 'Geted.',
            'data' => $data
        ]);
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
        $alamat= $request->kota_kabupaten.", Kec. ".$request->kecamatan.
        ', '.$request->desa_kelurahan.', RT/RW '.$request->RT_RW.
        ', '.$request->alamat;
        $data = Pasien::findOrFail($id);
        $data->nik = $request->nik;
        $data->nama = $request->nama;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->alamat = $alamat;
        $data->agama = $request->agama;
        $data->pekerjaan = $request->pekerjaan;
        $data->no_telepon = $request->no_telepon;
        $data->gol_darah = $request->gol_darah;
        $data->usia = $request->usia;
        $data->layanan->no_layanan = $request->no_layanan;
        $data->layanan->layanan = $request->jenis_layanan;
        $data->push();
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
