<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateCegeRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest
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
            'jam00' => 'integer',
            'jam01' => 'integer',
            'jam02' => 'integer',
            'jam03' => 'integer',
            'jam04' => 'integer',
            'jam05' => 'integer',
            'jam06' => 'integer',
            'jam07' => 'integer',
            'jam08' => 'integer',
            'jam09' => 'integer',
            'jam10' => 'integer',
            'jam11' => 'integer',
            'jam12' => 'integer',
            'jam12' => 'integer',
            'jam13' => 'integer',
            'jam14' => 'integer',
            'jam15' => 'integer',
            'jam16' => 'integer',
            'jam17' => 'integer',
            'jam18' => 'integer',
            'jam19' => 'integer',
            'jam20' => 'integer',
            'jam21' => 'integer',
            'jam22' => 'integer',
            'jam23' => 'integer'
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
            'jam00.integer' => '00 - 01 harus bilangan bulat',
            'jam01.integer' => '01 - 02 harus bilangan bulat',
            'jam02.integer' => '02 - 03 harus bilangan bulat',
            'jam03.integer' => '03 - 04 harus bilangan bulat',
            'jam04.integer' => '04 - 05 harus bilangan bulat',
            'jam05.integer' => '05 - 06 harus bilangan bulat',
            'jam06.integer' => '06 - 07 harus bilangan bulat',
            'jam07.integer' => '07 - 08 harus bilangan bulat',
            'jam08.integer' => '08 - 09 harus bilangan bulat',
            'jam09.integer' => '09 - 10 harus bilangan bulat',
            'jam10.integer' => '10 - 11 harus bilangan bulat',
            'jam11.integer' => '11 - 12 harus bilangan bulat',
            'jam12.integer' => '12 - 13 harus bilangan bulat',
            'jam13.integer' => '13 - 16 harus bilangan bulat',
            'jam14.integer' => '15 - 16 harus bilangan bulat',
            'jam15.integer' => '15 - 16 harus bilangan bulat',
            'jam16.integer' => '16 - 17 harus bilangan bulat',
            'jam17.integer' => '17 - 18 harus bilangan bulat',
            'jam18.integer' => '18 - 19 harus bilangan bulat',
            'jam19.integer' => '18 - 19 harus bilangan bulat',
            'jam20.integer' => '18 - 19 harus bilangan bulat',
            'jam21.integer' => '18 - 19 harus bilangan bulat',
            'jam22.integer' => '18 - 19 harus bilangan bulat',
            'jam23.integer' => '18 - 19 harus bilangan bulat'
        ];
    }
}
