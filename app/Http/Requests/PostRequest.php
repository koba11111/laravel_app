<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|max:255',
            'comment' => 'required|max:255',
            'image' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '予定を入力してください',
            'title.max' => 'タイトルは255文字以内で入力してください',
            'comment.required' => 'コメントを入力してください',
            'comment.max' => 'コメントは255文字以内で入力してください',
            'image.required' => '画像を選択してください',
        ];
    }
}
