<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_name' => ['required', 'string', 'max:255'],
            'product_code' => ['required', 'string', 'max:255', 'unique:products,product_code'],
            'product_barcode_symbology' => ['required', 'string', 'max:255'],
            'batch_no' => ['nullable', 'string', 'max:255'],
            'pack_size' => ['nullable', 'string', 'max:255'],
            'product_unit' => ['required', 'string', 'max:255'],
            'product_quantity' => ['required', 'integer', 'min:1'],
            'product_cost' => ['required', 'numeric', 'max:2147483647'],
            'product_price' => ['required', 'numeric', 'max:2147483647'],
            'product_stock_alert' => ['required', 'integer', 'min:0'],
            'product_order_tax' => ['nullable', 'integer', 'in:13'],
            'product_tax_type' => ['nullable', 'integer', 'in:2'],
            'product_note' => ['nullable', 'string', 'max:1000'],
            'category_id' => ['nullable', 'integer']
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('create_products');
    }
}
