

<!-- filepath: d:\xamp\htdocs\Ecom\resources\views\home\searchResults.blade.php -->
@extends('layouts.app')

@section('content')
<style>
.search-results-section {
    padding: 60px 0 40px 0;
    background: linear-gradient(120deg, #f5f7fa 60%, #e9eefd 100%);
    min-height: 60vh;
}
.search-results-section .heading {
    font-size: 2rem;
    font-weight: 700;
    color: #3546a6;
    margin-bottom: 24px;
    text-align: center;
}
.search-results-section .product-card {
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 4px 24px rgba(76,110,220,0.12);
    padding: 20px 18px 16px 18px;
    margin-bottom: 28px;
    display: flex;
    align-items: flex-start;
    gap: 18px;
    transition: transform 0.18s, box-shadow 0.18s;
    position: relative;
    cursor: pointer;
    border: 1.5px solid transparent;
}
.search-results-section .product-card:hover {
    transform: translateY(-4px) scale(1.02);
    box-shadow: 0 8px 32px rgba(76,110,220,0.13);
    border: 1.5px solid #4a6fdc;
    background: #f0f4ff;
}
.search-results-section .product-img {
    width: 90px;
    height: 90px;
    border-radius: 10px;
    object-fit: cover;
    background: #f8f9fa;
    transition: transform 0.2s;
}
.search-results-section .product-card:hover .product-img {
    transform: scale(1.07) rotate(-2deg);
}
.search-results-section .product-info h5 {
    font-size: 1.1rem;
    font-weight: 600;
    color: #22223b;
    margin-bottom: 6px;
}
.search-results-section .product-info .price {
    color: #4a6fdc;
    font-weight: 700;
    font-size: 1.05rem;
    margin-bottom: 6px;
}
@media (max-width: 991px) {
    .search-results-section .product-card { flex-direction: column; align-items: stretch; }
    .search-results-section .product-img { width: 100%; height: 180px; }
}
</style>

<section class="search-results-section">
    <div class="container">
        <div class="heading">
            Search Results for: <span style="color:#4a6fdc;">"{{ request('query') }}"</span>
        </div>
        <div class="row">
            @if(isset($products) && count($products))
                @foreach($products as $product)
                    <div class="col-md-6 col-lg-4">
                        <div class="product-card">
                            <img src="{{ asset('product/'.$product->image) }}" alt="{{ $product->title }}" class="product-img">
                            <div class="product-info">
                                <h5>{{ $product->title }}</h5>
                                <div class="price">₦{{ number_format($product->price, 2) }}</div>
                                <p>{{ \Illuminate\Support\Str::limit($product->description, 80) }}</p>
                                <a href="{{ url('productDetails', $product->id) }}" class="btn btn-sm btn-primary mt-2">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
           @else
                <div class="col-12">
                    <p style="color:#888; font-size:1.1rem; text-align:center;">No products found matching your search.</p>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
