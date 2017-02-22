<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateKindexRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest
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
            'tanggal' => 'required',
            'k1' => 'integer|between:0,9',
            'k2' => 'integer|between:0,9',
            'k2' => 'integer|between:0,9',
            'k2' => 'integer|between:0,9',
            'k2' => 'integer|between:0,9',
            'k2' => 'integer|between:0,9',
            'k2' => 'integer|between:0,9',
            'k2' => 'integer|between:0,9',
            'aindex' => 'required|integer|between:0,400'
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
            'k1.integer' => 'K1 harus berupa angka.',
            'k1.between' => 'Nilai K indeks harus diantara 0 - 9',
            'k2.integer' => 'K2 harus berupa angka.',
            'k2.between' => 'Nilai K indeks harus diantara 0 - 9',
            'k3.integer' => 'K3 harus berupa angka.',
            'k3.between' => 'Nilai K indeks harus diantara 0 - 9',
            'k4.integer' => 'K4 hharus berupa angka.',
            'k4.between' => 'Nilai K indeks harus diantara 0 - 9',
            'k5.integer' => 'K5 harus berupa angka.',
            'k5.between' => 'Nilai K indeks harus diantara 0 - 9',
            'k6.integer' => 'K6 harus berupa angka.',
            'k6.between' => 'Nilai K indeks harus diantara 0 - 9',
            'k7.integer' => 'K7 harus berupa angka.',
            'k7.between' => 'Nilai K indeks harus diantara 0 - 9',
            'k8.integer' => 'K8 harus berupa angka.',
            'k8.between' => 'Nilai K indeks harus diantara 0 - 9',
            'aindex.required' => 'A index harus diisi.',
            'aindex.integer' => 'A index harus berupa angka.',
            'aindex.between' => 'Nilai K indeks harus diantara 0 - 400'
        ];
    }
}
