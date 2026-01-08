<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;


class UpdateDemandaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
        {
        return [
            'titulo' => ['required', 'string', 'max:255'],
            'descricao' => ['nullable', 'string'],
            'status' => ['required', 'integer'],
            'data_entrega' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    if (Carbon::parse($value)->lt(now()->addHours(48))) {
                        $fail('A data de entrega deve respeitar o prazo mínimo de 48 horas.');
                    }
                },
            ],
        ];
    }

     public function messages(): array
    {
        return [
            'titulo.required' => 'O título da demanda é obrigatório.',
            'status.required' => 'O status da demanda é obrigatório.',
            'data_entrega.required' => 'A data de entrega é obrigatória.',
        ];
    }

}

