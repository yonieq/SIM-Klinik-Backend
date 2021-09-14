<?php

namespace App\Http\Controllers\pendaftaran;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidatePasien;
use App\Models\Kategori_pasien;
use App\Models\KotaKabupaten;
use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pasien::join('kategori_pasien', 'pasien.kategori', '=', 'kategori_pasien.id')
                ->get([
                    'pasien.id as id',
                    'pasien.name as name',
                    'pasien.no_ktp as no_ktp',
                    'kategori_pasien.name as kategori',
                    'pasien.jenis_kelamin as jenis_kelamin',
                    'pasien.alamat as alamat',
                ]);
        return response()->json([
            'type' => 'success',
            'message' => 'Geted.',
            'data' => $data
        ]);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kota = KotaKabupaten::get();
        $kategori= Kategori_pasien::get();
        return response()->json([
            'type' => 'success',
            'message' => 'Geted.',
            'data' => [
                'kota'=> $kota,
                'kategori'=>$kategori
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidatePasien $request)
    {
        //
        $data = Pasien::create([
            'name'=> $request->name,
            'no_ktp'=> $request->no_ktp,
            'kategori'=> $request->kategori,
            'tempat_lahir'=> $request->tempat_lahir,
            'tanggal_lahir'=> $request->tanggal_lahir,
            'jenis_kelamin'=> $request->jenis_kelamin,
            'alamat'=> $request->alamat,
            'no_hp'=> '62'.$request->no_hp,
            'usia'=> $request->usia,
            'gol_darah'=> $request->gol_darah
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
        $data = Pasien::findOrFail($id);
        $data = Pasien::join('kategori_pasien', 'pasien.kategori', '=', 'kategori_pasien.id')
                ->join('kota_kabupaten', 'pasien.tempat_lahir', '=', 'kota_kabupaten.id')
                ->where('pasien.id', $id)
                ->get([
                    'pasien.name as name',
                    'pasien.no_ktp as no_ktp',
                    'kategori_pasien.name as kategori',
                    'kota_kabupaten.name as tempat_lahir',
                    'pasien.tanggal_lahir as tanggal_lahir',
                    'pasien.jenis_kelamin as jenis_kelamin',
                    'pasien.alamat as alamat',
                    'pasien.no_hp as no_hp',
                    'pasien.usia as usia',
                    'pasien.gol_darah as gol_darah'
                ]);
        return response()->json([
            'type' => 'success',
            'message' => 'Geted.',
            'data' => $data
        ]);;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kota = KotaKabupaten::get();
        $kategori= Kategori_pasien::get();
        $pasien = Pasien::findOrFail($id);
        $pasien = Pasien::join('kategori_pasien', 'pasien.kategori', '=', 'kategori_pasien.id')
                ->join('kota_kabupaten', 'pasien.tempat_lahir', '=', 'kota_kabupaten.id')
                ->where('pasien.id', $id)
                ->get([
                    'pasien.name as name',
                    'pasien.no_ktp as no_ktp',
                    'kategori_pasien.name as kategori',
                    'kota_kabupaten.name as tempat_lahir',
                    'pasien.tanggal_lahir as tanggal_lahir',
                    'pasien.jenis_kelamin as jenis_kelamin',
                    'pasien.alamat as alamat',
                    'pasien.no_hp as no_hp',
                    'pasien.usia as usia',
                    'pasien.gol_darah as gol_darah'
                ]);
        return response()->json([
            'type' => 'success',
            'message' => 'Geted.',
            'data' => [
                'pasien'=>$pasien,
                'kategori'=>$kategori,
                'kota'=>$kota
            ]
        ]);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidatePasien $request, $id)
    {
        $data = Pasien::findOrFail($id);
        $data->name = $request->name;
        $data->no_ktp = $request->no_ktp;
        $data->kategori = $request->kategori;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->alamat = $request->alamat;
        $data->no_hp = $request->no_hp;
        $data->usia = $request->usia;
        $data->gol_darah = $request->gol_darah;
        $data->update();
        return response()->json([
            'type' => 'success',
            'message' => 'Updated.',
            'data' => $data
        ]);;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pasien::findOrFail($id);
        $data->delete();
        return response()->json([
            'type' => 'success',
            'message' => 'Deleted.',
            'data' => $data
        ]);;
    }
}
