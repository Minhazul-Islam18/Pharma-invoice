<div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <div class="alert-body">
                    <span>{{ session('message') }}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>
        @endif
        <div class="table-responsive position-relative">
            <div wire:loading.flex class="col-12 position-absolute justify-content-center align-items-center"
                style="top:0;right:0;left:0;bottom:0;background-color: rgba(255,255,255,0.5);z-index: 99;">
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th class="align-middle">Product</th>
                        <th class="align-middle text-center">Net Unit Price</th>
                        <th class="align-middle text-center">Stock</th>
                        <th class="align-middle text-center">Quantity</th>
                        <th class="align-middle text-center">Discount</th>
                        <th class="align-middle text-center">Tax</th>
                        <th class="align-middle text-center">Sub Total</th>
                        <th class="align-middle text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($cart_items->isNotEmpty())
                        @foreach ($cart_items as $cart_item)
                            <tr>
                                <td class="align-middle">
                                    {{ $cart_item->name }} <br>
                                    <span class="badge badge-success">
                                        {{ $cart_item->options->code }}
                                    </span>
                                    @include('livewire.includes.product-cart-modal')
                                </td>

                                <td x-data="{ open{{ $cart_item->id }}: false }" class="align-middle text-center">
                                    <span x-show="!open{{ $cart_item->id }}"
                                        @click="open{{ $cart_item->id }} = !open{{ $cart_item->id }}">{{ format_currency($cart_item->price) }}</span>

                                    <div x-show="open{{ $cart_item->id }}">
                                        @include('livewire.includes.product-cart-price')
                                    </div>
                                </td>

                                <td class="align-middle text-center text-center">
                                    <span
                                        class="badge badge-info">{{ $cart_item->options->stock . ' ' . $cart_item->options->unit }}</span>
                                </td>

                                <td class="align-middle text-center">
                                    @include('livewire.includes.product-cart-quantity')
                                </td>

                                <td class="align-middle text-center">
                                    {{ format_currency($cart_item->options->product_discount) }}
                                </td>

                                <td class="align-middle text-center">
                                    {{ format_currency($cart_item->options->product_tax) }}
                                </td>

                                <td class="align-middle text-center">
                                    {{ format_currency($cart_item->options->sub_total) }}
                                </td>

                                <td class="align-middle text-center">
                                    <a href="#" wire:click.prevent="removeItem('{{ $cart_item->rowId }}')">
                                        <i class="bi bi-x-circle font-2xl text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" class="text-center">
                                <span class="text-danger">
                                    Please search & select products!
                                </span>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <div class="row justify-content-md-end">
        <div class="col-md-4">
            <div class="table-responsive">
                <table class="table table-striped">
                    {{-- <tr>
                        <th>Tax ({{ $global_tax }}%)</th>
                        <td>(+) {{ format_currency(Cart::instance($cart_instance)->tax()) }}</td>
                    </tr> --}}
                    <tr>
                        <th>Discount ({{ $global_discount }}%)</th>
                        <td>(-) {{ format_currency(Cart::instance($cart_instance)->discount()) }}</td>
                    </tr>
                    {{-- <tr>
                        <th>Shipping</th>
                        <input type="hidden" value="{{ $shipping }}" name="shipping_amount">
                        <td>(+) {{ format_currency($shipping) }}</td>
                    </tr> --}}
                    <tr>
                        <th>Grand Total</th>
                        @php
                            $total_with_shipping = Cart::instance($cart_instance)->total() + (float) $shipping;
                        @endphp
                        <th>
                            (=) {{ format_currency($total_with_shipping) }}
                        </th>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <input type="hidden" name="total_amount" id="total_amount" value="{{ $total_with_shipping }}">

    <div class="form-row">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="customer_name">Customer Name</label>
                <input type="text" class="form-control" name="customer_name" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="customer_phone">Customer Phone</label>
                <input type="tel" class="form-control" name="customer_phone" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="customer_address">Customer Address</label>
                <textarea class="form-control" name="customer_address" required></textarea>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="discount_percentage">Discount (%)</label>
                <input wire:model.blur="global_discount" type="number" class="form-control" name="discount_percentage"
                    min="0" max="100" value="{{ $global_discount > 0 ? $global_discount : '' }}" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="doctor_name">Doctor name</label>
                <input type="text" class="form-control" name="doctor_name" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="chamber_name">Chamber name</label>
                <input type="text" class="form-control" name="chamber_name" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="paid_amount">Amount Received <span class="text-danger">*</span></label>
                <div class="input-group">
                    <input id="paid_amount" type="text" class="form-control" name="paid_amount"
                        value="{{ $total_with_shipping }}" required>
                    <div class="input-group-append">
                        <button id="getTotalAmount" class="btn btn-primary" type="button">
                            <i class="bi bi-check-square"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-lg-4">
            <div class="form-group">
                <label for="shipping_amount">Shipping</label>
                <input wire:model.blur="shipping" type="number" class="form-control" name="shipping_amount"
                    min="0" value="0" required step="0.01">
            </div>
        </div> --}}
    </div>
</div>
@push('page_scripts')
    <script type="text/javascript">
        // $(document).ready(function() {
        //     // Set the PHP value to the JavaScript variable
        //     var totalWithShipping = "{{ $total_with_shipping }}";
        //     console.log(totalWithShipping);

        //     // Listen for changes in the #total_amount input field
        //     $('#total_amount').on('change', function() {
        //         // Get the updated value from the input field
        //         totalWithShipping = $(this).val();
        //         console.log(totalWithShipping, '----- event');

        //         // Check if the value is not null or empty
        //         if (totalWithShipping) {
        //             console.log(totalWithShipping);
        //             $('#paid_amount').val(totalWithShipping);
        //             console.log($('#paid_amount').val());
        //         }
        //     });
        // });
        document.addEventListener('livewire:load', function() {
            // Get the initial value from Livewire (PHP-rendered value)
            let totalWithShipping = @this.get('total_with_shipping'); // Use Livewire's state

            // Set the initial value for paid_amount
            if (totalWithShipping) {
                $('#paid_amount').val(totalWithShipping);
            }

            // Listen for Livewire updates to total_amount
            Livewire.hook('message.processed', (message, component) => {
                totalWithShipping = @this.get('total_with_shipping'); // Get updated value from Livewire
                if (totalWithShipping) {
                    $('#paid_amount').val(totalWithShipping);
                }
            });
        });
    </script>
@endpush
