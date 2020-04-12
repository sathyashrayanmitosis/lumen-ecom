<?php


namespace Mitosis\Framework\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Mitosis\Product\Models\ProductStateProxy;
use Mitosis\Framework\Contracts\Requests\CreateProduct as CreateProductContract;

class CreateProduct extends FormRequest implements CreateProductContract
{
    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            'name'     => 'required|min:2|max:255',
            'sku'      => 'required|unique:products',
            'state'    => ['required', Rule::in(ProductStateProxy::values())],
            'price'    => 'nullable|numeric',
            'stock'    => 'nullable|numeric',
            'images'   => 'nullable',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif'
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
