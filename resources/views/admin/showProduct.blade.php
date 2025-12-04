<!DOCTYPE html>
<html lang="en">
  <head>
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
        .show{
            margin:auto;
            width:40px;
            border: 2px solid white;
            text-align: center;
            margin-top: 30px;
        }
        .text{
            text-align: center;
        }
        th{
            padding: 5px;
            background: #4CAF50;
            color: white;
        }

        .imgSize{
            width: 100px;
            height: 100px;
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

                <h2 class="text">All Product</h2>

                <div>

                    <table class="show">


                        <tr>
                            <th>Product title</th>
                            <th>description</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Edit</th>
                            <th>Delete</th>


                        </tr>

                        @foreach ($products as $product)

                        <tr>
                            <td> {{ $product->title }} </td>
                            <td> {{ $product->description}} </td>
                            <td> <img class="imgSize" src="/product/{{ $product->image }}" alt=""> </td>
                            <td>{{ $product->category}} </td>
                            <td>{{ $product->quantity}} </td>
                            <td>{{ $product->price}} </td>
                            <td>{{ $product->discount}} </td>
                            <td> <a href="{{ url('editProduct' , $product->id) }}" class=" btn btn-primary">Edit</a>   </td>
                            <td>
                                <a href="{{ url('deleteProduct', $product->id) }}" class="btn btn-danger" onclick="return confirm('Do you really want to delete this')"  >Delete</a>
                            </td>



                        </tr>

                        @endforeach
                    </table>
                </div>

            </div>
        </div>

  <!-- content-wrapper ends -->
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
