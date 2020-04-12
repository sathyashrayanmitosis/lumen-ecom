<?php


namespace Mitosis\Framework\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Mitosis\Framework\Contracts\Requests\CreateTaxonomy as CreateTaxonomyContract;

class CreateTaxonomy extends FormRequest implements CreateTaxonomyContract
{
    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:191',
            'slug' => 'nullable|max:191'
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
