<?php

namespace App\Http\Controllers\administrasi;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateUpdatePegawai;
use App\Http\Requests\ValidateUserRegistration;
use App\Models\KotaKabupaten;
use App\Models\User;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('kategori','!=','owner')
                ->get([
                    'id',
                    'name',
                    'no_hp',
                    'kategori',
                    'jenis_kelamin',
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
        $kategori =[['kepala kasir'],['kasir'],['kepala apotek'],['apotek'],['medis'],['pendaftaran'],['dokter']];
        $kota = KotaKabupaten::get(['id','name']);
        return response()->json([
            'type' => 'success',
            'message' => 'Geted.',
            'data' => [
                'kategori'=>$kategori,
                'kota'=> $kota
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateUserRegistration $request)
    {
        $user = User::create([
            'name' => $request->name,
            // 'email' => $request->email,
            'password' => bcrypt($request->password),
            'username'=> $request->username,
            'tempat_lahir'=> $request->tempat_lahir,
            'tanggal_lahir'=> $request->tanggal_lahir,
            'jenis_kelamin'=> $request->jenis_kelamin,
            'kategori'=> $request->kategori,
            'alamat'=> $request->alamat,
            'no_hp'=> $request->no_hp,
            'gaji'=> $request->gaji,
            'foto'=> $request->foto
        ]);
        return response()->json([
            'type' => 'success',
            'message' => 'Regidtered.',
            'data' =>$user
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
        $data = User::findOrFail($id);
        $data = User::join('kota_kabupaten', 'users.tempat_lahir', '=', 'kota_kabupaten.id')
                ->where('users.id', $id)
                ->first([
                    'users.name as name',
                    'kota_kabupaten.name as tempat_lahir',
                    'users.tanggal_lahir',
                    'users.jenis_kelamin',
                    'users.kategori',
                    'users.alamat',
                    'users.no_hp',
                    'users.gaji',
                    'users.foto'
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
        $kategori =[['kepala kasir'],['kasir'],['kepala apotek'],['apotek'],['medis'],['pendaftaran'],['dokter']];
        $kota = KotaKabupaten::get(['id','name']);
        $pegawai = User::findOrFail($id);
        $pegawai = User::join('kota_kabupaten', 'users.tempat_lahir', '=', 'kota_kabupaten.id')
                ->where('users.id', $id)
                ->first([
                    'users.name as name',
                    'kota_kabupaten.name as tempat_lahir',
                    'users.tanggal_lahir',
                    'users.jenis_kelamin',
                    'users.kategori',
                    'users.alamat',
                    'users.no_hp',
                    'users.gaji',
                    'users.foto'
                ]);
        return response()->json([
            'type' => 'success',
            'message' => 'Geted.',
            'data' => [
                'pegawai'=>$pegawai,
                'kategori'=>$kategori,
                'kota'=> $kota
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
    public function update(ValidateUpdatePegawai $request, $id)
    {
        $data = User::findOrFail($id);
        $data->name = $request->name;
        $data->kategori = $request->kategori;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->alamat = $request->alamat;
        $data->no_hp = $request->no_hp;
        $data->gaji = $request->gaji;
        $data->foto = $request->foto;
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
        $data = User::findOrFail($id);
        if ($data->kategori== "owner" || $data->kategori== "admin") {
            return response()->json([
                'type' => 'failed',
                'message' => 'Tidak Dapat Menghapus.',
            ]);
        }
        $data->delete();
        return response()->json([
            'type' => 'success',
            'message' => 'Deleted.',
            'data' => $data
        ]);
    }
}
