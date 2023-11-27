<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send Email | {{$name_shop}}</title>
</head>

<body>
    <div>
        <div
            style="margin:0;font-family:Arial,sans-serif;font-size:16px;line-height:1.1;color:#434343;background-color:#f3f3f3">
            <table border="0" cellpadding="0" cellspacing="0" width="600px" style="margin:50px auto 0">
                <tbody>
                    <tr>
                        <td bgcolor="#ffffff" style="display:block;padding:25px">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td>
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%"
                                                style="border-bottom:1px solid #e6e6e6;padding-bottom:25px;font-family:'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div style="font-size:18px;line-height:22px;color:#343434">
                                                                Xin chào {{ $email_name }},</div>
                                                        </td>
                                                        <td align="right">
                                                            <h1
                                                                style="display: block;
                                                            font-size: 2em;
                                                            margin-block-start: 0.67em;
                                                            margin-block-end: 0.67em;
                                                            margin-inline-start: 0px;
                                                            margin-inline-end: 0px;
                                                            font-weight: bold;">
                                                                <span
                                                                    style="
                                                                   color: #33ccff;
                                                                   text-decoration: none;
                                                                   background-color: transparent;">{{$name_shop}}</span>
                                                                
                                                            </h1>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p style="margin:28px 0 23px;font-size:16px;line-height:20px;color:#434343">
                                                Cảm ơn vì bạn đã tin tưởng và chọn {{$name_shop}} làm nơi mua sắm của
                                                mình. Chúng tôi hy vọng bạn sẽ hài lòng khi lựa chọn những sản phẩm bên
                                                cửa hàng chúng tôi.<br><br>
                                                Đây là Email tự động, vui lòng không phản hồi qua Email này.</p>
                                            <p style="margin:26px 0 3px;font-size:13px;color:#8f8f8f">Trân trọng. <br>
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br><br>
                            <table
                                style="
                            width: 100%;
                            max-width: 100%;
                            margin-bottom: 20px;
                            background-color: transparent;
                            border: 1px solid #f4f4f4;
                            padding: 8px; ">
                                <thead>
                                    <tr>
                                        <td style="padding: 5px;"><b>#</b></td>
                                        <td style="padding: 5px;"><b>Sản phẩm</b></td>
                                        <td style="padding: 5px;"><b>Kích cỡ</b></td>
                                        <td style="padding: 5px;"><b>Giá</b></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $main_total = 0;
                                    @endphp
                                    @foreach ($order->orderDetails as $i => $item)
                                        @php
                                            $product = \App\Models\Product::find($item->product_id);
                                            $main_total += $item->total;
                                        @endphp
                                        <tr>
                                            <td style="padding: 5px;">{{ ++$i }}</td>
                                            <td style="padding: 5px;">{{ $product->name }} x {{$item->qty}}</td>
                                            <td style="padding: 5px;">{{ $item->size }} </td>
                                            <td style="padding: 5px;">{{ number_format($item->total, 0, '.', '.') }} VND</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td style="padding: 5px;" colspan="4">Tổng giá các sản phẩm: {{ number_format($main_total, 0, '.', '.') }} VND</td>
                                    </tr>
                                </tbody>
                            </table>

                        </td>
                    </tr>
                </tbody>
            </table>
            <table border="0" cellpadding="0" cellspacing="0" width="618px" style="margin:0 auto">
                <tbody>
                    <tr>
                        <td width="618px"><img
                                src="https://ci4.googleusercontent.com/proxy/RxomVXQLImoJ2H07-ilLAfYone1NSofzK_96nuy9FL2hP_oXZNiDZCFo-iu7Q1lPAPZv_268EpxmZvh9fsPpQzzxcl9i_ukmTdUmdSLjq5xScvecCHo=s0-d-e1-ft#http://cdn.garenanow.com/webmain/static/account_center/email_bg.jpg"
                                alt="" width="618" style="max-width:100%" class="CToWUd" data-bit="iit"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
