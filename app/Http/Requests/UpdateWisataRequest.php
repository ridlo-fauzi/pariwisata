<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateWisataRequest extends FormRequest
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
        $id_wisata = $this->route('wisata') ? $this->route('wisata')->id_wisata : null;

        return [
            'id_wisata' => [Rule::unique('wisata')->ignore($id_wisata, 'id_wisata')->where(function ($query) use ($id_wisata) {
                return $query->where('id_wisata', '=', $id_wisata);
            })],
            'nama_wisata' => ['required', 'max:255'],
            'lokasi' => ['required', 'max:255'],
            'deskripsi' => ['required'],
            'gambar_wisata' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'harga_wisata' => ['required']
        ];
    }
}
