<?php

namespace App\Http\Requests\Web\Auth;

use App\Http\Requests\BaseRequest;

class LogoutRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'access_token' => ['required'] 
        ];
    }
}
