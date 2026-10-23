<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // права настроим в ЛР 7
    }

    public function rules(): array
    {
        return [
            'title'        => ['required', 'string', 'max:255', 'unique:services,title'],
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
            'price.integer'      => 'Цена должна быть числом',
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