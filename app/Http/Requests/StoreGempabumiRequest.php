<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreGempabumiRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest
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
            'waktu' => 'required',
            'lintang' => 'required|min:4|max:5',
            'bujur'=> 'required|min:3|max:6',
            'magnitudo' => 'required|min:1|max:3',
            'kedalaman' => 'required|min:2|max:3',
            'lokasi' =>'required',
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
            'waktu' => 'Jam harus diisi',
            'lintang.required' => 'Lintang  harus diisi',
            'lintang.between' => 'Lintang harus diantara 11 LU - 11 LS',
            'bujur.between'=> 'Bujur harus diantara 134.00 BujurTimur - 142 BujurTimur',
            'magnitudo.required' => 'Magnitudo harus diisi',
            'kedalaman.required' => 'Kedalaman harus diisi',
            'lokasi.required' =>'Lokasi harus diisi',
            'id_gempabumi' => 'required|unique:gempabumis,id_gempabumi'
        ];
    }
}
