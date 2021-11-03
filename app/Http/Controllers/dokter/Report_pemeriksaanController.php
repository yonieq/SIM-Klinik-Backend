<?php

namespace App\Http\Controllers\dokter;

use App\Http\Controllers\Controller;
use App\Models\Rekam_medik;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Report_pemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Rekam_medik::with([
            'pasien' => function ($query) {
                $query->select('id', 'nama', 'alamat');
            },
            'rm_tindakan' => function ($query) {
                $query->select('id', 'rekam_medik','tindakan');
            },
            'rm_tindakan.tindakan' => function ($query) {
                $query->select('id', 'nama');
            },
            'rm_obat' => function ($query) {
                $query->select('id','rekam_medik', 'obat');
            },
            'rm_obat.obat' => function ($query) {
                $query->select('id', 'nama');
            },
        ])->whereHas(
            'status',
            function ($query) {
                // $query->select('id', 'status');
                $query->where('status', "!=", 'Antri')
                    ->where('status', "!=", 'Batal');
            }
        )
            // ->where('dokter',auth()->user())
            ->where('dokter', 2)
            ->get([
                'id',
                'keluhan',
                'pasien',
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
        //
    }
}
