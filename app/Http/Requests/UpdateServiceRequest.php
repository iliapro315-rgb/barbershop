<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('services', 'title')->ignore($this->route('service')),
            ],
            'description'  => ['nullable', 'string'],
            'price'        => ['required', 'integer', 'min:0'],
            'duration'     => ['required', 'integer', 'min:15'],
            'master_id'    => ['required', 'exists:masters,id'],
            'is_available' => ['boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'     => 'Укажите название услуги',
            'title.unique'       => 'Такая услуга уже есть',
            'price.required'     => 'Укажите цену',
            'duration.required'  => 'Укажите длительность',
            'master_id.required' => 'Выберите мастера',
            'master_id.exists'   => 'Выбранный мастер не найден',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_available' => $this->boolean('is_available'),
        ]);
    }
}