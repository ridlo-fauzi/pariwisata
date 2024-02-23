<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PesananRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_customer' => 'required',
            'email' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
            'deskripsi_paket' => 'required',
            'tanggal_keberangkatan' => 'required',
            'jumlah_rombongan' => 'required'
        ];
    }
}
