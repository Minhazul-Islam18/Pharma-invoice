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
    <div class="container-fluid">
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
                            href="{{ route('sales.pdf', ['id' => $sale->id]) }}" {{-- href="{{ route('sales.pdf', $sale->id) }}" --}}>
                            <i class="bi bi-save"></i> Save
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div
                                class="col-sm-2 col-12 px-0 d-flex align-items-center justify-content-center justify-content-sm-start">
                                <img style="width: 48px" src="{{ asset('images/invoice/00ohv6rs.bmp') }}" alt="">
                            </div>
                            <div class="col-sm-10 col-12 d-flex align-items-center justify-content-center">
                                <h1 class=" text-uppercase font-weight-bold h3">Healthcare Pharmaceuticals Ltd.</h1>
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
                                <div>
                                    <strong>{{ $customer->firstname . ' ' . $customer->lastname }}</strong>
                                </div>
                                <div>{{ $customer->address }}</div>
                                <div>Email: {{ $customer->email }}</div>
                                <div>Phone: {{ $customer->phone }}</div>
                            </div>

                            <div class="col-sm-4 mb-3 mb-md-0">
                                <div>Date: {{ \Carbon\Carbon::parse($sale->date)->format('d M, Y') }}</div>
                                <div>Invoice: <strong>INV/{{ $sale->reference }}</strong></div>
                                <div>Pay mode: <strong>{{ $sale->payment_method }}</strong></div>
                                <div>Area: <span>{{ $superAdmin->area }}</span>
                                </div>
                                <div>Associate: <span>{{ $superAdmin->associate }}</span>
                                </div>
                                <div>Mobile no: <span>{{ $superAdmin->phone }}</span>
                                </div>
                                <div>Delivered by: <span>{{ $superAdmin->delivered_by }}</span>
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
                                    <span>Doctor name:</span>
                                    <span>xxxxxxxxxxxx</span>
                                </div>
                                <div class="d-block">
                                    <span>Chamber name:</span>
                                    <span>xxxxxxxxxxxx</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive-sm">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th class="align-middle border-right">SL.No.</th>
                                    <th class="align-middle border-right">Product code</th>
                                    <th class="align-middle border-right">Product</th>
                                    <th class="align-middle border-right">Pack size UOM</th>
                                    <th class="align-middle border-right">Batch number</th>
                                    <th class="align-middle border-right">MRP (TK)</th>
                                    <th class="align-middle border-right">Vat (TK)</th>
                                    <th class="align-middle border-right">Quantity</th>
                                    <th class="align-middle border-right">Discount</th>
                                    <th class="align-middle border-right">MRP (TK) value</th>
                                    <th class="align-middle border-right">Vat (TK) value</th>
                                    <th class="align-middle"> Total value </th>
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
                                        <td class="align-middle border-right">
                                            {{ $index + 1 }}
                                        </td>
                                        <td class="align-middle border-right">
                                            {{ $item->product_code }}
                                        </td>
                                        <td class="align-middle border-right">
                                            {{ $item->product_name }}
                                        </td>

                                        <td class="align-middle border-right">{{ $item?->product?->pack_size }}</td>
                                        <td class="align-middle border-right">{{ $item?->product?->batch_no }}</td>
                                        <td class="align-middle border-right">{{ format_currency($item->unit_price) }}</td>
                                        <td class="align-middle border-right">
                                            {{ format_currency($item->product_tax_amount) }}
                                        </td>

                                        <td class="align-middle border-right">
                                            {{ $item->quantity }}
                                        </td>

                                        <td class="align-middle border-right">
                                            {{ format_currency($item->product_discount_amount) }}
                                        </td>
                                        <td class=" align-middle border-right">
                                            @php
                                                $mrp +=
                                                    $item->unit_price * $item->quantity -
                                                    $item->product_discount_amount;
                                            @endphp
                                            {{ format_currency($item->unit_price * $item->quantity - $item->product_discount_amount) }}
                                        </td>
                                        <td class=" align-middle border-right">
                                            @php
                                                $vat += $item->product_tax_amount;
                                            @endphp
                                            {{ format_currency($item->product_tax_amount) }}
                                        </td>
                                        <td class="align-middle">
                                            @php
                                                $subTotal += $item->sub_total;
                                            @endphp
                                            {{ format_currency($item->sub_total) }}
                                        </td>
                                    </tr>
                                @endforeach
                                <tr class=" border-bottom">
                                    <td colspan="8"></td>
                                    <td class=" border-left border-right">
                                        <strong>Sub total</strong>
                                    </td>
                                    <td class=" border-right">
                                        {{ format_currency($mrp) }}
                                    </td>
                                    <td class=" border-right">
                                        {{ format_currency($vat) }}
                                    </td>
                                    <td>
                                        {{ format_currency($subTotal) }}
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
                                        <td class="left border-top-0"><strong>Patient support
                                                ({{ $sale->discount_percentage }}%)</strong></td>
                                        <td class="right border-top-0">{{ format_currency($sale->discount_amount) }}</td>
                                    </tr>
                                    {{-- <tr>
                                        <td class="left"><strong>Tax ({{ $sale->tax_percentage }}%)</strong></td>
                                        <td class="right">{{ format_currency($sale->tax_amount) }}</td>
                                    </tr> --}}
                                    <tr>
                                        <td class="left"><strong>Grand Total</strong></td>
                                        <td class="right"><strong>{{ format_currency($sale->total_amount) }}</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="px-3">
                        <span>
                            <strong>Amount in words:</strong>
                            {{ ucfirst(str_replace('-', ' ', \Rmunate\Utilities\SpellNumber::value($sale->total_amount)->toLetters())) . ' Taka Only' }}
                        </span>
                        <p>{{ $sale?->note }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
