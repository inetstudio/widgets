<?php

namespace InetStudio\WidgetsPackage\Widgets\Http\Requests\Front;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;
use InetStudio\WidgetsPackage\Widgets\Contracts\DTO\Actions\Front\RenderItemDataContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Front\RenderRequestContract;

class RenderRequest extends FormRequest implements RenderRequestContract
{
    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'view.string' => 'Параметр «View» должен быть строкой',
            'additional_params.array' => 'Параметр «additional_params» должен быть массивом',
        ];
    }

    public function rules(): array
    {
        return [
            'view' => 'nullable|string',
            'additional_params' => 'nullable|array'
        ];
    }

    public function getDataObject(): RenderItemDataContract
    {
        $data = $this->validated();
        $data['id'] = $this->route('id');

        $data = collect($data)->mapWithKeys(function ($item, $key) {
            return [Str::camel($key) => $item];
        })->toArray();

        return resolve(
            RenderItemDataContract::class,
            [
                'args' => $data,
            ]
        );
    }
}
