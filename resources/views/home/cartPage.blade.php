

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

    .hero_area {
           margin-bottom: 0; /* Remove extra spacing below the header */
           padding-bottom: 0;
        }

        .hero_area + div {
           padding-top: 10px; /* Add spacing between the header and the table */
        }

        table {
           width: 80%;
           margin: 30px auto;
           border-collapse: collapse;
           padding-top: 10px;
           text-align: left;
        }
        th, td {
           border: 1px solid #ddd;
           padding: 10px;
        }
        th {
           background-color: #f4f4f4;
           font-weight: bold;
        }
        tr:nth-child(even) {
           background-color: #f9f9f9;
        }
        tr:hover {
           background-color: #f1f1f1;
        }
        img {
           max-width: 100px;
           height: auto;
        }
        .btn-danger {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
            padding: 5px 10px;
            text-decoration: none;
         }
         .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
         }
         .alert-success {
            max-width: 50%; /* Limit the width of the alert box */
            margin: 10px auto; /* Center the alert box and add spacing */
            padding: 10px; /* Reduce padding inside the alert box */
            font-size: 14px; /* Adjust font size for a smaller appearance */
            text-align: center; /* Center the text inside the alert box */
         }
         .alert-success .close {
            font-size: 25px; /* Adjust the size of the close button */
         }
      </style>
   </head>
   <body>


      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header');

         @if (session('message'))
         <div class="alert alert-success">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
             <strong>Success!</strong>
             {{ session('message') }}
         </div>

      @endif



      <div>



        <table>

            <tr>

                <th>Product title</th>
                <th>Product quantity</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>


            </tr>

            <?php $totalPrice = 0; ?>

            <!-- Loop through the cart items and display them in the table -->
            <!-- Assuming $cart is an array of cart items passed from the controller -->

            @foreach ($cart as  $item)

            <tr>
                <td>
                    {{ $item->productTitle}}
                </td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->price }}</td>
                <td><img src="/product/{{ $item->image  }}" alt="" style="width 100px; height: :auto;"></td>
                <td><a href="{{ url('/removeCart', $item->id) }}" class="btn btn-danger">Remove</a></td> <!-- Add an action button -->
            </tr>
            <?php $totalPrice += $item->price; ?>
            @endforeach


        </table>

        <div style="text-align: center; margin-top: 20px;">
            <h2>Total Price: {{ $totalPrice }}</h2>


    </div>
        <div style="text-align: center; margin-top: 20px;">
            <h2>Proceed to Payment</h2>
        </div>

        <div style="text-align: center; margin-top: 20px;padding-bottom: 15px;">
            <a href="{{ url('/cashDelivery') }}" class="btn btn-success">Cash on Delivery</a>
            <a href="{{ url('/stripe',$totalPrice ) }}" class="btn btn-success">Pay with Card</a>
        </div>


<!-- end header section -->
         <!-- slider section -->




      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
