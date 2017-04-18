<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateSummaryRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest
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
                        'tanggal' => 'required|unique:summaries,tanggal',
            'stroke' => 'required|integer',
            'average_stroke' => 'required|numeric',
            'flash' => 'required|integer',
            'average_flash' => 'required|numeric',
            'noise' => 'required|integer',
            'average_noise' => 'required|numeric',
            'energy' => 'required|integer',
            'average_energy' => 'required|numeric',
            'peak_stroke' => 'required|integer',
            'time_stroke' => ['required','regex:^(([0-1][0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?)$^'],
            'peak_flash' => 'required|integer',
            'time_flash' => ['required','regex:^(([0-1][0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?)$^'],
            'peak_noise' => 'required|integer',
            'time_noise' => ['required','regex:^(([0-1][0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?)$^'],
            'peak_energy' => 'required|integer',
            'time_energy' => ['required','regex:^(([0-1][0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?)$^'],
            'energy_ratio' => 'required|integer',
            'time_ratio' => ['required','regex:^(([0-1][0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?)$^'],
            'peak_signal' => 'required|integer',
            'time_signal' => ['required','regex:^(([0-1][0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?)$^'],
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
            'tanggal.required' => 'Tanggal harus diisi',
            'stroke.integer' => 'Stroke harus bilangan bulat positif',
            'average_stroke.numeric' => 'Rata-rata stroke harus numerik',
            'flash.integer' => 'Stroke harus bilangan bulat positif',
            'average_flash.numeric' => 'Rata-rata flash harus numerik',
            'noise.integer' => 'Noise harus bilangan bulat positif',
            'average_noise.numeric' => 'Rata-rata noise harus numerik',
            'energy.integer' => 'Energy harus bilangan bulat positif',
            'average_energy.numeric' => 'Rata-rata Energy harus numerik',
            'peak_stroke.integer' => 'Stroke peak harus bilangan bulat positif',
            'time_stroke.regex' => 'Stroke time harus berformat hh:mm:ss ',
            'peak_flash.integer' => 'Flash peak harus bilangan bulat positif',
            'time_flash.regex' => 'Flash time harus berformat hh:mm:ss',
            'peak_noise.integer' => 'Noise peak harus bilangan bulat positif',
            'time_noise.regex' => 'Noise time harus berformat hh:mm:ss ',
            'peak_energy' => 'Energy peak harus bilangan bulat positif',
            'time_energy.regex' => 'Energy time harus berformat hh:mm:ss',
            'energy_ratio.integer' => 'Energy ratio harus bilangan bulat positif',
            'time_ratio.regex' => 'Energy ratio time harus berformat hh:mm:ss',
            'peak_signal.integer' => 'Signal peak harus bilangan bulat positif',
            'time_signal.regex' => 'Signal time harus berformat hh:mm:ss'
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
            //
        ];
    }
}
