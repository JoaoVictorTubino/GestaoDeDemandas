<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;


class StoreDemandaRequest extends FormRequest
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
                        $fail('A data de entrega deve ser no mínimo 48 horas após a criação.');
                    }
                },
            ],
        ];
    }
    
    public function messages(): array
    {
        return [
            'titulo.required' => 'O título da demanda é obrigatório.',
            'titulo.max' => 'O título da demanda não pode ultrapassar 255 caracteres.',
            'status.required' => 'O status da demanda é obrigatório.',
            'status.integer' => 'O status da demanda deve ser um valor numérico.',
            'data_entrega.required' => 'A data de entrega é obrigatória.',
            'data_entrega.date' => 'A data de entrega deve ser uma data válida.',
        ];
    }
}