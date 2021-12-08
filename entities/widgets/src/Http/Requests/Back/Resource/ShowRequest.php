<?php

namespace InetStudio\WidgetsPackage\Widgets\Http\Requests\Back\Resource;

use Illuminate\Foundation\Http\FormRequest;
use InetStudio\WidgetsPackage\Widgets\Contracts\DTO\Queries\FetchItemsByIdsDataContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Back\Resource\ShowRequestContract;

class ShowRequest extends FormRequest implements ShowRequestContract
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

    public function getDataObject(): FetchItemsByIdsDataContract
    {
        $data = [
            'ids' => (array) $this->route('widget'),
        ];

        return resolve(
            FetchItemsByIdsDataContract::class,
            [
                'args' => $data,
            ]
        );
    }
}
