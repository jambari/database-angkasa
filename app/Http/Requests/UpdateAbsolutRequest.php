<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateAbsolutRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest
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
            'tanggal'=> 'required',
            'komponen_h' => 'numeric',
            'komponen_d' => 'numeric',
            'komponen_i' => 'numeric',
            'komponen_z' => 'numeric',
            'komponen_f' => 'numeric',
            'pengamat' => 'alpha'
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
            'tanggal.required'=> 'Tanggal harus diisi',
            'komponen_h.numeric' => 'Komponen H harus numerik',
            'komponen_d.numeric' => 'Komponen D harus numerik',
            'komponen_i.numeric' => 'Komponen I harus numerik',
            'komponen_z.numeric' => 'Komponen Z harus numerik',
            'komponen_f.numeric' => 'Komponen F harus numerik',
            'pengamat.alpha' => 'Pengamat harus hanya terdiri dari huruf',
        ];
    }
}
