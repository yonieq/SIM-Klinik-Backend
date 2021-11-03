<?php

namespace App\Http\Controllers\apotek;

use App\Http\Controllers\Controller;
use App\Models\Transaksi_pasien;
use Illuminate\Http\Request;

class Penebusan_obatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['antrian'] = Transaksi_pasien::with([
            'pasien' => function ($query) {
                $query->select('id', 'nama', 'alamat');
            },
            'dokter' => function ($query) {
                $query->select('id', 'nama');
            },
        ])
        // ->whereHas(
        //     'status',
        //     function ($query) {
        //         // $query->select('id', 'status');
        //         $query->where('status', "=", 'Antri Obat');
        //     }
        // )
        ->where('tebus_obat','tebus')
            ->get([
                'id',
                'tanggal_periksa',
                'tebus_obat',
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
