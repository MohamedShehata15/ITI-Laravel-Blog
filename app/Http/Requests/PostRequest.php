<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {

        $id = request()->all()['id'] ?? "";

        return [
            'title' => 'required|min:3|unique:posts,title,' . $id,
            'description' => ['required', 'min:10'],
            'user_id' => 'required|exists:users,id',
            'slug' => 'exclude'
        ];
    }
}