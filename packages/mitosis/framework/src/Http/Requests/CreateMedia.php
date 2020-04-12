<?php


namespace Mitosis\Framework\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Konekt\AppShell\Http\Requests\HasFor;
use Mitosis\Framework\Contracts\Requests\CreateMedia as CreateMediaContract;

class CreateMedia extends FormRequest implements CreateMediaContract
{
    use HasFor;

    protected $allowedFor = ['product'];

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return array_merge($this->getForRules(), [
            'images'   => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif'
        ]);
    }

    /**
     * @inheritDoc
     */
    public function authorize()
    {
        return true;
    }
}
