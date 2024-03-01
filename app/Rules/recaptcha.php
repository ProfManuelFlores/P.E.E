<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class recaptcha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $g_response = Http::asForm()->post(config("services.recaptch.url_recaptcha"), [
            'secret' => config("services.recaptch.secret_key"),
            'response' => $value
        ]);
        if(!$g_response->json('success')){
            $fail('la recaptcha ha fallado, favor de intentar en un rato');
        }
    }
}
