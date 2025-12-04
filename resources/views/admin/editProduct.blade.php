<!DOCTYPE html>
<html lang="en">
  <head>

    <base href="/public">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
    <style>

        .add{
             text-align: center;
             padding-top: 40px;

         }

         label {
             display: inline-block;
             padding: 5px;
         }
         .imgSize{
             width: 100px;
             height: 100px;
             margin:auto;
             display: block;

         }


     </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar');

      <!-- partial -->
        <!-- partial:partials/_navbar.html -->
        @include('admin.nav');


        <!-- partial -->

  <!-- content-wrapper ends -->

  <div class="main-panel">
    <div class="content-wrapper">

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

            <div class="add">

                <h2> ADD Product here </h2>

                <form action="{{ url('/updateProduct', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div>
                    <label for="title">Title</label>
                    <input type="text" name="title" value="{{ $product->title }}"><br>
                </div>
                <div>
                    <label for="">Description</label>
                    <textarea name="description" id=""  >{{ $product->description}} </textarea><br>
                </div>

                <div>
                    <label for="">Image</label>
                    <input type="file" name="image"  ><br>
                </div>

                    <div>
                    <label for="">Current Product image</label>
                    <img class="imgSize" src="/product/{{ $product->image }}" alt=""><br>
                </div>

                    <div>
                    <label for="">Category</label>
                        <select name="category" id=""  >
                            <option value="{{ $product->category}}" selected="">{{ $product->category}}</option>

                            @foreach($categories as $category)

                            <option value="{{ $category->CategoryName  }}"> {{ $category->CategoryName  }} </option>
                            @endforeach
                        </select>
                </div>

                <div>
                    <label for="">Quantity</label>
                    <input type="number" name="quantity" min="0" value="{{$product->quantity}}"><br>
                </div>

                <div>
                    <label for="">Price</label>
                    <input type="number" name="price" value="{{ $product->price}}" ><br>
                </div>
                    <div>
                    <label for="">Discount</label>
                    <input type="number" name="discount" value="{{ $product->discount}}"><br>
                </div>

                <div>
                    <input type="submit"  value="Update" class=" btn btn-primary">
                </div>

                </form>
            </div>
        </div>

    </div>
  </div>
          <!-- partial:partials/_footer.html -->
          @include('admin.footer');
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/settings.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
