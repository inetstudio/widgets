<?php

namespace InetStudio\WidgetsPackage\Widgets\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Requests\Front\GetItemContentRequestContract;

class GetItemContentRequest extends FormRequest implements GetItemContentRequestContract
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
}
