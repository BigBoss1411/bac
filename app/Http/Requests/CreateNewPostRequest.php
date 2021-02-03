<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'title'=>'required|min:8',
            'description'=>'required',
            'content'=>'required',
            'category_id'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề là trường bắt buộc',
            'description.required' => 'Mô tả là trường bắt buộc',
            'content.required' => 'Nội dung là trường bắt buộc',
            'category_id.required' => 'Tiêu đề là trường bắt buộc',
            'title.min' => 'Tiêu đề tối thiểu 8 kí tự',
   
        ];
    }
}
