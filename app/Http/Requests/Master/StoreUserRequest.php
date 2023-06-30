<?php

namespace App\Http\Requests\Master;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required|string',
            'nama' => 'string',
            'password' => 'required|string|confirmed',
            'no_hp' => 'numeric',
            'user_type' => ['required', Rule::in(User::$USER_TYPE)],
        ];
    }
}
