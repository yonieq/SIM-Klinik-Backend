<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidateUpdatePegawai extends FormRequest
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
            "name" => "required",
            // "email" => "required|unique:users",
            // "password" => "required|min:8",
            // 'username'=> "required|unique:users",
            'tempat_lahir'=> "required|exists:kota_kabupaten,id",
            'tanggal_lahir'=> "required|date",
            'jenis_kelamin'=> "required|in:laki-laki,perempuan",
            'kategori'=> "required|in:admin,kepala kasir,kasir,kepala apotek,apotek,medis,pendaftaran",
            'alamat'=> "required",
            'no_hp'=> ["required",Rule::unique('users')->ignore($this->pegawai)],
            'gaji'=> "required|numeric",
            'foto'=> "required"
        ];
    }
}
