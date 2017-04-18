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
            'tanggal' => 'required|unique_with:gempabumis,waktu,sumber',
            'waktu' => ['required', 'regex:^(([0-1][0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?)$^'],
            'lintang' => 'required|between:-11,11|numeric',
            'bujur'=> 'required|between:130,142.5|numeric',
            'magnitudo' => 'required|integer|between:1,10',
            'kedalaman' => 'required|integer|between:0,500',
            'lokasi' =>'required|alpha_num',
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
            'tanggal.unique_with' => 'Data dengan origin time sudah ada di database.',
            'waktu.required' => 'Waktu harus diisi.',
            'waktu.regex' =>'Format waktu harus 00:00:00.',
            'lintang.required' => 'Lintang harus diisi.',
            'lintang.numeric' => 'Lintang harus numerik'
            'lintang.between' => 'Lintang harus diantara 11 LS - 11 LU.',
            'bujur.required'=> 'Bujur harus diisi.',
            'bujur.between' => 'Bujur harus diantara 130 BT - 142.5 BT.',
            'bujur.numeric' => 'Format bujur harus numerik.',
            'magnitudo.required' => 'Magnitudo harus diisi.',
            'magnitudo.integer' => 'Magnitudo harus berupa nomor.',
            'magnitdo.between' => 'Magnitudo harus diantara 1-10.',
            'kedalaman.required' => 'Kedalaman harus diisi.',
            'kedalaman.integer' => 'Kedalaman harus berupa nomor.',
            'kedalaman.between' => 'Kedalaman harus diantara 10 - 500 Km.',
            'lokasi.required' =>'Lokasi harus diisi.',
            'lokasi.alpha_num' => 'Lokasi hanya boleh terdiri dari angka dan huruf.'
        ];
    }
}
