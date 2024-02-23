<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTokoRequest extends FormRequest
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
        $id_toko = $this->route('toko') ? $this->route('toko')->id_toko : null;

        return [
            'id_toko' => [Rule::unique('toko')->ignore($id_toko, 'id_toko')->where(function ($query) use ($id_toko) {
                return $query->where('id_toko', '=', $id_toko);
            })],
            'nama_toko' => ['required', 'max:255'],
            'lokasi' => ['required', 'max:255']
        ];
    }
}
