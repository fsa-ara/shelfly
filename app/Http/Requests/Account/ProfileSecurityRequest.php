<?php

namespace App\Http\Requests\Account;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Validator;

class ProfileSecurityRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'current_password' => [
                'current_password',
                Password::required(),
            ],
            'password' => [
                'confirmed',
                Password::required()
                    ->letters()
                    ->min(16)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(3),
            ],
        ];
    }

    public function after(): array
    {
        return [
            function (Validator $validator) {
                if ($validator->errors()->has('current_password') || $validator->errors()->has('password')) return;

                $currentPassword = $this->user()->password;
                $newPassword = $this->input('password');

                if (Hash::check($newPassword, $currentPassword)) {
                    $validator->errors()->add(
                        'password',
                        'account/profile.error.password'
                    );
                }
            }
        ];
    }
}
