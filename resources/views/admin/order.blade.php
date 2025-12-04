<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Orders</title>
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
    <link rel="shortcut icon" href="admin/assets/images/favicon.png"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


   <style>
    /* Table Title Styling */
    .titleDeg {
        text-align: center;
        font-size: 2rem;
        font-weight: 600;
        padding: 25px 0;
        margin-bottom: 30px;
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-bottom: 2px solid rgba(255, 255, 255, 0.1);
    }

    /* Main Table Styling */
    .table-responsive {
        margin: 20px auto;
        width: 95%;
        background: rgba(255, 255, 255, 0.03);
        border-radius: 15px;
        box-shadow: 0 0 40px rgba(0, 0, 0, 0.2);
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .tableDeg {
        width: 100%;
        min-width: 1200px;
        background: transparent;
        border-collapse: separate;
        border-spacing: 0;
    }

    /* Table Header Styling */
    .tableDeg th {
        background: linear-gradient(45deg, #1a75ff, #0056b3);
        color: white;
        font-weight: 500;
        padding: 15px;
        text-transform: uppercase;
        font-size: 0.9rem;
        letter-spacing: 0.5px;
        border: none;
        position: sticky;
        top: 0;
        z-index: 10;
    }

    /* Table Body Styling */
    .tableDeg td {
        padding: 12px 15px;
        text-align: center;
        vertical-align: middle;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        font-size: 0.9rem;
        color: #fff;
    }

    .tableDeg tbody tr {
        transition: all 0.3s ease;
    }

    .tableDeg tbody tr:hover {
        background: rgba(255, 255, 255, 0.05);
        transform: translateY(-2px);
    }

    /* Image Styling */
    .imgSize {
        width: 80px;
        height: 60px;
        border-radius: 8px;
        object-fit: cover;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease;
    }

    .imgSize:hover {
        transform: scale(1.15);
    }

    /* Button Styling */
    .btn {
        padding: 8px 15px;
        border-radius: 8px;
        font-weight: 500;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        margin: 3px;
        border: none;
    }

    /* Print Button */
    .print-btn {
        background: linear-gradient(45deg, #2196F3, #0D47A1);
        box-shadow: 0 4px 15px rgba(33, 150, 243, 0.3);
    }

    .print-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(33, 150, 243, 0.4);
    }

    /* Email Button */
    .email-btn {
        background: linear-gradient(45deg, #00BCD4, #006064);
        box-shadow: 0 4px 15px rgba(0, 188, 212, 0.3);
    }

    .email-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 188, 212, 0.4);
    }

    /* Delivered Button */
    .btn-success {
        background: linear-gradient(45deg, #4CAF50, #2E7D32);
        box-shadow: 0 4px 15px rgba(76, 175, 80, 0.3);
    }

    .btn-success:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(76, 175, 80, 0.4);
    }

    /* Icons in Buttons */
    .btn i {
        transition: all 0.3s ease;
        margin-right: 5px;
    }

    .btn:hover i {
        transform: scale(1.2);
    }

    /* Status Text */
    .delivered-text {
        color: #4CAF50;
        font-weight: 500;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .table-responsive {
            width: 100%;
            margin: 10px 0;
        }

        .titleDeg {
            font-size: 1.5rem;
            padding: 15px 0;
        }
    }

    /* Custom Scrollbar */
    .table-responsive::-webkit-scrollbar {
        height: 8px;
    }

    .table-responsive::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 4px;
    }

    .table-responsive::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.3);
        border-radius: 4px;
    }

    .table-responsive::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.4);
    }
    /* Add this to your existing <style> section */
/* Replace the existing alert styles with these */
.alert {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 20px;
    margin: 20px;
    border: none;
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    max-width: calc(100% - 40px);
    position: relative;
}

.alert-content {
    flex-grow: 1;
    margin-right: 40px; /* Space for close button */
}

.alert .close {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    padding: 0;
    background: transparent;
    border: 0;
    font-size: 1.25rem;
    font-weight: 700;
    line-height: 1;
    color: white;
    text-shadow: 0 1px 0 #000;
    opacity: .75;
    cursor: pointer;
}

.alert .close:hover {
    opacity: 1;
}

