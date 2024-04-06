<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sale Details</title>
    <link rel="stylesheet" href="{{ public_path('b3/bootstrap.min.css') }}">
</head>
<style>
 .custom-tr {
        height: 250px; /* Sesuaikan tinggi baris dengan yang Anda inginkan */
        width: 10px;
    }
    .table-bordered {
        background-color: #000 !important; /* Ubah warna latar belakang tabel menjadi hitam */
    }

</style>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-xs-8 mb-2 mb-md-0">
                        <div style="margin-right: auto; max-width: 70%;">
                                <div><strong>{{ settings()->company_name }}</strong></div>
                                <div style="overflow: hidden; text-overflow: ellipsis;">{{ settings()->company_address }}</div>
                                <div>Phone: {{ settings()->company_phone }}     /   Invoice: <strong>INV/{{ $sale->reference }}</strong></div>
                                <div>Email: {{ settings()->company_email }}     /   Reference: <strong>{{ $sale->reference }}</strong></div>
                            </div>
                        </div>
                        <div class="col-xs-4 mb-2 mb-md-0">
                        <div style="margin-left: auto; max-width: 70%;">
                                <div><strong>Tanggal : {{ \Carbon\Carbon::parse($sale->date)->format('d M, Y') }}</strong></div>
                                <div>Kpd yth : <strong>{{ $customer->customer_name }}</strong></div>
                                <div style="overflow: hidden; text-overflow: ellipsis;">{{ $customer->address }}</div>
                                <div>Email: {{ $customer->customer_email }}</div>
                                <div>Phone: {{ $customer->customer_phone }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive-sm" style="margin-top: 5px; overflow: hidden;">
                    <table class="table table-bordered table-fixed table-dark" style="table-layout: fixed;">
                            <thead>
                            <tr>
                                <th class="align-middle" scope="col" style="width: 5%;">No</th>
                                <th class="align-middle" scope="col" style="width: 30%;">Product</th>
                                <th cospan="2" class="align-middle" scope="col" style="width: 13%">Harga</th>
                                <th class="align-middle" scope="col" style="width: 10%">Quantity</th>
                                <th class="align-middle" scope="col">Jml KG</th>
                                <th class="align-middle">Discount</th>
                                <th class="align-middle" style="width: 8%">Tax</th>
                                <th class="align-middle">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="custom-tr">

                            <td class="align-middle">
                                    @php $counter = 1 @endphp
                                        <strong>{{ $counter }}.</strong>
                                        <br>
                                    @php $counter++ @endphp
                                    </td>

                                    <td class="align-middle">
                                    @foreach($sale->saleDetails as $item)
                                        {{ $item->product_name }} || <strong>{{$item->product_code}}</strong>
                                        <br>
                                    @endforeach
                                    </td>

                                    <td class="align-middle">
                                    @foreach($sale->saleDetails as $item)
                                        {{ format_currency($item->unit_price) }}
                                        <br>
                                    @endforeach
                                    </td>

                                    <td class="align-middle">
                                    @foreach($sale->saleDetails as $item)
                                        {{ $item->quantity }} Box
                                        <br>
                                    @endforeach
                                    </td>

                                    <td class="align-middle">
                                    @foreach($sale->saleDetails as $item)
                                        {{ $item->jmlkg }} KG
                                        <br>
                                    @endforeach
                                    </td>

                                    <td class="align-middle">
                                    @foreach($sale->saleDetails as $item)
                                        {{ format_currency($item->product_discount_amount) }}
                                        <br>
                                    @endforeach
                                    </td>

                                    <td class="align-middle">
                                    @foreach($sale->saleDetails as $item)
                                        {{ format_currency($item->product_tax_amount) }}
                                        <br>
                                    @endforeach
                                    </td>

                                    <td class="align-middle">
                                    @foreach($sale->saleDetails as $item)
                                        {{ format_currency($item->sub_total) }}
                                        <br>
                                    @endforeach
                                    </td>
                            </tr>
                            </tbody>
                            <tr>
                                <td colspan="8">Jenis Pembayaran    : Tunai <span style="float: right;">Total : {{ format_currency($sale->total_amount) }}<br>Biaya Pengiriman  : {{ format_currency($sale->shipping_amount) }}<br>Sisa Tagihan : {{ format_currency($sale->due_amount)}}</span><br>Tanggal Kirim :   {{ \Carbon\Carbon::parse($sale->date)->format('d M, Y') }}</td>
                            </tr>
                            <tr>
                                <td colspan="4">Armada Pengiriman</td>
                                <td colspan="4"><span style="float: right;">Total Yang Harus Dibayar    : {{ format_currency($sale->total_amount - $sale->due_amount) }}</span></td>
                            </tr>

                        </table>
                    </div>
                    <div class="row text-center" style="padding-top: 5px;">
                        <div class="col-xs-3" style="text-align: center;" >Hormat Kami,<br><br><br>({{ auth()->user()->name }})</div>
                        <div class="col-xs-3">Checker<br><br><br>(          )</div>
                        <div class="col-xs-3">Pengirim<br><br><br>(         )</div>
                        <div class="col-xs-3">Penerima Barang<br><br><br>({{ $customer->customer_name }})</div>
                    </div>


                    <div class="row" style="margin-top: 25px;">
                        <div class="col-xs-12">
                            <p style="font-style: italic;text-align: center">{{ settings()->company_name }} &copy; {{ date('Y') }}.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>