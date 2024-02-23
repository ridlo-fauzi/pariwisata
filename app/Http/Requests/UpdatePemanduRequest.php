<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePemanduRequest extends FormRequest
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
        $id_pemandu = $this->route('pemandu') ? $this->route('pemandu')->id_pemandu : null;

        return [
            'id_pemandu' => [Rule::unique('pemandu')->ignore($id_pemandu, 'id_pemandu')->where(function ($query) use ($id_pemandu) {
                return $query->where('id_pemandu', '=', $id_pemandu);
            })],
            'nama_pemandu' => ['required', 'max:255'],
            'telp' => ['required', 'max:255'],
            'tanggal_keberangkatan' => ['required', 'max:225']
        ];
    }
}
