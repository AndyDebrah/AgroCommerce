

<!DOCTYPE html>
<html>
   <head>

    <base href="/public">
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
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header');

<!-- end header section -->
         <!-- slider section -->

         <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; padding: 30px; width: 50px;">

               <div class="img-box" style="padding: 20px;">
                    <img src="product/{{ $product->image }}" alt="">
               </div>
               <div class="detail-box">
                  <h5>
                       {{ $product->title }}
                  </h6>

                  @if ( $product->discount != null )


                  <h5 style="color: red;">
                       Discount <br>
                      % {{ $product->discount }}
              </h6>

              <h6>
               <span style="text-decoration: line-through; color: rgb(75, 75, 200);">
                   price <br>
                   ${{ $product->price }}
               </span>
          </h6>
          @else
          <h6>
           <span style="color: rgb(75, 75, 200);">
               price <br>
               ${{ $product->price }}
           </span>
      </h6>
              @endif

              <h6>

                Category: {{ $product->category }}

              </h6>

              <h6>

             Availabble Quantity: {{ $product->quantity }}
              </h6>


              <h6>

                Product Description: {{ $product->description }}
              </h6>

<form id="addToCartForm" class="product-form" action="{{ url('add_cart', $product->id) }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" value="1" min="1" max="{{ $product->quantity }}"
               class="quantity-input">
    </div>
    <button type="submit" class="btn btn-primary add-to-cart-btn">
        <i class="fa fa-shopping-cart"></i> Add to Cart
    </button>
</form>
               </div>
            </div>
         </div>






<!-- end client section -->
      <!-- footer start -->
      @include('home.footer');
<!-- footer end -->
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
      <script src="home/js/sweetalert2.all.min.js"></script>
<script>
$(document).ready(function() {
    $('#addToCartForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: $(this).serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if(response.success) {
                    // Trigger cart update
                    document.dispatchEvent(new Event('cartUpdated'));

                    // Show success message using your existing styling
                    alert('Product Added Successfully');

                    // Optionally refresh the page
                    // location.reload();
                }
            },
            error: function() {
                alert('Error adding product to cart');
            }
        });
    });
});
</script>

   </body>
</html>
