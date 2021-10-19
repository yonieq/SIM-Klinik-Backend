<?php

namespace App\Http\Controllers\administrator;

use App\Http\Controllers\Controller;
use App\Http\Middleware\dokter;
use App\Http\Requests\ValidateDokter;
use App\Http\Requests\ValidateUpdateDokter;
use App\Models\Dokterpoli;
use App\Models\KotaKabupaten;
use App\Models\Poliklinik;
use App\Models\User;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('kategori', 'dokter')
            ->with(['dokterPoli' => function($query) {
                $query->select('dokter_id','poli_id');
            },'dokterPoli.poli' => function($query) {
                $query->select('id','name');
            }])
            // ->join('dokterpoli', 'users.id', '=', 'dokterpoli.dokter_id')
            // ->join('poliklinik', 'dokterpoli.poli_id', '=', 'poliklinik.id')
            ->get([
                'users.id as id',
                'users.name as name',
                'users.no_hp as mo_hp',
                // 'poli.name as poli',
                // 'dokterPoli->poli->name as poli',
                'users.jenis_kelamin as jenis_kelamin',
            ]);
        return response()->json([
            'type' => 'success',
            'message' => 'Geted.',
            'data' => $data
        ]);
        //->dokterPoli->poli->name
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $poli = Poliklinik::get(['id', 'name']);
        $kota = KotaKabupaten::get(['id', 'name']);
        return response()->json([
            'type' => 'success',
            'message' => 'Geted.',
            'data' => [
                'poli' => $poli,
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
    public function store(ValidateDokter $request)
    {
        $user = new User;
        $user->name = $request->name;
        // 'email' => $request->email,
        $user->password = bcrypt($request->password);
        $user->username = $request->username;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->kategori = "dokter";
        $user->alamat = $request->alamat;
        $user->no_hp = $request->no_hp;
        $user->gaji = $request->gaji;
        $user->foto = $request->foto;
        $user->save();
        // $user = User::create([
        //     'name' => $request->name,
        //     // 'email' => $request->email,
        //     'password' => bcrypt($request->password),
        //     'username'=> $request->username,
        //     'tempat_lahir'=> $request->tempat_lahir,
        //     'tanggal_lahir'=> $request->tanggal_lahir,
        //     'jenis_kelamin'=> $request->jenis_kelamin,
        //     'kategori'=> "dokter",
        //     'alamat'=> $request->alamat,
        //     'no_hp'=> $request->no_hp,
        //     'gaji'=> $request->gaji,
        //     'foto'=> $request->foto
        // ]);
        // $dokterpoli = Dokterpoli::create([
        //     'dokter_id' => $user->id,
        //     'poli_id' => $request->poli
        // ]);
        $dokterpoli = new Dokterpoli;
        $dokterpoli->poli_id = $request->poli;
        $user->dokterPoli()->save($dokterpoli);
        // $user->dokterPoli;
        $user->dokterPoli->poli;
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
        $data = User::where(['kategori' => 'dokter', 'id' => $id])
            // ->join('kota_kabupaten', 'users.tempat_lahir', '=', 'kota_kabupaten.id')
            // ->join('dokterpoli', 'users.id', '=', 'dokterpoli.dokter_id')
            // ->join('poliklinik', 'dokterpoli.poli_id', '=', 'poliklinik.id')
            ->with(['tempat_lahir_' => function($query) {
                $query->select('id','name');
            },'dokterPoli' => function($query) {
                $query->select('dokter_id','poli_id');
            },'dokterPoli.poli' => function($query) {
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
                'users.foto',
                // 'poliklinik.name as poli'
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
        $poli = Poliklinik::get(['id', 'name']);
        $kota = KotaKabupaten::get(['id', 'name']);
        // $dokter = User::where(['kategori' => 'dokter', 'id' => $id])
        //     ->join('kota_kabupaten', 'users.tempat_lahir', '=', 'kota_kabupaten.id')
        //     ->join('dokterpoli', 'users.id', '=', 'dokterpoli.dokter_id')
        //     ->join('poliklinik', 'dokterpoli.poli_id', '=', 'poliklinik.id')
        //     ->firstOrFail([
        //         'users.id as id',
        //         'users.name as name',
        //         'kota_kabupaten.name as tempat_lahir',
        //         'users.tanggal_lahir',
        //         'users.jenis_kelamin',
        //         'users.kategori',
        //         'users.alamat',
        //         'users.no_hp',
        //         'users.gaji',
        //         'users.foto',
        //         'poliklinik.name as poli'
        //     ]);
        $dokter = User::where(['kategori' => 'dokter', 'id' => $id])
            // ->join('kota_kabupaten', 'users.tempat_lahir', '=', 'kota_kabupaten.id')
            // ->join('dokterpoli', 'users.id', '=', 'dokterpoli.dokter_id')
            // ->join('poliklinik', 'dokterpoli.poli_id', '=', 'poliklinik.id')
            ->with(['tempat_lahir_' => function($query) {
                $query->select('id','name');
            },'dokterPoli' => function($query) {
                $query->select('dokter_id','poli_id');
            },'dokterPoli.poli' => function($query) {
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
                'users.foto',
                // 'poliklinik.name as poli'
            ]);
        return response()->json([
            'type' => 'success',
            'message' => 'Geted.',
            'data' => [
                'dokter' => $dokter,
                'poli' => $poli,
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
    public function update(ValidateUpdateDokter $request, $id)
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
        // $data->update();
        // $dokterpoli = Dokterpoli::where('dokter_id', $data->id)
        //     ->update([
        //         'dokter_id' => $data->id,
        //         'poli_id' => $request->poli
        //     ]);
        $data->dokterPoli->poli_id= $request->poli;
        $data->push();
        $data->tempat_lahir_;
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
        $dokter = User::findOrFail($id);
        if ($dokter->kategori != "dokter") {
            return response()->json([
                'type' => 'failed',
                'message' => 'Tidak Dapat Menghapus.',
            ]);
        }
        $dokterpoli = Dokterpoli::where('dokter_id', $id)->firstOrFail();
        $dokterpoli->delete();
        $dokter->delete();
        return response()->json([
            'type' => 'success',
            'message' => 'Deleted.',
            'data' => $dokter
        ]);
    }
}
