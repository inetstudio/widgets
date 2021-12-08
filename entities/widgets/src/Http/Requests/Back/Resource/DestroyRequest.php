<?php

namespace InetStudio\WidgetsPackage\Widgets\Http\Requests\Back\Resource;

use Illuminate\Foundation\Http\FormRequest;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Back\Resource\DestroyRequestContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\DTO\Actions\Back\Resource\DestroyItemDataContract;

class DestroyRequest extends FormRequest implements DestroyRequestContract
{
    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [];
    }

    public function rules(): array
    {
        return [];
    }

    public function getDataObject(): DestroyItemDataContract
    {
        $data = [
            'id' => $this->route('widget'),
        ];

        return resolve(
            DestroyItemDataContract::class,
            [
                'args' => $data,
            ]
        );
    }
}
