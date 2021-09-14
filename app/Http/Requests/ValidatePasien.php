<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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
        'no_hp'=> ["required","numeric","digits_between:12,15", Rule::unique('pasien')->ignore($this->pasien)],
        'no_ktp'=> ["required","numeric","digits:16", Rule::unique('pasien')->ignore($this->pasien)],
        'kategori'=> "required|exists:kategori_pasien,id",
        'tempat_lahir'=> "required|exists:kota_kabupaten,id",
        'tanggal_lahir'=> "required|date",
        'jenis_kelamin'=> "required|in:laki-laki,perempuan",
        'alamat'=> "required",
        'usia'=> "required|numeric",
        'gol_darah'=> "required|in:A, B, AB, O,Belum Diketahui"
        ];
    }
}
