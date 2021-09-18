<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateAntrian extends FormRequest
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
        'nik'=> ["required","numeric","digits:16", 'exists:pasien,no_ktp'],
        'jadwal_id'=> ["required","numeric", 'exists:jadwal_dokter,id'],
        'tgl_periksa'=> "required|date",
        ];
    }
}
