<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreChecklistseismicRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest
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
            'tanggal' => 'required|unique:checklistseismics,tanggal',
            'geni' => 'required|min:0|max:6',
            'jay' => 'required|min:0|max:6',
            'mmpi' => 'required|min:0|max:6',
            'wami' => 'required|min:0|max:6',
            'average' => 'required|min:0|max:6',
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
            'geni.required' => 'GENI harus diisi.',
            'geni.max' => 'GENI maksimal 6 karakter.',
            'jay.required' => 'JAY harus diisi.',
            'jay.max' => 'JAY Maksimal 6 karakter.',
            'mmpi.required' => 'MMPI harus diisi.',
            'mmpi.max' => 'MMPI Maksimal 6 karakter.',
            'wami.required' => 'WAMI harus diisi,',
            'wami.max' => 'WAMI maksimal 6 karakter.',
            'average.required' => 'Rata - rata harus diisi.',
            'average.max' => 'Rata - rata maksimal 6 karakter.',
            'petugas.required' => 'On Duty harus diisi.',
            'petugas.alpha' => 'On Duty hanya harus terdiri dari huruf.'
        ];
    }
}
