<?php

namespace App\Http\Controllers\pendaftaran;

use App\Http\Controllers\Controller;
use App\Models\Antrian;
use App\Models\Pasien;
use App\Models\Status_pasien;
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
        $data['total_pasien'] = Pasien::count();
        $data['hari_ini'] = Status_pasien::whereDate('tanggal', Carbon::now())->count();
        $data['batal_hari_ini'] = Status_pasien::whereDate('tanggal', Carbon::now())->where('status',"Batal")->count();
        $data['antrian'] = Antrian::with([
            'pasien' => function ($query) {
                $query->select('id', 'nama','alamat','jenis_kelamin','usia');
            },
            'poliklinik' => function ($query) {
                $query->select('id', 'nama');
            },
            'status' => function ($query) {
                $query->select('id', 'status');
            }
        ])->whereDate('tgl_periksa', Carbon::now())
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
        $antrian = Status_pasien::findOrFail($id);
        $data= $antrian->antrian;
        if ($antrian->status != "Antri") {
            return response()->json([
                'type' => 'failed',
                'message' => 'Tidak Dapat Menghapus.',
            ]);
        }
        $antrian->delete();
        return response()->json([
            'type' => 'success',
            'message' => 'Deleted.',
            'data' => $data
        ]);
    }
}
