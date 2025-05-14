<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;


trait PasswordValidationRules
{

    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array<int, \Illuminate\Contracts\Validation\Rule|array<mixed>|string>
     */
    protected function passwordRules(): array
    {
        // Require at least 8 characters with
        // one uppercase character
        // one lowecase character
        // one symbol

        return ['required', 'string',  Password::min(8)->mixedCase()->symbols(), 'confirmed'];
    }
}
