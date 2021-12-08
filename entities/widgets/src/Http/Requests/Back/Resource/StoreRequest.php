<?php

namespace InetStudio\WidgetsPackage\Widgets\Http\Requests\Back\Resource;

use Illuminate\Foundation\Http\FormRequest;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Back\Resource\StoreRequestContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\DTO\Actions\Back\Resource\StoreItemDataContract;

class StoreRequest extends FormRequest implements StoreRequestContract
{
    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'widget_name.max' => 'Поле «Имя виджета» не должно превышать 255 символов',
            'title.max' => 'Поле «Название» не должно превышать 255 символов',
            'alias.max' => 'Поле «Алиас» не должно превышать 255 символов',
            'category.max' => 'Поле «Категория» не должно превышать 255 символов',
            'view.required' => 'Поле «Представление» обязательно для заполнения',
            'view.max' => 'Поле «Представление» не должно превышать 255 символов',
            'params.array' => 'Поле «Параметры» должно содержать массив',
            'additional_info.array' => 'Поле «Дополнительная информация» должно содержать массив',
        ];
    }

    public function rules(): array
    {
        return [
            'widget_name' => 'nullable|max:255',
            'title' => 'nullable|max:255',
            'alias' => 'nullable|max:255',
            'category' => 'nullable|max:255',
            'view' => 'required|max:255',
            'params' => 'nullable|array',
            'additional_info' => 'nullable|array',
        ];
    }

    public function getDataObject(): StoreItemDataContract
    {
        $data = $this->validated();

        return resolve(
            StoreItemDataContract::class,
            [
                'args' => $data,
            ]
        );
    }
}
