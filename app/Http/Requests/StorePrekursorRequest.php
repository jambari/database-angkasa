<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StorePrekursorRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest
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
            'polarisasi' => 'required|numeric',
            'stdplus' => 'required|numeric',
            'stdminus' => 'required|numeric',
            'dstindex' => 'numeric'
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
            'polarisasi.required' => 'Polarisasi harus diisi.',
            'polarisasi.numeric' => 'Polarisasi harus berupa angka',
            'stdplus.required' => 'Batas atas harus diisi.',
            'stdplus.numeric' => 'Batas atas harus berupa angka',
            'stdminus.required' => 'Batas bawah harus diisi.',
            'stdminus.numeric' => 'Batas bawah harus berupa angka.',
            'dstindex.numeric' => 'dstindex harus berupa angka'
        ];
    }
}
