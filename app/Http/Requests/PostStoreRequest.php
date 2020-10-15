<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Update return true -> ap dung rules
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'desc' => 'max:255',
            'content' => 'required|max:1000'
        ];
    }
    // Dinh nghia ham messages tra ve thong bao loi tuong ung
    public function messages()
    {
        return [
            'desc.max' => 'Desc toi da 255 ky tu',
            'content.required' => 'Content bat buoc nhap',
            'content.max' => 'Content toi da 1000 ky tu'
        ];
    }
}
