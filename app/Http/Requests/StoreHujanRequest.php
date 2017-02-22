<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreHujanRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest
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
            'tanggal' => 'required|unique:hujans,tanggal',
            'obs' => 'numeric|between:0,400',
            'hilman' => 'numeric|between:0,400'
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
            'tanggal.required' => 'Tanggal harus diisi',
            'tanggal.unique' => 'Data sudah ada di database',
            'obs.numeric' => 'Jumlah hujan harus format angka',
            'obs.between' => 'Jumlah obs harus diantara 0 - 400',
            'hilman.numeric' => 'Jumlah hilman harus format angka',
            'hilman.between' => 'Jumlah hilman harus diantara 0 - 400',
        ];
    }
}
