
<!DOCTYPE html>
<html>
<head>
    <title>Order Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo {
            max-width: 200px;
            margin-bottom: 20px;
        }
        .invoice-details {
            margin-bottom: 40px;
        }
        .customer-details, .order-details {
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f8f9fa;
        }
        .total {
            text-align: right;
            margin-top: 20px;
            font-weight: bold;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 0.9em;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('home/images/logo.png') }}" alt="Logo" class="logo">
        <h1>Order Invoice</h1>
    </div>

    <div class="invoice-details">
        <p><strong>Invoice Number:</strong> INV-{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</p>
        <p><strong>Date:</strong> {{ $order->created_at->format('d/m/Y') }}</p>
    </div>

    <div class="customer-details">
        <h2>Customer Details</h2>
        <p><strong>Name:</strong> {{ $order->name }}</p>
        <p><strong>Email:</strong> {{ $order->email }}</p>
        <p><strong>Phone:</strong> {{ $order->phone }}</p>
        <p><strong>Address:</strong> {{ $order->address }}</p>
    </div>

    <div class="order-details">
        <h2>Order Details</h2>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $order->productTitle }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>${{ number_format($order->price, 2) }}</td>
                    <td>${{ number_format($order->price * $order->quantity, 2) }}</td>
                </tr>
            </tbody>
        </table>

        <div class="total">
            <p>Subtotal: ${{ number_format($order->price * $order->quantity, 2) }}</p>
            <p>Tax (10%): ${{ number_format(($order->price * $order->quantity) * 0.1, 2) }}</p>
            <h3>Total: ${{ number_format(($order->price * $order->quantity) * 1.1, 2) }}</h3>
        </div>
    </div>

    <div class="payment-delivery">
        <p><strong>Payment Status:</strong> {{ $order->paymentStatus }}</p>
        <p><strong>Delivery Status:</strong> {{ $order->deliveryStatus }}</p>
    </div>

    <div class="footer">
        <p>Thank you for your business!</p>
        <p>For any queries, please contact support@yourecommerce.com</p>
        <p>© {{ date('Y') }} FARMS. All rights reserved.</p>
    </div>
</body>
</html>
