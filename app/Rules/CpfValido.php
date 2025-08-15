<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CpfValido implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Remove caracteres não numéricos
        $cpf = preg_replace('/[^0-9]/', '', $value);

        if (strlen($cpf) != 11) {
            $fail('O :attribute informado é inválido.');
        }

        if (preg_match('/(\d)\1{10}/', $cpf)) {
            $fail('O :attribute informado é inválido.');
        }

        for ($t = 9; $t < 11; $t++) {
            $soma = 0;
            for ($c = 0; $c < $t; $c++) {
                $soma += $cpf[$c] * (($t + 1) - $c);
            }
            $digito = ((10 * $soma) % 11) % 10;
            if ($cpf[$c] != $digito) {
                $fail('O :attribute informado é inválido.');
            }
        }

    }
}
