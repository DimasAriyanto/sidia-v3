<?php

namespace App\Http\Requests\Transaksi;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $rules = [
            'username' => 'string',
            'password' => 'string|confirmed',
            'no_hp' => 'numeric',
        ];

        if (Route::currentRouteName() === 'dashboard.master.user.store') {
            $rules['username'] .= '|unique:users,username|required';
            $rules['password'] .= '|required';
            $rules['user_type'] = ['required', Rule::in(User::$USER_TYPE)];
        }

        return $rules;
    }
}
