<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreLike extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //TODO:: Should users be able to like their own posts?
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
            'post_id' => [
                'exists:App\Models\Post,id',
                Rule::unique('likes')->where('user_id', auth()->user()->id), // Only allow user to like once
            ],
        ];
    }
}
