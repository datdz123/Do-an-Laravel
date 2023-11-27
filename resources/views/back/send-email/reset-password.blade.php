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
                                                                Xin chào quản trị viên {{ $email_name }},</div>
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
                                                Chọn vào <a href="{{$redirect_uri}}" target="_blank"> liên kết này </a>, để tạo mới mật khẩu. (Lưu ý mã tạo mới mật khẩu này có thời hạn 10 phút!)<br><br>
                                                Đây là Email tự động, vui lòng không phản hồi qua Email này.</p>
                                            <p style="margin:26px 0 3px;font-size:13px;color:#8f8f8f">Trân trọng. <br>
                                            </p>
                                        </td>
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
