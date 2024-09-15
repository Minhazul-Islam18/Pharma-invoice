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
        @page {
            margin: 50px 25px;
        }

        .footer {
            position: fixed;
            bottom: 0px;
            left: 0px;
            right: 0px;
            height: 50px;
            /* Adjust height to ensure footer content does not overlap page content */
            text-align: center;
            font-size: 10px;
        }

        .page-number {
            position: absolute;
            right: 25px;
            /* Adjust right padding for proper alignment */
            bottom: 10px;
            text-align: right;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
        }

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
    <div class="container-fluid" style="font-family: 'Times New Roman', Times, serif !important;">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <table style="width: 100%;">
                        <tbody>
                            <tr>
                                <td style="font-size:
                        10px;">
                                </td>
                                <td
                                    style="font-size: 16px; text-align:right;font-family: 'Times New Roman', Times, serif; padding-right: 20px; font-weight: bold;">
                                    Customer copy
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="card-body" style="">
                        <!-- Header with Logo and Company Name -->
                        <table style="width: 100%; margin-bottom: 6px;">
                            <tr>
                                <td style="width: 100%; text-align: center; position: relative;">
                                    <?php
                                    $imagePath = public_path('images/invoice/00ohv6rs.png');
                                    $imageData = base64_encode(file_get_contents($imagePath));
                                    $src = 'data:image/png;base64,' . $imageData;
                                    ?>

                                    <img src="{{ $src }}"
                                        style="width: 48px;position: absolute; left: 10px; top: 0px;"
                                        alt="Company Logo">
                                    <h1
                                        style="font-size: 27px; font-weight: bold; font-family: 'Times New Roman', Times, serif;">
                                        Healthcare Pharmaceuticals Ltd.
                                    </h1>
                                </td>
                            </tr>
                        </table>

                        <!-- Address and Invoice Info Section -->
                        <table
                            style="width: 100%; border: 1px solid #ccc; margin-bottom: 20px; border-collapse: collapse; font-family: 'Times New Roman', Times, serif;">
                            <tr>
                                <td
                                    style="font-size: 11px;line-height: 16px; width: 33%; border-right: 1px solid #ccc;vertical-align:top;">
                                    <p style="margin: 0;padding: 5px;">
                                        Nasir Trade Centre (Level-9 & 14)<br />
                                        89 Bir Uttam C.R. Datta Sarak, Dhaka- 1205.<br />
                                        Tel: +880-2-9632175, +880-2-9632176<br />
                                        Fax: +880-2-9632172
                                    </p>
                                </td>
                                <td style="width: 33%; text-align: center; border-right: 1px solid #ccc;">
                                    <h5 style="font-size: 16px; text-transform: uppercase; font-weight: bold;">Invoice
                                    </h5>
                                </td>
                                <td style="width: 33%; text-align: center;">
                                    <?php
                                    $imagePath = public_path('images/invoice/2024-09-07_153328.png');
                                    $imageData = base64_encode(file_get_contents($imagePath));
                                    $src = 'data:image/png;base64,' . $imageData;
                                    ?>

                                    <img src="{{ $src }}" style="height: 65px; width: 75%;"
                                        alt="Invoice Image">
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 11px;line-height: 16px; width: 33%; border-right: 1px solid #ccc; border-top: 1px solid #ccc; vertical-align:top;">
                                    <p style="margin: 0;padding: 5px;">
                                        Moghbazar(Biotech) Sales Depot<br />
                                        Gulfesha Plaza (3rd Floor), Above Agora,<br />
                                        "Shahid Sangbadik Salina Parvin Sarak",<br />
                                        Dhaka-1217<br />
                                        Bangladesh<br />
                                        Telephone: 9632176 (1401)
                                    </p>
                                </td>
                                <td
                                    style="font-size: 11px;line-height: 16px; width: 33%; border-right: 1px solid #ccc; border-top: 1px solid #ccc; vertical-align:top;padding: 5px;">
                                    <p style="margin: 0;font-weight:bold;">Customer code: {{ $sale->customer_code }}</p>
                                    <p style="margin: 0;">
                                        {{ $customer->firstname . ' ' . $customer->lastname }}
                                    </p>
                                    <p style="margin: 0;">{{ $sale->customer_address }}</p>
                                    <p style="margin: 0;">Telephone: {{ $sale->customer_phone }}</p>
                                </td>
                                <td
                                    style="font-size: 11px;line-height: 16px; width: 33%; border-top: 1px solid #ccc; padding: 5px;vertical-align:top;">
                                    <p style="margin: 0; vertical-align: middle;">
                                        <span style="width: 65px; display:inline-block;">Date</span>
                                        <span
                                            style="display: inline-block;">:{{ \Carbon\Carbon::parse($sale->date)->format('d M, Y') }}</span>
                                    </p>
                                    <p style="margin: 0; vertical-align: middle;"><span
                                            style="width: 65px; display:inline-block;">Invoice
                                            no.</span> <span
                                            style="display: inline-block;">:{{ $sale->reference }}</span>
                                    </p>
                                    <p style="margin: 0; vertical-align: middle;"><span
                                            style="width: 65px; font-weight: bold; display:inline-block;">Pay
                                            mode</span> <span
                                            style="font-weight: bold;display: inline-block;">:{{ $sale->payment_method }}</span>
                                    </p>
                                    <p style="margin: 0; vertical-align: middle;"><span
                                            style="width: 65px; display:inline-block;">Area</span>
                                        <span style="display: inline-block;">:{{ $superAdmin->area }}</span>
                                    </p>
                                    <p style="margin: 0; vertical-align: middle;"><span
                                            style="width: 65px; display:inline-block;">Associate</span>
                                        <span style="display: inline-block;">:{{ $superAdmin->associate }}</span>
                                    </p>
                                    <p style="margin: 0; vertical-align: middle;">
                                        <span style="width: 65px; display:inline-block;">Mobile
                                            no.</span>
                                        <span style="display: inline-block;">:{{ $superAdmin->phone }}</span>
                                    </p>
                                    <p style="margin: 0; vertical-align: middle;"><span
                                            style="width: 65px; display:inline-block;">Delivered
                                            by</span> <span
                                            style="display: inline-block;">:{{ $superAdmin->delivered_by }}</span>
                                    </p>
                                    <p style="margin: 0; vertical-align: middle;"><span
                                            style="width: 65px; display:inline-block;">Delivery
                                            date</span>
                                        <span
                                            style="display: inline-block;">:{{ \Carbon\Carbon::parse(now())->format('d M, Y') }}</span>
                                    </p>
                                </td>
                            </tr>
                        </table>

                        <!-- Doctor and Chamber Info -->
                        <table
                            style="width: 100%; margin-bottom: 10px;font-size: 10px;  font-family: 'Times New Roman', Times, serif;">
                            <tr style="padding: 10px; vertical-align: middle;">
                                <strong style="width: 60px; display: inline-block;">Doctor name</strong>
                                <strong style=" display: inline-block;">:</strong>
                            </tr>
                            <tr style="padding: 10px; vertical-align: middle;">
                                <strong style="width: 60px; display: inline-block;">Chamber</strong> <strong
                                    style=" display: inline-block;">:</strong>
                            </tr>
                        </table>
                    </div>
                    <div class="table-responsive-sm" style="width: 100%">
                        <table class="table table-striped mb-0"
                            style="font-size: 11px; border-collapse: collapse; width: 100%; font-family: 'Times New Roman', Times, serif;">
                            <thead>
                                <tr style="border-bottom: 1px solid #000;border-top: 1px solid #000;">
                                    <th class="align-middle text-center p-0"
                                        style="padding: 2px; text-align: center; border-right: 1px solid #000; border-left: 1px solid #000;">
                                        SL.No.</th>
                                    <th class="align-middle text-center p-0"
                                        style="padding: 2px; text-align: center; border-right: 1px solid #000; width: 90px">
                                        Product
                                        <br />
                                        code
                                    </th>
                                    <th class="align-middle text-center p-0"
                                        style="padding: 2px; text-align: center; border-right: 1px solid #000;min-width:140px;">
                                        Product
                                        Name
                                    </th>
                                    <th class="align-middle text-center p-0"
                                        style="padding: 2px; text-align: center; border-right: 1px solid #000;width: 70px;">
                                        Pack
                                        size<br /> UOM</th>
                                    <th class="align-middle text-center p-0"
                                        style="padding: 2px; text-align: center; border-right: 1px solid #000;">Batch
                                        <br />
                                        number
                                    </th>
                                    <th class="align-middle text-center p-0"
                                        style="padding: 2px; text-align: center; border-right: 1px solid #000;">
                                        MRP(TK)</th>
                                    <th class="align-middle text-center p-0"
                                        style="padding: 2px; text-align: center; border-right: 1px solid #000;">
                                        Vat(TK)</th>
                                    <th class="align-middle text-center p-0"
                                        style="padding: 2px; text-align: center; border-right: 1px solid #000;">
                                        Invoice Qty.</th>
                                    <th class="align-middle text-center p-0"
                                        style="padding: 2px; text-align: center; border-right: 1px solid #000;">Bonus
                                        Qty.</th>
                                    <th class="align-middle text-center p-0"
                                        style="padding: 2px; text-align: center; border-right: 1px solid #000;">
                                        MRP(TK)
                                        <br />
                                        value
                                    </th>
                                    <th class="align-middle text-center p-0"
                                        style="padding: 2px; text-align: center; border-right: 1px solid #000;">
                                        Vat(TK)
                                        <br />
                                        value
                                    </th>
                                    <th class="align-middle text-center p-0"
                                        style="padding: 2px; text-align: center; border-right: 1px solid #000;">
                                        Total value
                                    </th>
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
                                        <td class="align-middle p-0 text-center"
                                            style="padding: 0;text-align: center; border-right: 1px solid #000; border-left: 1px solid #000;">
                                            {{ $index + 1 }}</td>
                                        <td class="align-middle p-0 text-center"
                                            style="padding: 0;text-align: center; border-right: 1px solid #000;">
                                            {{ $item->product_code }}</td>
                                        <td class="align-middle p-0 text-center"
                                            style="padding: 0 4px;text-align: left; border-right: 1px solid #000;">
                                            {{ $item->product_name }}</td>
                                        <td class="align-middle p-0 text-center"
                                            style="padding: 0;text-align: center; border-right: 1px solid #000;">
                                            {{ $item?->product?->pack_size }}</td>
                                        <td class="align-middle p-0 text-center"
                                            style="padding: 0;text-align: center; border-right: 1px solid #000;">
                                            {{ $item?->product?->batch_no }}</td>
                                        <td class="align-middle p-0 text-center"
                                            style="padding: 0;text-align: center; border-right: 1px solid #000;">
                                            {{ number_format($item->unit_price, 2) }}</td>
                                        <td class="align-middle p-0 text-center"
                                            style="padding: 0;text-align: center; border-right: 1px solid #000;">
                                            {{ number_format($item->product_tax_amount, 2) }}</td>
                                        <td class="align-middle p-0 text-center"
                                            style="border-right: 1px solid #000; padding: 0; text-align: center;">
                                            {{ $item->quantity }}</td>
                                        <td class="align-middle p-0 text-center"
                                            style="border-right: 1px solid #000; padding: 0; text-align: center;">
                                            {{ number_format($item->product_discount_amount, 2) }}</td>
                                        <td class="align-middle p-0 text-center"
                                            style="border-right: 1px solid #000; padding: 0; text-align: center;">
                                            @php
                                                $mrp +=
                                                    $item->unit_price * $item->quantity -
                                                    $item->product_discount_amount;
                                            @endphp
                                            {{ number_format($item->unit_price * $item->quantity - $item->product_discount_amount, 2) }}
                                        </td>
                                        <td class="align-middle p-0 text-center"
                                            style="border-right: 1px solid #000; padding: 0; text-align: center;">
                                            @php
                                                $vat += $item->product_tax_amount;
                                            @endphp
                                            {{ number_format($item->product_tax_amount, 2) }}
                                        </td>
                                        <td class="align-middle p-0 text-center"
                                            style="padding: 0 5px;text-align: right; border-right: 1px solid #000;">
                                            @php
                                                $subTotal += $item->sub_total;
                                            @endphp
                                            {{ number_format($item->sub_total, 2) }}
                                        </td>
                                    </tr>
                                @endforeach
                                <tr style="border-bottom: 1px solid #000;">
                                    <td class="align-middle" colspan="9"
                                        style="border-left: 1px solid #000; border-right: 1px solid #000; text-align:right; padding: 1px 5px;">
                                        <strong style="font-size: 16px; line-height: 18px;">Sub
                                            total : </strong>
                                    </td>
                                    <td class="align-middle"
                                        style="border-right: 1px solid #000; text-align: center; padding: 1px 0;">
                                        {{ number_format($mrp, 2) }}</td>
                                    <td class="align-middle"
                                        style="border-right: 1px solid #000; text-align: center; padding: 1px 0;">
                                        {{ number_format($vat, 2) }}</td>
                                    <td class="align-middle"
                                        style="border-right: 1px solid #000; text-align: right; padding: 1px 5px;">
                                        {{ number_format($subTotal, 2) }}</td>
                                </tr>
                                <tr>
                                    <td class="align-middle" colspan="10"
                                        style="text-align:right; padding: 5px 5px; font-align: 14px; line-height: 16px;">
                                        <span
                                            style="display: block; text-align:right; margin-bottom:0px; vertical-align: middle;">
                                            <strong style="width: 120px; display: inline-block;text-align:left;">Grand
                                                total</strong><strong style=" display: inline-block;">:</strong>
                                        </span>
                                        <span
                                            style="display: block; text-align:right; margin-bottom:0px; vertical-align: middle;">
                                            <strong style="width: 120px; display: inline-block;text-align:left;">Less
                                                discount</strong><strong style=" display: inline-block;">:</strong>
                                        </span>
                                        <span
                                            style="display: block; text-align:right; margin-bottom:0px; vertical-align: middle;">
                                            <strong
                                                style="width: 120px; display: inline-block;text-align:left;">Patient
                                                support </strong><strong style=" display: inline-block;">:</strong>
                                        </span>
                                        <span style="display: block; text-align:right; vertical-align: middle;">
                                            <strong
                                                style="width: 120px; display: inline-block;text-align:left;">Payable
                                                amount </strong><strong style=" display: inline-block;">:</strong>
                                        </span>
                                    </td>
                                    {{-- <td class="align-middle"
                                        style="border-right: 1px solid #000; text-align: center; padding: 5px 0;">
                                        {{ $mrp }}</td>
                                    <td class="align-middle"
                                        style="border-right: 1px solid #000; text-align: center; padding: 5px 0;">
                                        {{ $vat }}</td> --}}
                                    <td class="align-middle" colspan="2"
                                        style="border-right: none; text-align: center; padding: 5px 5px; font-align: 14px; line-height: 16px;">
                                        <span
                                            style="display: block; text-align:right; margin-bottom:0px; vertical-align: middle;">
                                            <strong
                                                style="display: inline-block;text-align:right;">{{ number_format($sale->total_amount, 2) }}</strong>
                                        </span>
                                        <span
                                            style="display: block; text-align:right; margin-bottom:0px; vertical-align: middle;">
                                            <strong
                                                style="display: inline-block;text-align:right;">{{ number_format($sale->discount_amount, 2) }}</strong>
                                        </span>
                                        <span
                                            style="display: block; text-align:right; margin-bottom:0px; vertical-align: middle;">
                                            <strong style="display: inline-block;text-align:right;">
                                                @php
                                                    $ps = ($sale->total_amount / 100) * 12;
                                                @endphp
                                                {{ number_format($ps, 2) }}
                                            </strong>
                                        </span>
                                        <span
                                            style="display: block; text-align:right; margin-bottom:0px; vertical-align: middle;">
                                            <strong style="display: inline-block;text-align:right;">
                                                @php
                                                    $payableAmont =
                                                        $sale->total_amount - ($sale->discount_amount + $ps);
                                                @endphp
                                                {{ number_format($payableAmont, 2) }}
                                            </strong>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="table-responsive-sm" style="width: 100%">
                        <table style="font-size: 14px; width: 100%; font-family: 'Times New Roman', Times, serif;">
                            <tbody>
                                <tr style="">
                                    <td class="left" style="text-align:right;">
                                        <strong style="width: 120px; display: inline-block;text-align:left;">Grand
                                            total</strong><strong>:</strong>
                                    </td>
                                    <td style="width: 90px; text-align:right;">
                                        <strong>{{ $sale->total_amount }}</strong>
                                    </td>
                                </tr>
                                <tr style="">
                                    <td class="left" style="text-align:right;">
                                        <strong style="width: 120px; display: inline-block;text-align:left;">Less
                                            discount</strong><strong>:</strong>
                                    </td>
                                    <td style="width: 90px; text-align:right;">
                                        <strong>{{ $sale->discount_amount }}</strong>
                                    </td>
                                </tr>
                                <tr style="">
                                    <td class="left" style="text-align:right;">
                                        <strong style="width: 120px; display: inline-block;text-align:left;">Patient
                                            support</strong><strong>:</strong>
                                    </td>
                                    <td style="width: 90px; text-align:right;">
                                        <strong> @php
                                            $ps = ($sale->total_amount / 100) * 12;
                                        @endphp
                                            {{ $ps }}</strong>
                                    </td>
                                </tr>
                                <tr style="">
                                    <td class="left" style="text-align:right;">
                                        <strong style="width: 120px; display: inline-block;text-align:left;">Payable
                                            amount </strong><strong>:</strong>
                                    </td>
                                    <td style="width: 90px; text-align:right;">
                                        <strong>
                                            @php
                                                $payableAmont = $sale->total_amount - ($sale->discount_amount + $ps);
                                            @endphp
                                            {{ $payableAmont }}
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div> --}}
                    <div
                        style="padding: 8px 0; font-size: 11px;line-height: 16px; margin-top: 8px; font-family: 'Times New Roman', Times, serif;">
                        <span>
                            <strong>Amount in words:</strong>
                            {{ ucfirst(str_replace('-', ' ', \Rmunate\Utilities\SpellNumber::value($payableAmont)->toLetters())) . ' Taka Only' }}
                        </span>
                        {{-- <p style=" font-family:Arial, sans-serif !important;">
                            তাপ সংবেদনশীল ওষুধের ক্ষেত্রে (Cold Chain Products), প্রতিবার ওষুধ নিতে আসার সময় আইসপ্যাক
                            সহ কুলার ব্যাগ (Cooler Bag) নিয়ে আসবেন, অন্যথায় আবার কিনতে হবে। ওষুধ ক্রয়ের পূর্বে
                            ভালোমতো পর্যবেক্ষণ করে নিন, বিক্রিত ওষুধ কোন অবস্থাতেই ফেরত নেয়া অথবা পরিবর্তন করা হয় না।
                            প্রতিদিন সকাল ৯.৩০ টা থেকে রাত ১০.০০ টা পর্যন্ত ওষুধ বিক্রয় করা হয় ।</p> --}}
                        <?php
                        $imagePath = public_path('images/invoice/invoice-note.png');
                        $imageData = base64_encode(file_get_contents($imagePath));
                        $src = 'data:image/png;base64,' . $imageData;
                        ?>
                        <img src="{{ $src }}"
                            style="width: 100%; margin-top: 60px; border: 1px solid #000000; display: block;"
                            alt="">
                    </div>

                    {{-- <table style="width: 100%; margin-top: 15px;font-size:10px;">
                        <tbody>
                            <tr>
                                <td style="text-align:center;">
                                    <div
                                        style="border-top: 1px solid #000000; padding: 10px; text-align:center; width:70%">
                                        <h2 style="font-weight: bolder">Customer</h2>
                                    </div>
                                </td>

                                <td style="text-align:center;">
                                    <div
                                        style="border-top: 1px solid #000000; padding: 10px; text-align:center; width:70%">
                                        <h2 style="font-weight: bolder">Depat In-Charge</h2>
                                    </div>
                                </td>
                                <td style="text-align:center;">
                                    <div
                                        style="border-top: 1px solid #000000; padding: 10px; text-align:center; width:70%">
                                        <h2 style="font-weight: bolder">Authorised</h2>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table> --}}
                </div>
            </div>
        </div>
        <!-- Footer Section -->
        <div class="footer">
            <table style="width: 100%;font-size:10px; font-family: 'Times New Roman', Times, serif;">
                <tbody>
                    <tr>
                        <td style="text-align:center; padding: 10px 0;">
                            <div style="border-top: 1px solid #000000; text-align:center; width:70%">
                                <h2 style="font-weight: bolder; margin: 0;">Customer signature</h2>
                            </div>
                        </td>

                        <td style="text-align:center;padding: 10px 0;">
                            <div style="border-top: 1px solid #000000; text-align:center; width:70%">
                                <h2 style="font-weight: bolder; margin: 0;">Depat In-Charge</h2>
                            </div>
                        </td>

                        <td style="text-align:center;padding: 10px 0;">
                            <div style="border-top: 1px solid #000000; text-align:center; width:70%">
                                <h2 style="font-weight: bolder; margin: 0;">Authorised by</h2>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <strong
                                style="display: block; text-align:center; font-family: 'Times New Roman', Times, serif; font-size: 16px;">
                                Helpline No. : 01796234234
                            </strong>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Page Number -->
            <div class="page-number">
                <script type="text/php">
                    if ( isset($pdf) ) {
                        $pdf->page_text(525, 820, "Page {PAGE_NUM} / {PAGE_COUNT}", 'Times-Roman', 10, array(0,0,0));
                    }
                </script>
            </div>
        </div>
</body>

</html>
