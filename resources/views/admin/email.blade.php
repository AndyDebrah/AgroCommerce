<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .order-details {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .total {
            text-align: right;
            font-size: 18px;
            margin-top: 20px;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Order Confirmation</h1>
        </div>

        <p>Dear {{ $order->name }},</p>
        <p>Thank you for your order. Here are your order details:</p>

        <div class="order-details">
            <h3>Order Information</h3>
            <p><strong>Order ID:</strong> #{{ $order->id }}</p>
            <p><strong>Date:</strong> {{ $order->created_at->format('F d, Y') }}</p>
            <p><strong>Product:</strong> {{ $order->productTitle }}</p>
            <p><strong>Quantity:</strong> {{ $order->quantity }}</p>
            <p><strong>Price:</strong> ${{ number_format($order->price, 2) }}</p>
            <p><strong>Status:</strong> {{ $order->deliveryStatus }}</p>

            <div class="total">
                <strong>Total Amount: ${{ number_format($order->price * $order->quantity, 2) }}</strong>
            </div>
        </div>

        <p>Your order will be shipped to:</p>
        <p>{{ $order->address }}</p>

        <div class="footer">
            <p>If you have any questions about your order, please contact our customer service.</p>
            <p>Thank you for shopping with us!</p>
        </div>
    </div>
</body>
</html>
