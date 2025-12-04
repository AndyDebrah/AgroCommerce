<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Update your search form styles in header.blade.php -->
<style>
    .search-form .input-group {
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        background: #fff;
    }
    .search-form .form-control {
        border-radius: 25px 0 0 25px !important;
        border: none;
        box-shadow: none;
        height: 40px;
        font-size: 1rem;
    }
    .search-form .form-control:focus {
        box-shadow: none;
        border: none;
    }
    .search-form .input-group-append .search-btn {
        border-radius: 0 25px 25px 0 !important;
        border: none;
        background: #007bff;
        color: #fff;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0 18px;
        font-size: 1.1rem;
        transition: background 0.2s;
    }
    .search-form .input-group-append .search-btn:hover {
        background: #0056b3;
    }
    .search-form .input-group-append {
        margin-left: 0;
    }
    .interactive-search {
    position: relative;
    width: 44px;
    transition: width 0.4s cubic-bezier(.4,0,.2,1);
    background: #fff;
    border-radius: 25px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    margin-right: 15px;
}
.interactive-search.expanded {
    width: 220px;
}
.interactive-search .form-control {
    border: none;
    box-shadow: none;
    height: 40px;
    font-size: 1rem;
    border-radius: 25px 0 0 25px;
    width: 0;
    padding: 0;
    opacity: 0;
    transition: width 0.4s, opacity 0.3s, padding 0.3s;
    background: transparent;
}
.interactive-search.expanded .form-control {
    width: 140px;
    padding: 0 12px;
    opacity: 1;
    background: #fff;
}
.interactive-search .search-btn {
    border-radius: 50%;
    border: none;
    background: #007bff;
    color: #fff;
    height: 40px;
    width: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
    transition: background 0.2s;
    position: absolute;
    right: 2px;
    top: 2px;
    z-index: 2;
}
.interactive-search .search-btn:hover, .interactive-search.expanded .search-btn {
    background: #0056b3;
}
@media (max-width: 600px) {
    .interactive-search.expanded { width: 100%; }
    .interactive-search .form-control { font-size: 0.95rem; }
}
</style>
</head>
<body>
    <header class="header_section">
        <div class="container">
            <nav class="navbar navbar-expand-lg custom_nav-container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img width="250" src="home/images/AgroT1.png" alt="#" class="logo-img" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto align-items-center">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('/') }}">
                                <i class="fas fa-home"></i> Home
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-list"></i> Pages
                            </a>
                            <div class="dropdown-menu animate slideIn" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="about.html"><i class="fas fa-info-circle"></i> About</a>
                                <a class="dropdown-item" href="testimonial.html"><i class="fas fa-quote-left"></i> Testimonial</a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="product.html">
                                <i class="fas fa-shopping-bag"></i> Products
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="blog_list.html">
                                <i class="fas fa-blog"></i> Blog
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-envelope"></i> Contact
                            </a>
                        </li>

                        <!-- Cart Icon with Badge -->
<li class="nav-item">
    <a class="nav-link position-relative" href="{{ url('cartPage') }}">
        <i class="fas fa-shopping-cart fa-lg"></i>
        <span class="cart-badge" style="display: none;">0</span>
    </a>
</li>

                    <li class="nav-item">
                            <a class="nav-link" href="{{ url('orderPro') }}">
                                <i class="fas fa-truck"></i>Order
                            </a>
                        </li>



                        <!-- Search Form -->
                        <li class="nav-item">
    <form class="interactive-search" id="searchForm" action="{{ url('/search') }}" method="GET" autocomplete="off">
        <input type="text" name="query" class="form-control" placeholder="Search..." aria-label="Search">
        <button class="btn search-btn" type="submit">
            <i class="fas fa-search"></i>
        </button>
    </form>
</li>

                        <!-- Authentication Links -->
                        @if (Route::has('login'))
                            @auth
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="btn btn-outline-primary login-btn mx-2" href="{{ route('login') }}">
                                        <i class="fas fa-sign-in-alt"></i> Login
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-primary register-btn" href="{{ route('register') }}">
                                        <i class="fas fa-user-plus"></i> Register
                                    </a>
                                </li>
                            @endauth
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <!-- Add these script tags just before closing body tag -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        .header_section {
            background-color: #fff;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
            padding: 10px 0;
        }

        .navbar-nav .nav-item {
            margin: 0 5px;
        }

        .nav-link {
            color: #333 !important;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            color: #007bff !important;
            transform: translateY(-2px);
        }

        .cart-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: #dc3545;
            color: white;
            border-radius: 50%;
            padding: 0.25em 0.6em;
            font-size: 0.75em;
            animation: pulse 1.5s infinite;
        }

        .search-form {
            margin-right: 15px;
        }

        .search-form .form-control {
            border-radius: 20px 0 0 20px;
        }

        .search-btn {
            border-radius: 0 20px 20px 0 !important;
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .dropdown-item {
            padding: 8px 20px;
            transition: all 0.3s ease;
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
            color: #007bff;
            padding-left: 25px;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }

        @media (max-width: 991px) {
            .navbar-nav {
                padding: 20px 0;
            }

            .nav-item {
                margin: 10px 0;
            }

            .search-form {
                margin: 15px 0;
                width: 100%;
            }
        }
    </style>

    <script>
        $(document).ready(function() {
            // Initialize all dropdowns
            $('.dropdown-toggle').dropdown();

            // Add scroll effect
            $(window).scroll(function() {
                if ($(window).scrollTop() > 50) {
                    $('.header_section').addClass('scrolled');
                } else {
                    $('.header_section').removeClass('scrolled');
                }
            });
        });
    </script>
    <script>
    function updateCartCount() {
        $.get('/get-cart-count', function(response) {
            const badge = $('.cart-badge');
            if(response.count > 0) {
                badge.text(response.count).show();
            } else {
                badge.hide();
            }
        });
    }

    // Update cart count when page loads
    $(document).ready(function() {
        updateCartCount();
    });

    // Listen for cart updates
    document.addEventListener('cartUpdated', function() {
        updateCartCount();
    });
    document.addEventListener('DOMContentLoaded', function() {
    const searchForm = document.getElementById('searchForm');
    const input = searchForm.querySelector('.form-control');
    const btn = searchForm.querySelector('.search-btn');

    // Expand on hover or focus
    searchForm.addEventListener('mouseenter', () => searchForm.classList.add('expanded'));
    searchForm.addEventListener('mouseleave', () => {
        if (!input.matches(':focus')) searchForm.classList.remove('expanded');
    });
    input.addEventListener('focus', () => searchForm.classList.add('expanded'));
    input.addEventListener('blur', () => {
        setTimeout(() => { // Delay to allow click on button
            if (!searchForm.matches(':hover')) searchForm.classList.remove('expanded');
        }, 150);
    });

    // Optional: Expand when clicking the search icon
    btn.addEventListener('click', function(e) {
        if (!searchForm.classList.contains('expanded')) {
            e.preventDefault();
            searchForm.classList.add('expanded');
            input.focus();
        }
    });
});
</script>
</body>
</html>
