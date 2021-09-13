<?php

namespace App\Http\Controllers\apotek;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GanerateCode;
use App\Http\Requests\ValidateObatInput;
use App\Http\Requests\ValidateObatUpdate;
use App\Http\Requests\ValidateObatUpdateStok;
use App\Models\Jenis_obat;
use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Obat::get([
            'id',
            'name',
            'kode',
            'jenis',
            'kadaluarsa',
            'stok'
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
        $jenis = Jenis_obat::get(['id', 'name']);
        return response()->json([
            'type' => 'success',
            'message' => 'Geted.',
            'data' => [
                'jenis_obat' => $jenis
            ]
        ]);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateObatInput $request)
    {
        $data = Obat::create([
            'name' => $request->name,
            'kode' => GanerateCode::ganerate("obat", 'OBT', "kode"),
            'jenis' => $request->jenis,
            'kadaluarsa' => $request->kadaluarsa,
            'stok' => $request->stok,
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
        //
        $data = Obat::findOrFail($id);
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
        $jenis = Jenis_obat::get(['id', 'name']);
        $obat = Obat::findOrFail($id);
        return response()->json([
            'type' => 'success',
            'message' => 'Geted.',
            'data' => [
                'jenis'=>$jenis,
                'obat'=>$obat
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
    public function update(ValidateObatUpdate $request, $id)
    {
        $data = Obat::findOrFail($id);
        $data->update([
            'name'=>$request->name,
            'jenis'=>$request->jenis,
            'kadaluarsa'=> $request->kadaluarsa
        ]);
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
        $data = Obat::findOrFail($id);
        if ($data->stok >0 ) {
            return response()->json([
                'type' => 'Failed',
                'message' => 'Masih Terdapat Stok.',
                'data' => $data
            ]);;
        }
        $data->delete();
        return response()->json([
            'type' => 'success',
            'message' => 'Deleted.',
            'data' => $data
        ]);;

    }
    public function updateStok(ValidateObatUpdateStok $request, $id)
    {
        $data = Obat::findOrFail($id);
        $data->stok = $request->stok;
        $data->update();
        return response()->json([
            'type' => 'success',
            'message' => 'Stok Updated.',
            'data' => $data
        ]);
    }

}
