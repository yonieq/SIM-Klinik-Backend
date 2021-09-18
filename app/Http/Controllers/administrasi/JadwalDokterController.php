<?php

namespace App\Http\Controllers\administrasi;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateJadwalDokter;
use App\Http\Requests\ValidateUpdateJadwalDokter;
use App\Models\Dokterpoli;
use App\Models\Jadwal_Dokter;
use App\Models\Poliklinik;
use App\Models\User;
use Illuminate\Http\Request;

class JadwalDokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Jadwal_Dokter::join('users', 'jadwal_dokter.dokter_id', '=', 'users.id')
            ->join('poliklinik', 'jadwal_dokter.poli', '=', 'poliklinik.id')
            ->get([
                'jadwal_dokter.id as id',
                'jadwal_dokter.hari as hari',
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hari = [
            [
                'name' => 'senin',
                'tittle' => 'Senin'
            ],
            [
                'name' => 'selasa',
                'tittle' => 'Selasa'
            ],
            [
                'name' => 'rabu',
                'tittle' => 'Rabu'
            ],
            [
                'name' => 'kamis',
                'tittle' => 'Kamis'
            ],
            [
                'name' => 'jumat',
                'tittle' => 'Jumat'
            ]
        ];

        $poli = Poliklinik::get(['id', 'name']);
        return response()->json([
            'type' => 'success',
            'message' => 'Geted.',
            'data' => [
                'hari' => $hari,
                'poli' => $poli
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateJadwalDokter $request)
    {
        if ($request->jam_mulai >= $request->jam_akhir) {
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'jam_mulai' => ['jam mualai tidak sesuai'],
                    'jam_akhir' => ['jam akhir tidak sesuai'],
                ]
            ], 422);
        }
        if ($request->poli != $this->cekPoliDokter($request->dokter_id)) {
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'poli' => ['poli tidak sesuai dengan dokter'],
                ]
            ], 422);
        }
        if (Jadwal_Dokter::where(['hari' => $request->hari, 'poli' => $request->poli])->exists()) {
            if (Jadwal_Dokter::where(['hari' => $request->hari, 'poli' => $request->poli])
                ->whereBetween('jam_mulai', [$request->jam_mulai, date('H:i', strtotime($request->jam_akhir) - 60)])
                ->orWhereBetween('jam_akhir', [date('H:i', strtotime($request->jam_mulai) + 60), $request->jam_akhir])
                ->where(['hari' => $request->hari, 'poli' => $request->poli])
                ->exists()
            ) {
                return response()->json([
                    'message' => 'The given data was invalid.',
                    'errors' => [
                        'jam_mulai' => ['Masih ada dokter lain'],
                        'jam_akhir' => ['Masih ada dokter lain'],
                    ]
                ], 422);
            }
        }

        $user = Jadwal_Dokter::create([
            'dokter_id' => $request->dokter_id,
            'hari' => $request->hari,
            'poli' => $request->poli,
            'jam_mulai' => $request->jam_mulai,
            'jam_akhir' => $request->jam_akhir,
        ]);
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
        $jadwal = Jadwal_Dokter::where('jadwal_dokter.id', $id)
            ->join('users', 'jadwal_dokter.dokter_id', '=', 'users.id')
            ->join('poliklinik', 'jadwal_dokter.poli', '=', 'poliklinik.id')
            ->firstOrFail([
                'jadwal_dokter.id as id',
                'jadwal_dokter.hari as hari',
                'users.name as name',
                'poliklinik.name as poli',
                'jadwal_dokter.jam_mulai as jam_mulai',
                'jadwal_dokter.jam_akhir as jam_akhir',
                'jadwal_dokter.poli as idpoli',
            ]);
        $dokter = Dokterpoli::where('poli_id', $jadwal->idpoli)
            ->join('users', 'dokterpoli.dokter_id', '=', 'users.id')
            ->join('poliklinik', 'dokterpoli.poli_id', '=', 'poliklinik.id')
            ->get([
                'users.id as id',
                'users.name as name',
                'poliklinik.name as poli',
            ]);
        return response()->json([
            'type' => 'success',
            'message' => 'Geted.',
            'data' => [
                'jadwal' => $jadwal,
                'dokter' => $dokter
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
    public function update(ValidateUpdateJadwalDokter $request, $id)
    {
        if ($request->jam_mulai >= $request->jam_akhir) {
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'jam_mulai' => ['jam mualai tidak sesuai'],
                    'jam_akhir' => ['jam akhir tidak sesuai'],
                ]
            ], 422);
        }

        $data = Jadwal_Dokter::findOrFail($id);
        if ($data->poli != $this->cekPoliDokter($request->dokter_id)) {
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'dokter_id' => ['dokter tidak sesuai dengan poli'],
                ]
            ], 422);
        }
        if ($data->jam_mulai == $request->jam_mulai . ':00'  && $data->jam_akhir == $request->jam_akhir . ':00') {
            $data->dokter_id = $request->dokter_id;
            $data->update();
            // echo 'simpan';
        } else if ($data->jam_mulai == $request->jam_mulai . ':00') {
            if (Jadwal_Dokter::where(['hari' => $data->hari, 'poli' => $data->poli])
                ->whereBetween('jam_akhir', [date('H:i', strtotime($request->jam_mulai) + 60), $request->jam_akhir])
                ->exists()
            ) {
                return response()->json([
                    'message' => 'The given data was invalid.',
                    'errors' => [
                        'jam_akhir' => ['Masih ada dokter lain'],
                    ]
                ], 422);
            }
            // echo 'cek akhir';
        } else if ($data->jam_akhir == $request->jam_akhir . ':00') {
            if (Jadwal_Dokter::where(['hari' => $data->hari, 'poli' => $data->poli])
                ->whereBetween('jam_mulai', [date('H:i', strtotime($request->jam_mulai) + 60), $request->jam_akhir])
                ->exists()
            ) {
                return response()->json([
                    'message' => 'The given data was invalid.',
                    'errors' => [
                        'jam_mulai' => ['Masih ada dokter lain'],
                    ]
                ], 422);
            }
            // echo 'cek awal';
        } else {
            if (Jadwal_Dokter::where(['hari' => $data->hari, 'poli' => $data->poli])
                ->whereBetween('jam_mulai', [$request->jam_mulai, date('H:i', strtotime($request->jam_akhir) - 60)])
                ->orWhereBetween('jam_akhir', [date('H:i', strtotime($request->jam_mulai) + 60), $request->jam_akhir])
                ->where(['hari' => $data->hari, 'poli' => $data->poli])
                ->exists()
            ) {
                if (Jadwal_Dokter::where(['hari' => $data->hari, 'poli' => $data->poli])
                    ->whereBetween('jam_mulai', [$request->jam_mulai, date('H:i', strtotime($request->jam_akhir) - 60)])
                    ->orWhereBetween('jam_akhir', [date('H:i', strtotime($request->jam_mulai) + 60), $request->jam_akhir])
                    ->where(['hari' => $data->hari, 'poli' => $data->poli])
                    ->count() == 1 && Jadwal_Dokter::where(['hari' => $data->hari, 'poli' => $data->poli])
                    ->whereBetween('jam_mulai', [$request->jam_mulai, date('H:i', strtotime($request->jam_akhir) - 60)])
                    ->orWhereBetween('jam_akhir', [date('H:i', strtotime($request->jam_mulai) + 60), $request->jam_akhir])
                    ->where(['hari' => $data->hari, 'poli' => $data->poli])
                    ->first('dokter_id')->dokter_id == $data->dokter_id
                ) {
                    $data->dokter_id = $request->dokter_id;
                    $data->jam_mulai = $request->jam_mulai;
                    $data->jam_akhir = $request->jam_akhir;
                    $data->update();
                    return response()->json([
                        'type' => 'success',
                        'message' => 'Updated.',
                        'data' => $data
                    ]);
                }
                return response()->json([
                    'message' => 'The given data was invalid.',
                    'errors' => [
                        'jam_mulai' => ['Masih ada dokter lain'],
                        'jam_akhir' => ['Masih ada dokter lain'],
                    ]
                ], 422);
            }
            // echo 'cek semua';
        }
        $data->dokter_id = $request->dokter_id;
        $data->jam_mulai = $request->jam_mulai;
        $data->jam_akhir = $request->jam_akhir;
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
        $data = Jadwal_Dokter::findOrFail($id);
        $data->delete();
        return response()->json([
            'type' => 'success',
            'message' => 'Deleted.',
            'data' => $data
        ]);
    }
    public function cekPoliDokter($id)
    {
        $dokterpoli = Dokterpoli::where('dokter_id', $id)->first("poli_id")->poli_id;
        return $dokterpoli;
    }

    public function getDokter($poli)
    {
        $dokter = Dokterpoli::where('poli_id', $poli)
            ->join('users', 'dokterpoli.dokter_id', '=', 'users.id')
            ->join('poliklinik', 'dokterpoli.poli_id', '=', 'poliklinik.id')
            ->get([
                'users.id as id',
                'users.name as name',
                'poliklinik.name as poli',
            ]);
        return response()->json([
            'type' => 'success',
            'message' => 'Geted.',
            'data' => $dokter
        ]);
    }
}
