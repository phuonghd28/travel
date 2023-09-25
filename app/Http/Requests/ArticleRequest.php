<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules =  [
            'title'=>'required',
            'content'=>'required',
            'images'=>'required',
            'author'=>'required',
            'type_id' => 'required',
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'title.required'=>'Vui lòng nhập tiêu đề.',
            'content.required'=>'Vui lòng nhập nội dung. ',
            'images.required'=>'Vui lòng chọn ảnh.',
            'images.jpg'=>'Vui lòng chọn ảnh có đuôi jpg, jpeg, gif, svg.',
            'images.jpeg'=>'Vui lòng chọn ảnh có đuôi jpg, jpeg, gif, svg.',
            'images.gif'=>'Vui lòng chọn ảnh có đuôi jpg, jpeg, gif, svg.',
            'images.svg'=>'Vui lòng chọn ảnh có đuôi jpg, jpeg, gif, svg.',
            'images.max'=>'Vui lòng chọn ảnh kích thước nhỏ hơn.',
            'author.required'=>'Vui lòng nhập tên tác giả.',
            'type_id.required' => 'Vui lòng chọn danh mục '
        ];
    }
}
