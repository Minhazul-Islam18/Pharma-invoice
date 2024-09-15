<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Sale Details</title>
    <link rel="stylesheet" href="{{ public_path('b3/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ public_path('b3/bootstrap-icons.css') }}">

    <style>
        .border-right {
            border-right: 1px solid #ddd;
        }

        .border-bottom {
            border-bottom: 1px solid #ddd;
        }

        .table td,
        .table th {
            padding: 0.75rem;
        }

        .text-uppercase {
            text-transform: uppercase;
        }

        .font-weight-bold {
            font-weight: bold;
        }

        .font-3xl {
            font-size: 1.75rem;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <table style="width: 100%;">
                        <tbody>
                            <tr>
                                <!-- <td style="font-size:
                        10px;">
                                    Reference: <strong>{{ $sale->reference }}</strong>
                                </td> -->
                                <td style="font-size: 16px; text-align:right; font-weight: bold;">
                                    Customer copy
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="card-body">
                        <!-- Header with Logo and Company Name -->
                        <table style="width: 100%; margin-bottom: 6px;">
                            <tr>
                                {{-- <td style="width: 20%; text-align: center;">
                                    <?php
                                    $imagePath = public_path('images/invoice/00ohv6rs.png');
                                    $imageData = base64_encode(file_get_contents($imagePath));
                                    $src = 'data:image/png;base64,' . $imageData;
                                    ?>

                                    <img src="{{ $src }}" style="width: 48px;" alt="Company Logo">
                                </td> --}}
                                <td style="width: 80%; text-align: center;">
                                    <h1
                                        style="font-family: 'Times New Roman', Times, serif; font-size: 27px;  font-weight: bold;">
                                        Healthcare Pharmaceuticals Ltd
                                    </h1>
                                </td>
                            </tr>
                        </table>

                        <!-- Address and Invoice Info Section -->
                        <table
                            style="width: 100%; border: 1px solid #000; margin-bottom: 20px; border-collapse: collapse;">
                            <tr>
                                <td
                                    style="font-family: 'Times New Roman', Times, serif; font-size: 11px;line-height: 16px; width: 33%; border-right: 1px solid #000; padding: 2px;">
                                    <p style="margin: 0;">
                                        Nasir Trade Centre (Level-9 & 14)<br />
                                        89 Bir Uttam C.R. Datta Sarak, Dhaka- 1205.<br />
                                        Tel: +880-2-9632175, +880-2-9632176<br />
                                        Fax: +880-2-9632172
                                    </p>
                                </td>
                                <td style="width: 33%; text-align: center; border-right: 1px solid #000; padding: 2px;">
                                    <h5
                                        style="font-family: 'Times New Roman', Times, serif; font-size: 20px; text-transform: uppercase; font-weight: bold;">
                                        Invoice
                                    </h5>
                                </td>
                                <td style="width: 33%; text-align: center; padding: 2px;">
                                    <?php
                                    $imagePath = public_path('images/invoice/2024-09-07_153328.png');
                                    $imageData = base64_encode(file_get_contents($imagePath));
                                    $src = 'data:image/png;base64,' . $imageData;
                                    ?>

                                    <img src="{{ $src }}" style="height: 50px;" alt="Invoice Image">
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-family: 'Times New Roman', Times, serif; font-size: 11px;line-height: 16px; width: 33%; border-right: 1px solid #000; border-top: 1px solid #000; padding: 7px;">
                                    <p style="margin: 0;">
                                        Moghbazar(Biotech) Sales Depot<br />
                                        Gulfesha Plaza (3rd Floor), Above Agora,<br />
                                        "Shahid Sangbadik Salina Parvin Sarak", Dhaka-1217<br />
                                        Bangladesh<br />
                                        Telephone: 9632176 (1401)
                                    </p>
                                </td>
                                <td
                                    style="font-family: 'Times New Roman', Times, serif; font-size: 11px;line-height: 16px; width: 33%; border-right: 1px solid #000; border-top: 1px solid #000; padding: 7px;">
                                    <h5 style="margin-bottom: 3px; border-bottom: 1px solid #000; padding-bottom: 1px;">
                                        Customer Code:</h5>
                                    <p style="margin: 0;">
                                        <strong>{{ $customer->firstname . ' ' . $customer->lastname }}</strong>
                                    </p>
                                    <p style="margin: 0;">{{ $customer->address }}</p>
                                    <p style="margin: 0;">Email: {{ $customer->email }}</p>
                                    <p style="margin: 0;">Phone: {{ $customer->phone }}</p>
                                </td>
                                <td
                                    style="font-family: 'Times New Roman', Times, serif; font-size: 11px;line-height: 16px; width: 33%; border-top: 1px solid #000; padding: 7px;">
                                    <p style="margin: 0;">Date:
                                        {{ \Carbon\Carbon::parse($sale->date)->format('d M, Y') }}</p>
                                    <p style="margin: 0;">Invoice: <strong>INV/{{ $sale->reference }}</strong></p>
                                    <p style="margin: 0;">Pay mode: <strong>{{ $sale->payment_method }}</strong></p>
                                    <p style="margin: 0;">Area: <span>{{ $superAdmin->area }}</span></p>
                                    <p style="margin: 0;">Associate: <span>{{ $superAdmin->associate }}</span></p>
                                    <p style="margin: 0;">Mobile no: <span>{{ $superAdmin->phone }}</span></p>
                                    <p style="margin: 0;">Delivered by: <span>{{ $superAdmin->delivered_by }}</span>
                                    </p>
                                </td>
                            </tr>
                        </table>

                        <!-- Doctor and Chamber Info -->
                        <table style="width: 100%; margin-bottom: 0;font-size: 8px; ">
                            <tr>
                                <td style="padding: 10px;">
                                    <strong>Doctor name:</strong> <span>xxxxxxxxxxxx</span>
                                </td>
                                <td style="padding: 10px;">
                                    <strong>Chamber name:</strong> <span>xxxxxxxxxxxx</span>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="table-responsive-sm">
                        <table class="table table-striped mb-0"
                            style="font-size: 8px; border-collapse: collapse; width: 100%; border: 1px solid #000000">
                            <thead>
                                <tr style="border-bottom: 1px solid #000;">
                                    <th class="align-middle" style="border-right: 1px solid #000;">SL.No.</th>
                                    <th class="align-middle" style="border-right: 1px solid #000;">Product code</th>
                                    <th class="align-middle" style="border-right: 1px solid #000;">Product</th>
                                    <th class="align-middle" style="border-right: 1px solid #000;">Pack size UOM</th>
                                    <th class="align-middle" style="border-right: 1px solid #000;">Batch number</th>
                                    <th class="align-middle" style="border-right: 1px solid #000;">MRP (TK)</th>
                                    <th class="align-middle" style="border-right: 1px solid #000;">Vat (TK)</th>
                                    <th class="align-middle" style="border-right: 1px solid #000;">Quantity</th>
                                    <th class="align-middle" style="border-right: 1px solid #000;">Discount</th>
                                    <th class="align-middle" style="border-right: 1px solid #000;">MRP (TK) value</th>
                                    <th class="align-middle" style="border-right: 1px solid #000;">Vat (TK) value</th>
                                    <th class="align-middle" style="border-right: none;">Total value</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $mrp = 0;
                                    $vat = 0;
                                    $subTotal = 0;
                                @endphp
                                @foreach ($sale->saleDetails as $index => $item)
                                    <tr style="border-bottom: 1px solid #000;">
                                        <td class="align-middle" style="border-right: 1px solid #000;">
                                            {{ $index + 1 }}</td>
                                        <td class="align-middle" style="border-right: 1px solid #000;">
                                            {{ $item->product_code }}</td>
                                        <td class="align-middle" style="border-right: 1px solid #000;">
                                            {{ $item->product_name }}</td>
                                        <td class="align-middle" style="border-right: 1px solid #000;">
                                            {{ $item?->product?->pack_size }}</td>
                                        <td class="align-middle" style="border-right: 1px solid #000;">
                                            {{ $item?->product?->batch_no }}</td>
                                        <td class="align-middle" style="border-right: 1px solid #000;">
                                            {{ format_currency($item->unit_price) }}</td>
                                        <td class="align-middle" style="border-right: 1px solid #000;">
                                            {{ format_currency($item->product_tax_amount) }}</td>
                                        <td class="align-middle" style="border-right: 1px solid #000;">
                                            {{ $item->quantity }}</td>
                                        <td class="align-middle" style="border-right: 1px solid #000;">
                                            {{ format_currency($item->product_discount_amount) }}</td>
                                        <td class="align-middle" style="border-right: 1px solid #000;">
                                            @php
                                                $mrp +=
                                                    $item->unit_price * $item->quantity -
                                                    $item->product_discount_amount;
                                            @endphp
                                            {{ format_currency($item->unit_price * $item->quantity - $item->product_discount_amount) }}
                                        </td>
                                        <td class="align-middle" style="border-right: 1px solid #000;">
                                            @php
                                                $vat += $item->product_tax_amount;
                                            @endphp
                                            {{ format_currency($item->product_tax_amount) }}
                                        </td>
                                        <td class="align-middle" style="border-right: none;">
                                            @php
                                                $subTotal += $item->sub_total;
                                            @endphp
                                            {{ format_currency($item->sub_total) }}
                                        </td>
                                    </tr>
                                @endforeach
                                <tr style="border-bottom: 1px solid #000;">
                                    <td colspan="8"></td>
                                    <td class="align-middle"
                                        style="border-left: 1px solid #000; border-right: 1px solid #000;"><strong>Sub
                                            total</strong></td>
                                    <td class="align-middle" style="border-right: 1px solid #000;">
                                        {{ format_currency($mrp) }}</td>
                                    <td class="align-middle" style="border-right: 1px solid #000;">
                                        {{ format_currency($vat) }}</td>
                                    <td class="align-middle" style="border-right: none;">
                                        {{ format_currency($subTotal) }}</td>
                                </tr>
                                {{-- <tr style="border-bottom: 1px solid #000;">
                                    <td colspan="8"></td>
                                    <td class="align-middle"
                                        style="border-left: 1px solid #000; border-right: 1px solid #000;">
                                        <strong>Grand total</strong>
                                    </td>
                                    <td class="align-middle" style="border-right: none;"></td>
                                    <td class="align-middle" style="border-right: 1px solid #000;">
                                        {{ format_currency($sale->total) }}</td>
                                </tr> --}}
                                <tr style="">
                                    <td colspan="10"></td>
                                    <td class="left" style="border-bottom: 1px solid #000;">
                                        <strong>Patient support ({{ $sale->discount_percentage }}%)</strong>
                                    </td>
                                    <td class="right" style="border-bottom: 1px solid #000;">
                                        {{ format_currency($sale->discount_amount) }}
                                    </td>
                                </tr>
                                <tr style="">
                                    <td colspan="10"></td>
                                    <td class="left">
                                        <strong>Payable amount</strong>
                                    </td>
                                    <td class="right">
                                        <strong>{{ format_currency($sale->total_amount) }}</strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div style="padding: 8px 0; font-size:10px; margin-top: 8px;">
                        <span>
                            <strong>Amount in words:</strong>
                            {{ ucfirst(str_replace('-', ' ', \Rmunate\Utilities\SpellNumber::value($sale->total_amount)->toLetters())) . ' Taka Only' }}
                        </span>
                        <p>{{ $sale?->note }}</p>
                    </div>

                    <table style="width: 100%; margin-top: 15px;font-size:10px;">
                        <tbody>
                            <tr>
                                <td style="text-align:center;">
                                    <div
                                        style="border-top: 1px solid #000000; padding: 10px; text-align:center; width:70%">
                                        <h2 style="font-weight: bolder">Customer Signature</h2>
                                    </div>
                                </td>

                                <td style="text-align:center;">
                                    <div
                                        style="border-top: 1px solid #000000; padding: 10px; text-align:center; width:70%">
                                        <h2 style="font-weight: bolder">Depot In-Charge</h2>
                                    </div>
                                </td>
                                <td style="text-align:center;">
                                    <div
                                        style="border-top: 1px solid #000000; padding: 10px; text-align:center; width:70%">
                                        <h2 style="font-weight: bolder">Authorised By</h2>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
