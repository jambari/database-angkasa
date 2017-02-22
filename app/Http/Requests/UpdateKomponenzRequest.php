<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateKomponenzRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest
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
            'jam00' => 'numeric|between:-13000.00,-16000.00',
            'jam01' => 'numeric|between:-13000.00,-16000.00',
            'jam02' => 'numeric|between:-13000.00,-16000.00',
            'jam03' => 'numeric|between:-13000.00,-16000.00',
            'jam04' => 'numeric|between:-13000.00,-16000.00',
            'jam05' => 'numeric|between:-13000.00,-16000.00',
            'jam06' => 'numeric|between:-13000.00,-16000.00',
            'jam07' => 'numeric|between:-13000.00,-16000.00',
            'jam08' => 'numeric|between:-13000.00,-16000.00',
            'jam09' => 'numeric|between:-13000.00,-16000.00',
            'jam10' => 'numeric|between:-13000.00,-16000.00',
            'jam11' => 'numeric|between:-13000.00,-16000.00',
            'jam12' => 'numeric|between:-13000.00,-16000.00',
            'jam13' => 'numeric|between:-13000.00,-16000.00',
            'jam14' => 'numeric|between:-13000.00,-16000.00',
            'jam15' => 'numeric|between:-13000.00,-16000.00',
            'jam16' => 'numeric|between:-13000.00,-16000.00',
            'jam17' => 'numeric|between:-13000.00,-16000.00',
            'jam18' => 'numeric|between:-13000.00,-16000.00',
            'jam19' => 'numeric|between:-13000.00,-16000.00',
            'jam20' => 'numeric|between:-13000.00,-16000.00',
            'jam21' => 'numeric|between:-13000.00,-16000.00',
            'jam22' => 'numeric|between:-13000.00,-16000.00',
            'jam23' => 'numeric|between:-13000.00,-16000.00',
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
            'jam00.numeric' => '00 - 01 harus berupa angka',
            'jam00.between' => '00 - 01 harus diantara -13000.00 - -16000.00',
            'jam01.numeric' => '01 - 02 harus berupa angka',
            'jam01.between' => '01 - 02 harus diantara -13000.00 - -16000.00',
            'jam02.numeric' => '02 - 03 harus berupa angka',
            'jam02.between' => '02 - 03 harus diantara -13000.00 - -16000.00',
            'jam03.numeric' => '03 - 04 harus berupa angka',
            'jam03.between' => '03 - 04 harus diantara -13000.00 - -16000.00',
            'jam04.numeric' => '04 - 05 harus berupa angka',
            'jam04.between' => '04 - 05 harus diantara -13000.00 - -16000.00',
            'jam05.numeric' => '05 - 06 harus berupa angka',
            'jam05.between' => '05 - 06 harus diantara -13000.00 - -16000.00',
            'jam06.numeric' => '06 - 07 harus berupa angka',
            'jam06.between' => '06 - 07 harus diantara -13000.00 - -16000.00',
            'jam07.numeric' => '07 - 08 harus berupa angka',
            'jam07.between' => '07 - 08 harus diantara -13000.00 - -16000.00',
            'jam08.numeric' => '08 - 09 harus berupa angka',
            'jam08.between' => '08 - 09 harus diantara -13000.00 - -16000.00',
            'jam09.numeric' => '09 - 10 harus berupa angka',
            'jam09.between' => '09 - 10 harus diantara -13000.00 - -16000.00',
            'jam10.numeric' => '10 - 11 harus berupa angka',
            'jam10.between' => '10 - 11 harus diantara -13000.00 - -16000.00',
            'jam11.numeric' => '11 - 12 harus berupa angka',
            'jam11.between' => '11 - 12 harus diantara -13000.00 - -16000.00',
            'jam12.numeric' => '12 - 13 harus berupa angka',
            'jam12.between' => '12 - 13 harus diantara -13000.00 - -16000.00',
            'jam13.numeric' => '13 - 14 harus berupa angka',
            'jam13.between' => '13 - 14 harus diantara -13000.00 - -16000.00',
            'jam14.numeric' => '14 - 15 harus berupa angka',
            'jam14.between' => '14 - 15 harus diantara -13000.00 - -16000.00',
            'jam15.numeric' => '15 - 16 harus berupa angka',
            'jam15.between' => '15 - 16 harus diantara -13000.00 - -16000.00',
            'jam16.numeric' => '16 - 17 harus berupa angka',
            'jam16.between' => '16 - 17 harus diantara -13000.00 - -16000.00',
            'jam17.numeric' => '17 - 18 harus berupa angka',
            'jam17.between' => '17 - 18 harus diantara -13000.00 - -16000.00',
            'jam18.numeric' => '18 - 19 harus berupa angka',
            'jam18.between' => '18 - 19 harus diantara -13000.00 - -16000.00',
            'jam19.numeric' => '19 - 20 harus berupa angka',
            'jam19.between' => '19 - 20 harus diantara -13000.00 - -16000.00',
            'jam20.numeric' => '20 - 21 harus berupa angka',
            'jam20.between' => '20 - 21 harus diantara -13000.00 - -16000.00',
            'jam21.numeric' => '21 - 22 harus berupa angka',
            'jam21.between' => '21 - 22 harus diantara -13000.00 - -16000.00',
            'jam22.numeric' => '22 - 23 harus berupa angka',
            'jam22.between' => '22 - 23 harus diantara -13000.00 - -16000.00',
            'jam23.numeric' => '23 - 00 harus berupa angka',
            'jam23.between' => '23 - 00 harus diantara -13000.00 - -16000.00',
        ];
    }
}
