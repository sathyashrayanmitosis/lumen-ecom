<?php


namespace Mitosis\Framework\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Mitosis\Framework\Contracts\Requests\CreateProperty as CreatePropertyContract;
use Mitosis\Properties\PropertyTypes;

class CreateProperty extends FormRequest implements CreatePropertyContract
{
    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            'name' => 'required|min:1|max:255',
            'slug' => 'nullable|max:255',
            'type' => ['required', Rule::in(PropertyTypes::values())],
        ];
    }

    /**
     * @inheritDoc
     */
    public function authorize()
    {
        return true;
    }
}
