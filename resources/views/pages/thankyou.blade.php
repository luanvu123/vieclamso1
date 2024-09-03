<!DOCTYPE html>
<html>

<head>
    <title>Cảm ơn bạn đã mua dịch vụ</title>
</head>

<body>
    <h2>Cảm ơn bạn đã mua dịch vụ!</h2>
    <p>Dưới đây là chi tiết đơn hàng của bạn:</p>
    <p>Vui lòng chờ trong vòng 24h để chúng tôi kiểm tra thông tin</p>
    <p>Mã đơn hàng: {{ $orderId }}</p>
    <p>Số tiền: {{ number_format($amount, 0, ',', '.') }}</p>

</body>

</html>
