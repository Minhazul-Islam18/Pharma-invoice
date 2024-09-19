@extends('layouts.app')

@section('title', 'Sales Details')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('sales.index') }}">Sales</a></li>
        <li class="breadcrumb-item active">Details</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid" style="font-family: 'Times New Roman', Times, serif;">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex flex-wrap align-items-center">
                        <div>
                            Reference: <strong>{{ $sale->reference }}</strong>
                        </div>
                        <a target="_blank" class="btn btn-sm btn-secondary mfs-auto mfe-1 d-print-none"
                            href="{{ route('sales.pdf', $sale->id) }}">
                            <i class="bi bi-printer"></i> Print
                        </a>
                        <a target="_blank" class="btn btn-sm btn-info mfe-1 d-print-none"
                            href="{{ route('sales.pdf', ['id' => $sale->id]) }}">
                            <i class="bi bi-save"></i> Save
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div
                                class="col-sm-2 col-12 px-0 d-flex align-items-center justify-content-center justify-content-sm-start">
                                <img style="width: 48px" src="{{ url('images/invoice/00ohv6rs.png') }}" alt="">
                            </div>
                            <div class="col-sm-10 col-12 d-flex align-items-center justify-content-center">
                                <h1 class=" font-weight-bold h3">Healthcare Pharmaceuticals Ltd.</h1>
                            </div>
                        </div>
                        <div class="row mb-4 border">
                            <div class="col-sm-4 mb-3 mb-md-0 border-right border-bottom">
                                <p>
                                    Nasir Trade Centre (Level-9 & 14)<br />
                                    89 Bir Uttam C.R. Datta Sarak,Dhaka- 1205. <br />
                                    Tel: +880-2-9632175, +880-2-9632176<br />
                                    Fax: +880-2-9632172
                                </p>
                            </div>

                            <div class="col-sm-4 mb-3 mb-md-0 border-right d-flex align-items-center border-bottom">
                                <h5 class="mx-auto text-uppercase font-3xl font-weight-bold text-center">Invoice</h5>
                            </div>

                            <div class="col-sm-4 mb-3 mb-md-0 border-bottom p-1">
                                <img class=" img-fluid" src="{{ asset('images/invoice/2024-09-07_153328.png') }}"
                                    alt="">
                            </div>

                            <div class="col-sm-4 mb-3 mb-md-0 border-right">
                                <p>
                                    Moghbazar(Biotech) Sales Depot<br />
                                    Gulfesha Plaza (3rd Floor), Above Agora,<br />
                                    "Shahid Sangbadik Salina Parvin Sarak", Dhaka-1217<br />
                                    Bangladesh<br />
                                    Telephone: 9632176 (1401)
                                </p>
                            </div>

                            <div class="col-sm-4 mb-3 mb-md-0 border-right">
                                <h5 class="mb-2 border-bottom pb-2">Customer Info:</h5>
                                <div>Customer code: {{ $sale->customer_code }}</div>
                                <div>
                                    <strong>{{ $sale->customer_name }}</strong>
                                </div>
                                <div>{{ $sale->customer_address }}</div>
                                <div>Phone: {{ $sale->customer_phone }}</div>
                            </div>

                            <div class="col-sm-4 mb-3 mb-md-0 py-2">
                                <div>Date: {{ \Carbon\Carbon::parse($sale->date)->format('d M, Y') }}</div>
                                <div>Invoice no: <strong>INV/{{ $sale->reference }}</strong></div>
                                <div>Pay mode: <strong>{{ $sale->payment_method }}</strong></div>
                                <div>Area: <span>{{ $superAdmin->area }}</span>
                                </div>
                                <div>Associate: <span>{{ $superAdmin->associate }}</span>
                                </div>
                                <div>Mobile no: <span>{{ $superAdmin->phone }}</span>
                                </div>
                                <p style="margin: 0; vertical-align: middle;"><span
                                        style="width: 65px; display:inline-block;">Delivered
                                        By</span> <span
                                        style="display: inline-block;word-wrap: break-word;">:{{ $superAdmin->delivered_by }}</span>
                                </p>
                                <div>Delivery date: <span>___________________</span>
                                </div>

                                {{-- <div>
                                    Status: <strong>{{ $sale->status }}</strong>
                                </div>
                                <div>
                                    Payment Status: <strong>{{ $sale->payment_status }}</strong>
                                </div> --}}
                            </div>

                        </div>
                        <div class="row mb-0">
                            <div class="col p-0">
                                <div class="d-block">
                                    <span style="width: 80px; display: inline-block;">Doctor name</span>
                                    <span>:{{ $sale->doctor_name }}</span>
                                </div>
                                <div class="d-block">
                                    <span style="width: 80px; display: inline-block;">Chamber</span>
                                    <span>:{{ $sale->chamber_name }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive-sm">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th class="p-0 align-middle text-center border-right">SL.No.</th>
                                    <th class="p-0 align-middle text-center border-right">Product code</th>
                                    <th class="p-0 align-middle text-center border-right" style="width: 170px">Product Name
                                    </th>
                                    <th class="p-0 align-middle text-center border-right">Pack size UOM</th>
                                    <th class="p-0 align-middle text-center border-right">Batch number</th>
                                    <th class="p-0 align-middle text-center border-right">MRP (TK)</th>
                                    <th class="p-0 align-middle text-center border-right">Vat (TK)</th>
                                    <th class="p-0 align-middle text-center border-right">Invoice Qty</th>
                                    <th class="p-0 align-middle text-center border-right">Bonus Qty</th>
                                    <th class="p-0 align-middle text-center border-right">MRP (TK) value</th>
                                    <th class="p-0 align-middle text-center border-right">Vat (TK) value</th>
                                    <th class="p-0 align-middle text-center"> Total value </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $mrp = 0;
                                    $vat = 0;
                                    $subTotal = 0;
                                @endphp
                                @foreach ($sale->saleDetails as $index => $item)
                                    <tr class=" border-bottom">
                                        <td class="align-middle p-0 border-right text-center">
                                            {{ $index + 1 }}
                                        </td>
                                        <td class="align-middle p-0 border-right text-center">
                                            {{ $item->product_code }}
                                        </td>
                                        <td class="align-middle p-0 border-right text-center">
                                            {{ $item->product_name }}
                                        </td>

                                        <td class="align-middle p-0 border-right text-center">
                                            {{ $item?->product?->pack_size }}</td>
                                        <td class="align-middle p-0 border-right text-center">
                                            {{ $item?->product?->batch_no }}</td>
                                        <td class="align-middle p-0 border-right text-center">{{ $item->price }}</td>
                                        <td class="align-middle p-0 border-right text-center">
                                            {{ $item->product_tax_amount }}
                                        </td>

                                        <td class="align-middle p-0 border-right text-center">
                                            {{ $item->quantity }}
                                        </td>

                                        <td class="align-middle p-0 border-right text-center">
                                        </td>
                                        <td class=" align-middle border-right text-center">
                                            @php
                                                $mrp += $item->price * $item->quantity - $item->product_discount_amount;
                                            @endphp
                                            {{ $item->price * $item->quantity - $item->product_discount_amount }}
                                        </td>
                                        <td class=" align-middle border-right text-center">
                                            @php
                                                $vat += $item->product_tax_amount * $item->quantity;
                                            @endphp
                                            {{ $item->product_tax_amount * $item->quantity }}
                                        </td>
                                        <td class="align-middle p-0 text-center">
                                            @php
                                                $subTotal += $item->sub_total;
                                            @endphp
                                            {{ $item->sub_total }}
                                        </td>
                                    </tr>
                                @endforeach
                                <tr class=" border-bottom">
                                    <td class=" border-left border-right text-right" colspan="9">
                                        <strong style="font-size: 17px">Sub total</strong>
                                    </td>
                                    <td class=" border-right">
                                        {{ $mrp }}
                                    </td>
                                    <td class=" border-right text-center">
                                        {{ $vat }}
                                    </td>
                                    <td>
                                        {{ $subTotal }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5 ml-md-auto">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="left"><strong>Grand Total</strong></td>
                                        <td class="right"><strong>{{ $sale->total_amount }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="left border-top-0"><strong>Patient support</strong></td>
                                        <td class="right border-top-0">
                                            @php
                                                $ps = ($sale->total_amount / 100) * 12;
                                            @endphp
                                            {{ $ps }}</td>
                                    </tr>
                                    <tr>
                                        <td class="left border-top-0"><strong>Less discount</strong></td>
                                        <td class="right border-top-0">{{ $sale->discount_amount }}</td>
                                    </tr>
                                    <tr>
                                        <td class="left border-top-0"><strong>Payable amount</strong></td>
                                        <td class="right border-top-0">
                                            {{ $sale->total_amount - ($sale->discount_amount + $ps) }}
                                        </td>
                                    </tr>
                                    {{-- <tr>
                                        <td class="left"><strong>Tax ({{ $sale->tax_percentage }}%)</strong></td>
                                        <td class="right">{{ ($sale->tax_amount) }}</td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="px-3">
                        <span>
                            <strong>Amount in words:</strong>
                            {{ ucfirst(str_replace('-', ' ', \Rmunate\Utilities\SpellNumber::value($sale->total_amount)->toLetters())) . ' Taka Only' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
