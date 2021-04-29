<?php

namespace InetStudio\WidgetsPackage\Widgets\Http\Requests\Back\Resource;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Container\BindingResolutionException;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Back\Resource\StoreRequestContract;

/**
 * Class StoreRequest.
 */
class StoreRequest extends FormRequest implements StoreRequestContract
{
    /**
     * Определить, авторизован ли пользователь для этого запроса.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Сообщения об ошибках.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'view.required' => 'Поле «View» обязательно для заполнения',
            'view.max' => 'Поле «View» не должно превышать 255 символов',
        ];
    }

    /**
     * Правила проверки запроса.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'view' => 'required|max:255',
        ];
    }

    /**
     * Handle a passed validation attempt.
     *
     * @throws BindingResolutionException
     */
    protected function passedValidation()
    {
        $itemData = app()->make(
            'InetStudio\WidgetsPackage\Widgets\Contracts\DTO\ItemDataContract',
            [
                'args' => [
                    'id' => (int) $this->get('id'),
                    'view' => trim(strip_tags($this->get('view'))),
                    'params' => $this->get('params', []),
                    'additional_info' => $this->get('additional_info', []),
                ],
            ]
        );

        $data = compact('itemData');

        request()->merge($data);
    }
}