.alert-success {
    background: linear-gradient(45deg, #28a745, #218838);
    color: white;
}

.alert-danger {
    background: linear-gradient(45deg, #dc3545, #c82333);
    color: white;
}
/* Add this to your existing <style> section */
.search-container {
    max-width: 600px;
    margin: 20px auto;
    position: relative;
}

.search-input {
    width: 100%;
    padding: 15px 20px 15px 45px;
    background: rgba(255, 255, 255, 0.1);
    border: 2px solid rgba(255, 255, 255, 0.1);
    border-radius: 50px;
    color: #fff;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.search-input:focus {
    outline: none;
    background: rgba(255, 255, 255, 0.15);
    border-color: #0090e7;
    box-shadow: 0 0 20px rgba(0, 144, 231, 0.2);
}

.search-input::placeholder {
    color: rgba(255, 255, 255, 0.6);
}

.search-icon {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: rgba(255, 255, 255, 0.6);
    transition: all 0.3s ease;
}

.search-container:focus-within .search-icon {
    color: #0090e7;
}
.no-results {
    display: none;
    text-align: center;
    padding: 20px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 8px;
    margin: 20px auto;
    max-width: 600px;
    color: #dc3545;
    border: 1px solid rgba(220, 53, 69, 0.2);
    animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

<script>
function searchTable() {
    const input = document.getElementById('searchInput');
    const filter = input.value.toLowerCase();
    const table = document.querySelector('.tableDeg');
    const rows = table.getElementsByTagName('tr');
    const noResults = document.getElementById('noResults');
    let matchFound = false;

    // Skip the header row by starting at index 1
    for (let i = 1; i < rows.length; i++) {
        const nameCol = rows[i].getElementsByTagName('td')[0];
        const emailCol = rows[i].getElementsByTagName('td')[1];

        if (nameCol && emailCol) {
            const name = nameCol.textContent || nameCol.innerText;
            const email = emailCol.textContent || emailCol.innerText;

            if (name.toLowerCase().includes(filter) ||
                email.toLowerCase().includes(filter)) {
                rows[i].style.display = '';
                matchFound = true;  // Set matchFound to true when a match is found
            } else {
                rows[i].style.display = 'none';
            }
        }
    }

    // Only show "No Results" if there's a search term and no matches
    if (filter && !matchFound) {
        noResults.style.display = 'block';
        table.style.display = 'none';
    } else {
        noResults.style.display = 'none';
        table.style.display = 'table';
    }
}


// Add animation when search input is focused
document.getElementById('searchInput').addEventListener('focus', function() {
    this.parentElement.style.transform = 'scale(1.02)';
});

document.getElementById('searchInput').addEventListener('blur', function() {
    this.parentElement.style.transform = 'scale(1)';
});
</script>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar');

    <!-- partial -->
    <!-- partial:partials/_navbar.html -->
    @include('admin.nav');
    <div class="main-panel">
        <div class="content-wrapper">
@if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <div class="alert-content">
            <strong>Success!</strong> {{ session('message') }}
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <div class="alert-content">
            <strong>Error!</strong> {{ session('error') }}
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

            <h1 class="titleDeg">All Orders</h1>

            <div class="search-container">
    <i class="fas fa-search search-icon"></i>
    <input
        type="text"
        id="searchInput"
        class="search-input"
        placeholder="Search orders by name or email..."
        onkeyup="searchTable()"
    >
</div>

<div id="noResults" class="no-results">
    <i class="fas fa-exclamation-circle"></i>
    No matching records found
</div>

            <div class="table-responsive">
                <table class="tableDeg table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Product Title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Payment Status</th>
                        <th>Delivery Status</th>
                        <th>Delivered</th>
                        <th>Download PDF</th>
                        <th>Send Email</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->productTitle }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->price }}</td>
                            <td>
                                <img class="imgSize" src="{{ asset('product/'.$item->image) }}" alt="Product image">
                            </td>
                            <td>{{ $item->paymentStatus }}</td>
                            <td>{{ $item->deliveryStatus }}</td>
                            <td>
                                @if($item->deliveryStatus == 'Processing')
                             <a href="{{ url('delivered', $item->id) }}" class="btn btn-success">Delivered</a>
                                @else
                                     <p class="delivered-text">Delivered</p>
                                    @endif

                                <!-- to check the delivery status , after clicing on the delivered button the status should change to -->
                                </td>
                                <td>
                        <a href="{{ url('printPdf', $item->id) }}" class="btn btn-primary print-btn" title="Download PDF">
                         <i class="fas fa-print fa-lg"></i>
                         </a>
                        </td>
                        <td>
                        <a href="{{ url('sendEmail', $item->id) }}" class="btn btn-info email-btn" title="Send Email">
                     <i class="fas fa-envelope fa-lg"></i>
                    </a>
                    </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!-- partial -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
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


</body>
</html>
