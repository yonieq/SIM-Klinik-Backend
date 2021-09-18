<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidateUpdateJadwalDokter extends FormRequest
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
            "dokter_id" => ["required",Rule::exists('users', 'id')
            ->where('kategori', 'dokter')],
            // "hari" => "required|in:senin,selasa,rabu,kamis,jumat",
            // 'poli'=> "required|exists:poliklinik,id",
            'jam_mulai'=> "required|date_format:H:i",
            'jam_akhir'=> "required|date_format:H:i",

        ];
    }
}
