<?php


namespace Mitosis\Framework\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Mitosis\Framework\Contracts\Requests\UpdateOrder as UpdateOrderContract;
use Mitosis\Order\Models\OrderStatusProxy;

class UpdateOrder extends FormRequest implements UpdateOrderContract
{
    public function rules()
    {
        return [
            'status' => ['required', Rule::in(OrderStatusProxy::values())]
        ];
    }

    public function authorize()
    {
        return true;
    }
}
