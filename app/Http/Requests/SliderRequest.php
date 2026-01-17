<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'       => 'nullable|string|max:255',
            'images'      => 'nullable|string',
            'description' => 'nullable|string',
        ];
    }

    protected function prepareForValidation()
    {
        $mergeData = [];

        if (!$this->title) {
            $mergeData['title'] = '';
        }
        if (!$this->description) {
            $mergeData['description'] = '';
        }

        $this->merge($mergeData);
    }
}
