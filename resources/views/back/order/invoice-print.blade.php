<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hóa đơn</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('back/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('back/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('back/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('back/dist/css/AdminLTE.min.css') }}">

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body {{-- onload="window.print();" --}}>
    <div class="wrapper">
        <section class="invoice">
            <div class="box box-primary">
                <div class="box-body">
                    <div id="">
                        <h5 class="box-title">Thông tin</h5>
                        <table id="" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Mã đơn: </th>
                                    <td><b>{{ $order->id }} </b></td>
                                </tr>
                                <tr>
                                    <th>Tên khách hàng: </th>
                                    <td><b>{{ $order->name }} </b></td>
                                </tr>
                                <tr>
                                    <th>Email: </th>
                                    <td><b>{{ $order->email }} </b></td>
                                </tr>
                                <tr>
                                    <th>Số điện thoại: </th>
                                    <td><b>{{ $order->phone }} </b></td>
                                </tr>
                                <tr>
                                    <th>Địa chỉ: </th>
                                    <td><b>{{ $order->street_address }}, {{ $order->ward }}, {{ $order->district }},
                                            {{ $order->provincial }}</b></td>
                                </tr>
                                <tr>
                                    <th>Ghi chú: </th>
                                    <td><b>{{ $order->note }} </b></td>
                                </tr>
                                <tr>
                                    <th>Phương thức thanh toán: </th>
                                    <td>
                                        <b>{{ $order->payment_method == 'payment on delivery' ? 'Thanh toán khi nhận hàng' : 'Thanh toán trực tuyến' }}
                                        </b>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tình trạng thanh toán: </th>
                                    <td>
                                        <b>{{ $order->payment_status == 'paid' ? 'Đã thanh toán' : 'Chưa thanh toán' }}
                                        </b>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Trạng thái đơn hàng: </th>
                                    <td>
                                        <b>
                                            @switch($order->status)
                                                @case('new')
                                                    <div>Đơn hàng mới</div>
                                                @break

                                                @case('preparing goods')
                                                    <div>Chuẩn bị hàng</div>
                                                @break

                                                @case('delivering')
                                                    <div>Đang giao</div>
                                                @break

                                                @case('delivered')
                                                    <div>Đã giao</div>
                                                @break

                                                @case('order has been cancelled')
                                                    <div>Đã bị hủy</div>
                                                @break

                                                @default
                                            @endswitch
                                        </b>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Thời gian: </th>
                                    <td><b>{{ $order->created_at->format('H:i:s - d/m/Y') }}</b></td>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <h5 class="box-title">Danh sách sản phẩm</h5>
                        <table id="" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Id</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Kích cỡ</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($order_detail as $stt => $item)
                                    @php
                                        $product = \App\Models\Product::find($item['product_id']);
                                        $total += $item->total;
                                    @endphp
                                    <tr>
                                        <td><b>{{ ++$stt }}</b></td>
                                        <td><b>{{ $item->product_id }}</b></td>
                                        <td><b>{{ $product->name }}</b></td>
                                        <td><b>{{ $item->size }}</b></td>
                                        <td><b>{{ $item->qty }}</b></td>
                                        <td><b>{{ number_format($item->total, 0, '.', '.') }} VND</b></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="6"><b>Tổng: {{ number_format($total, 0, '.', '.') }} VND</b></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </section>

    </div>
    <script>

        window.onload = function() {
            setTimeout(function() {
                window.print()
            }, 500);
        };
    </script>
</body>

</html>
