<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'        => 'required',
            'price'       => 'required',
            'images'      => 'required',
            'size'        => 'required',
            'qty'         => 'required',
            'description' => 'required',
            'content'     => 'required',
        ];
    }

    protected function prepareForValidation()
    {
        $mergeData = [];

        if ($this->has('price')) {
            $mergeData['price'] = Str::replace(',', '', $this->price);
        }

        if ($this->has('discount')) {
            $mergeData['discount'] = Str::replace(',', '', $this->discount);
        }

        if ($this->has('size') && is_array($this->size)) {
            $mergeData['size'] = implode(',', $this->size);
        }

        $this->merge($mergeData);
    }
}
