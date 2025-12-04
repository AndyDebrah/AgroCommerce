<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2 class="modern-heading">
                Our <span class="highlight-text">products</span>
            </h2>
            <div class="heading-underline"></div>
        </div>
        <div class="row">
            @foreach ($product as $products)
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="product-card">
                    <!-- Product Image -->
                    <div class="product-image-container">
                        <img src="product/{{ $products->image }}" alt="{{ $products->title }}" class="product-image">
                        <div class="image-overlay">
                            <div class="overlay-content">
                                <a href="{{ url('/productDetails', $products->id) }}" class="btn-view-details">
                                    <i class="fas fa-eye"></i>
                                    <span>View Details</span>
                                </a>
                            </div>
                        </div>

                        @if($products->discount != null)
                        <div class="discount-badge">
                            <span>-{{ $products->discount }}%</span>
                        </div>
                        @endif
                    </div>

                    <!-- Product Info -->
                    <div class="product-info">
                        <h5 class="product-title">{{ $products->title }}</h5>

                        <!-- Price Section -->
                        <div class="price-section">
                            @if($products->discount != null)
                            <div class="price-container">
                                <span class="original-price">${{ $products->price }}</span>
                                <span class="discounted-price">
                                    ${{ number_format($products->price * (1 - $products->discount / 100), 2) }}
                                </span>
                            </div>
                            @else
                            <div class="price-container">
                                <span class="current-price">${{ $products->price }}</span>
                            </div>
                            @endif
                        </div>

                        <!-- Add to Cart Form -->
                        <form action="{{ url('/addCart', $products->id) }}" method="POST" class="add-to-cart-form">
                            @csrf
                            <div class="cart-controls">
                                <div class="quantity-container">
                                    <button type="button" class="qty-btn qty-minus">-</button>
                                    <input type="number" name="quantity" value="1" min="1" class="quantity-input" readonly>
                                    <button type="button" class="qty-btn qty-plus">+</button>
                                </div>
                                <button type="submit" class="add-to-cart-btn">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span>Add to Cart</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="pagination-container">
            {!! $product->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</section>

<style>
/* Modern Product Section Styles */
.product_section {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 80px 0;
}

.modern-heading {
    font-size: 2.5rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 1rem;
    position: relative;
}

.highlight-text {
    color: #e74c3c;
    position: relative;
}

.heading-underline {
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, #e74c3c, #3498db);
    margin: 0 auto 3rem;
    border-radius: 2px;
}

.row {
    margin-left: -15px;
    margin-right: -15px;
}

.row > [class*="col-"] {
    padding-left: 15px;
    padding-right: 15px;
    margin-bottom: 30px;
}

.product-card {
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    height: 100%;
    display: flex;
    flex-direction: column;
    width: 100%;
}

.product-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
}

/* Product Image */
.product-image-container {
    position: relative;
    overflow: hidden;
    height: 250px;
    background: #f8f9fa;
}

.product-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.product-card:hover .product-image {
    transform: scale(1.1);
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.product-card:hover .image-overlay {
    opacity: 1;
}

.btn-view-details {
    background: #fff;
    color: #2c3e50;
    padding: 12px 24px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    transform: translateY(20px);
}

.product-card:hover .btn-view-details {
    transform: translateY(0);
}

.btn-view-details:hover {
    background: #e74c3c;
    color: #fff;
    text-decoration: none;
}

/* Discount Badge */
.discount-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background: linear-gradient(135deg, #e74c3c, #c0392b);
    color: #fff;
    padding: 8px 12px;
    border-radius: 20px;
    font-weight: 700;
    font-size: 0.85rem;
    z-index: 2;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
}

/* Product Info */
.product-info {
    padding: 1.5rem;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.product-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 1rem;
    line-height: 1.4;
}

/* Price Section */
.price-section {
    margin-bottom: 1.5rem;
}

.price-container {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
}

.original-price {
    color: #95a5a6;
    text-decoration: line-through;
    font-size: 1rem;
}

.discounted-price {
    color: #e74c3c;
    font-size: 1.25rem;
    font-weight: 700;
}

.current-price {
    color: #2c3e50;
    font-size: 1.25rem;
    font-weight: 700;
}

/* Add to Cart Form */
.add-to-cart-form {
    margin-top: auto;
}

.cart-controls {
    display: flex;
    gap: 12px;
    align-items: center;
}

.quantity-container {
    display: flex;
    align-items: center;
    background: #f8f9fa;
    border-radius: 25px;
    padding: 4px;
}

.qty-btn {
    width: 32px;
    height: 32px;
    border: none;
    background: #2c3e50;
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    font-weight: 600;
}

.qty-btn:hover {
    background: #34495e;
    transform: scale(1.1);
}

.quantity-input {
    border: none;
    background: transparent;
    width: 40px;
    text-align: center;
    font-weight: 600;
    color: #2c3e50;
    margin: 0 8px;
}

.add-to-cart-btn {
    flex: 1;
    background: linear-gradient(135deg, #3498db, #2980b9);
    color: #fff;
    border: none;
    padding: 12px 20px;
    border-radius: 25px;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.add-to-cart-btn:hover {
    background: linear-gradient(135deg, #2980b9, #3498db);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
}

/* Pagination */
.pagination-container {
    display: flex;
    justify-content: center;
    margin-top: 3rem;
}

.pagination-container .pagination {
    gap: 8px;
}

.pagination-container .page-link {
    border-radius: 50px;
    border: 2px solid #e9ecef;
    color: #2c3e50;
    padding: 8px 16px;
    transition: all 0.3s ease;
}

.pagination-container .page-link:hover {
    background: #3498db;
    border-color: #3498db;
    color: #fff;
}

.pagination-container .page-item.active .page-link {
    background: #e74c3c;
    border-color: #e74c3c;
}

/* Responsive Design */
@media (max-width: 768px) {
    .modern-heading {
        font-size: 2rem;
    }

    .product-image-container {
        height: 200px;
    }

    .cart-controls {
        flex-direction: column;
        gap: 10px;
    }

    .quantity-container {
        align-self: stretch;
        justify-content: center;
    }

    .add-to-cart-btn {
        width: 100%;
    }
}

@media (max-width: 576px) {
    .product_section {
        padding: 60px 0;
    }

    .product-info {
        padding: 1rem;
    }

    .modern-heading {
        font-size: 1.75rem;
    }
}
</style>

<script>
// Quantity Controls
document.addEventListener('DOMContentLoaded', function() {
    // Handle quantity buttons
    const quantityContainers = document.querySelectorAll('.quantity-container');

    quantityContainers.forEach(container => {
        const minusBtn = container.querySelector('.qty-minus');
        const plusBtn = container.querySelector('.qty-plus');
        const input = container.querySelector('.quantity-input');

        minusBtn.addEventListener('click', function() {
            let currentValue = parseInt(input.value);
            if (currentValue > 1) {
                input.value = currentValue - 1;
            }
        });

        plusBtn.addEventListener('click', function() {
            let currentValue = parseInt(input.value);
            input.value = currentValue + 1;
        });
    });

    // Add loading state to add to cart buttons
    const addToCartForms = document.querySelectorAll('.add-to-cart-form');

    addToCartForms.forEach(form => {
        form.addEventListener('submit', function() {
            const btn = form.querySelector('.add-to-cart-btn');
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> <span>Adding...</span>';
            btn.disabled = true;

            // Re-enable after 2 seconds (you can adjust this or handle it with actual response)
            setTimeout(() => {
                btn.innerHTML = originalText;
                btn.disabled = false;
            }, 2000);
        });
    });
});
</script>
