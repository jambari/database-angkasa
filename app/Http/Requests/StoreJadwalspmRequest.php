<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreJadwalspmRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'name' => 'required|min:5|max:255'
            'tanggal' => 'required|unique:jadwalspms,tanggal',
            'kegiatan' => 'required|alpha',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'tanggal.required' => 'Tanggal harus diisi.',
            'tanggal.unique' => 'Tanggal sudah diinput.',
            'kegiatan.required' => 'Jenis kegiatan harus diisi.',
            'kegiatan.alpha' => 'Kegiatan harus Alpha numeric.'
        ];
    }
}
