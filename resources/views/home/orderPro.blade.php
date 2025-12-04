<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <style>
         /* Modern Table Styling */
         table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-width: 600px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            border-radius: 10px;
            overflow: hidden;
         }

         table thead tr {
            background-color: #4a6fdc;
            color: #ffffff;
            text-align: left;
            font-weight: bold;
         }

         table th,
         table td {
            padding: 15px 18px;
            vertical-align: middle;
         }

         table tbody tr {
            border-bottom: 1px solid #dddddd;
            transition: all 0.3s ease;
         }

         table tbody tr:nth-of-type(even) {
            background-color: #f8f9fa;
         }

         table tbody tr:last-of-type {
            border-bottom: 2px solid #4a6fdc;
         }

         table tbody tr:hover {
            background-color: #f1f3ff;
            transform: scale(1.005);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
         }

         table tbody tr.active-row {
            font-weight: bold;
            color: #4a6fdc;
         }

         /* Image styling */
         table img {
            border-radius: 4px;
            object-fit: cover;
            transition: transform 0.3s ease;
         }

         table img:hover {
            transform: scale(1.1);
         }

         /* Button styling */
         .btn-danger {
            background-color: #ff4757;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            color: white;
            font-weight: 500;
            transition: all 0.3s ease;
            cursor: pointer;
         }

         .btn-danger:hover {
            background-color: #ff6b81;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(255, 71, 87, 0.3);
         }

         /* Status styling */
         p[style*="color: green"] {
            color: #2ed573 !important;
            font-weight: 500;
            padding: 6px 12px;
            background-color: rgba(46, 213, 115, 0.1);
            border-radius: 4px;
            display: inline-block;
         }

         /* Responsive table */
         @media (max-width: 768px) {
            table {
               display: block;
               overflow-x: auto;
               white-space: nowrap;
            }
         }

         /* Animation */
         @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
         }

         table tbody tr {
            animation: fadeIn 0.5s ease forwards;
            opacity: 0;
         }

         table tbody tr:nth-child(1) { animation-delay: 0.1s; }
         table tbody tr:nth-child(2) { animation-delay: 0.2s; }
         table tbody tr:nth-child(3) { animation-delay: 0.3s; }
         table tbody tr:nth-child(4) { animation-delay: 0.4s; }
         table tbody tr:nth-child(5) { animation-delay: 0.5s; }
         table tbody tr:nth-child(n+6) { animation-delay: 0.6s; }

         /* Modal Styling */
         .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
         }

         .modal-overlay.active {
            opacity: 1;
            visibility: visible;
         }

         .modal-content {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            max-width: 500px;
            width: 90%;
            transform: translateY(-20px);
            transition: all 0.3s ease;
         }

         .modal-overlay.active .modal-content {
            transform: translateY(0);
         }

         .modal-header {
            margin-bottom: 20px;
         }

         .modal-header h3 {
            margin: 0;
            color: #333;
            font-size: 1.5rem;
         }

         .modal-body {
            margin-bottom: 25px;
            color: #555;
            line-height: 1.5;
         }

         .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
         }

         .modal-btn {
            padding: 8px 20px;
            border-radius: 4px;
            border: none;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
         }

         .modal-btn-cancel {
            background-color: #f1f1f1;
            color: #333;
         }

         .modal-btn-cancel:hover {
            background-color: #e0e0e0;
         }

         .modal-btn-confirm {
            background-color: #ff4757;
            color: white;
         }

         .modal-btn-confirm:hover {
            background-color: #e84118;
         }
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->

         <table>
            <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Payment Status</th>
                    <th>Delivery Status</th>
                    <th>Image</th>
                    <th>Action</th>
            </tr>
            @foreach ($orders as $order)
            <tr>
                <td>
                    {{ $order->productTitle }}
                </td>
                <td>
                    {{ $order->quantity }}
                </td>
                <td>
                    {{ $order->price }}
                </td>
                <td>
                    {{ $order->paymentStatus}}
                </td>
                <td>
                    {{ $order->deliveryStatus }}
                </td>
                <td>
                    <img src="/product/{{ $order->image }}" alt="" style="width: 100px; height: 100px;">
                </td>
                <td>
                    @if ($order->deliveryStatus == 'Processing')
                        <button onclick="showCancelConfirmation('{{ url('cancelOrder', $order->id) }}', '{{ $order->productTitle }}')" class="btn btn-danger">Cancel Order</button>
                    @else
                        <p style="color: green;">Delivered</p>
                    @endif
                </td>
            </tr>
             @endforeach
         </table>
      </div>

      <!-- Confirmation Modal -->
      <div class="modal-overlay" id="cancelModal">
         <div class="modal-content">
            <div class="modal-header">
               <h3>Confirm Cancellation</h3>
            </div>
            <div class="modal-body">
               <p>Are you sure you want to cancel your order for <strong id="productName"></strong>?</p>
               <p>This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
               <button class="modal-btn modal-btn-cancel" onclick="hideCancelConfirmation()">Go Back</button>
               <a id="confirmCancelBtn" class="modal-btn modal-btn-confirm">Yes, Cancel Order</a>
            </div>
         </div>
      </div>

      <!-- why section -->
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>

      <script>
         // Cancel Order Confirmation Modal
         function showCancelConfirmation(url, productName) {
            const modal = document.getElementById('cancelModal');
            const productNameElement = document.getElementById('productName');
            const confirmBtn = document.getElementById('confirmCancelBtn');

            productNameElement.textContent = productName;
            confirmBtn.href = url;

            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
         }

         function hideCancelConfirmation() {
            const modal = document.getElementById('cancelModal');
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
         }

         // Close modal when clicking outside
         document.getElementById('cancelModal').addEventListener('click', function(e) {
            if (e.target === this) {
               hideCancelConfirmation();
            }
         });

         // Close modal with Escape key
         document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
               hideCancelConfirmation();
            }
         });
      </script>
   </body>
</html>
