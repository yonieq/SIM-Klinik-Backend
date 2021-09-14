<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePasien extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'name'=> "required",
        'no_ktp'=> "required|numeric|unique:pasien|digits:16",
        'kategori'=> "required|exists:kategori_pasien,id",
        'tempat_lahir'=> "required|exists:kota_kabupaten,id",
        'tanggal_lahir'=> "required|date",
        'jenis_kelamin'=> "required|in:laki-laki,perempuan",
        'alamat'=> "required",
        'no_hp'=> "required|numeric|unique:pasien|digits:13",
        'usia'=> "required|numeric",
        'gol_darah'=> "required|in:A, B, AB, O,Belum Diketahui"
        ];
    }
}