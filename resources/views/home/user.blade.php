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


   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header');
<!-- end header section -->
         <!-- slider section -->
         @include('home.slider');
<!-- end slider section -->
      </div>
      <!-- why section -->
      @include('home.shop');
<!-- end why section -->

      <!-- arrival section -->
      @include('home.arrive');
<!-- end arrival section -->

      <!-- product section -->

      <!-- end product section -->
      @include('home.product');


      {{-- comment section --}}

            {{-- <div class="container">
    <h1 class="text-center">Comments</h1>
    <form action="{{ url('addcomment') }}" method="POST">
        @csrf
        {{-- <input type="hidden" name="product_id" value="{{ $product->id }}"> --}}
        {{-- <div class="form-group">
            <label for="comment">Leave a comment:</label>
            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form> --}}

    {{-- <h2 class="mt-4">Comments:</h2> --}}
    {{-- @foreach($comments as $comment)
        <div class="card mb-3">
            <div class="card-body">
                <p>{{ $comment->comment }}</p>
                <small>Posted on: {{ $comment->created_at }}</small>
            </div>
        </div>
    @endforeach --}}
</div>

            {{-- end reply section --}}
        <!-- end product section -->


    @include('home.chat');


      <!-- subscribe section -->
      {{-- @include('home.subscribe'); --}}
      <!-- end subscribe section -->
      <!-- client section -->
      {{-- @include('home.client'); --}}
<!-- end client section -->
      <!-- footer start -->
      @include('home.footer');
<!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© Created by <a href="#">Andy Debrah</a><br>

            <a href="#" target="_blank"></a>

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
