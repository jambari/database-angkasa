<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateChecklistacceRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest
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
            'tegangan_ups' => 'required|numeric',
            'temperatur' => 'required|numeric',
            'petugas' => 'required|alpha'
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
            'tegangan_ups.required' => 'Tegangan UPS harus diisi.',
            'tegangan_ups.numeric' => 'Tegangan UPS harus berformat angka.',
            'temperatur.required' => 'Temperatur harus diisi.',
            'temperatur.numeric' => 'Temperatur harus berformat angka',
            'petugas.required' => 'Petugas harus diisi',
            'petugas.alpha' => 'Petugas harus hanya terdiri dari huruf.' 
        ];
    }
}
