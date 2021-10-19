<?php

namespace App\Http\Controllers\administrator;

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
        $data = User::where('kategori', '!=', 'owner')
            ->where('kategori', '!=', 'admin')
            ->where('kategori', '!=', 'dokter')
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
        $kategori = [
            [
                'name' => 'kepala kasir',
                'tittle' => 'Kepala Kasir'
            ],
            [
                'name' => 'kasir',
                'tittle' => 'Kasir'
            ],
            [
                'name' => 'kepala apotek',
                'tittle' => 'Kepala Apotek'
            ],
            [
                'name' => 'apotek',
                'tittle' => 'Apotek'
            ],
            [
                'name' => 'dokter',
                'tittle' => 'Dokter'
            ],
            [
                'name' => 'pendaftaran',
                'tittle' => 'Pendaftaran'
            ]
        ];
        $kota = KotaKabupaten::get(['id', 'name']);
        return response()->json([
            'type' => 'success',
            'message' => 'Geted.',
            'data' => [
                'kategori' => $kategori,
                'kota' => $kota
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
        if ($request->kategori == 'Kepala Apotek' || $request->kategori == 'Kepala Kasir') {
            # code...
            if (User::where('kategori', $request->kategori)->exists()) {
                return response()->json([
                    'type' => 'failed',
                    'message' => 'User '.$request->kategori.' ada.',
                ]);
            }
            $user = User::create([
                'name' => $request->name,
                // 'email' => $request->email,
                'password' => bcrypt($request->password),
                'username' => $request->username,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'kategori' => $request->kategori,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'gaji' => $request->gaji,
                'foto' => $request->foto
            ]);
            return response()->json([
                'type' => 'success',
                'message' => 'Regidtered.',
                'data' => $user
            ]);
        }
        $user = User::create([
            'name' => $request->name,
            // 'email' => $request->email,
            'password' => bcrypt($request->password),
            'username' => $request->username,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kategori' => $request->kategori,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'gaji' => $request->gaji,
            'foto' => $request->foto
        ]);
        $user->tempat_lahir_;
        return response()->json([
            'type' => 'success',
            'message' => 'Regidtered.',
            'data' => $user
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
        $data = User::where('kategori', '!=', 'owner')
            ->where('kategori', '!=', 'admin')
            ->where('kategori', '!=', 'dokter')
            ->where('users.id', $id)
            // ->join('kota_kabupaten', 'users.tempat_lahir', '=', 'kota_kabupaten.id')
            ->with(['tempat_lahir_' => function($query) {
                $query->select('id','name');
            }])
            ->firstOrFail([
                'users.id as id',
                'users.name as name',
                'users.tempat_lahir as tempat_lahir',
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
        $kategori = [
            [
                'name' => 'kepala kasir',
                'tittle' => 'Kepala Kasir'
            ],
            [
                'name' => 'kasir',
                'tittle' => 'Kasir'
            ],
            [
                'name' => 'kepala apotek',
                'tittle' => 'Kepala Apotek'
            ],
            [
                'name' => 'apotek',
                'tittle' => 'Apotek'
            ],
            [
                'name' => 'medis',
                'tittle' => 'Medis'
            ],
            [
                'name' => 'pendaftaran',
                'tittle' => 'Pendaftaran'
            ]
        ];
        $kota = KotaKabupaten::get(['id', 'name']);
        $pegawai = User::where('kategori', '!=', 'owner')
            ->where('kategori', '!=', 'admin')->where('users.id', $id)
            // ->join('kota_kabupaten', 'users.tempat_lahir', '=', 'kota_kabupaten.id')
            ->with(['tempat_lahir_' => function($query) {
                $query->select('id','name');
            }])
            ->firstOrFail([
                'users.id as id',
                'users.name as name',
                'users.tempat_lahir as tempat_lahir',
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
                'pegawai' => $pegawai,
                'kategori' => $kategori,
                'kota' => $kota
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
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->alamat = $request->alamat;
        $data->no_hp = $request->no_hp;
        $data->gaji = $request->gaji;
        $data->foto = $request->foto;
        if ($request->kategori == 'Kepala Apotek' || $request->kategori == 'Kepala Kasir') {
            # code...
            if (User::where('kategori', $request->kategori)->exists()) {
                if ($request->kategori == $data->kategori) {
                    $data->update();
                    $data->tempat_lahir_;
                    return response()->json([
                        'type' => 'success',
                        'message' => 'Updated.',
                        'data' => $data
                    ]);
                }
                return response()->json([
                    'type' => 'failed',
                    'message' => 'User '.$request->kategori.' ada.',
                ]);
            }
            $data->kategori = $request->kategori;
            $data->update();    
            $data->tempat_lahir_;
            return response()->json([
                'type' => 'success',
                'message' => 'Regidtered.',
                'data' => $data
            ]);
        }
        $data->kategori = $request->kategori;
        $data->update();
        $data->tempat_lahir_;
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
        $data = User::findOrFail($id);
        if ($data->kategori == "owner" || $data->kategori == "dokter" || $data->kategori == "admin") {
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
