<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;//変更
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'required|max:100',
            'content'=>'required',
            'user_id'=>'nullable|numeric',
            'category_id'=>'required|numeric',
            'image' => 'nullable|image|max:33600',
            'twitter' => '|regex:/^[a-zA-Z0-9_]+$/',
        ];
    }
}
