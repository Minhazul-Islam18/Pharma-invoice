<?php

namespace Modules\Sale\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreSaleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'reference' => 'required|string|max:255',
            // 'tax_percentage' => 'required|integer|min:0|max:100',
            'discount_percentage' => 'required|integer|min:0|max:100',
            // 'shipping_amount' => 'required|numeric',
            'total_amount' => 'required|numeric',
            'paid_amount' => 'required|numeric',
            'status' => 'required|string|max:255',
            'payment_method' => 'required|string|max:255',
            'note' => 'nullable|string|max:1000',
            'customer_name' => 'required|string|max:255',
            'customer_address' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('create_sales');
    }
}
