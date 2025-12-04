<!-- filepath: d:\xamp\htdocs\Ecom\resources\views\home\arrive.blade.php -->
<style>
.arrival_section {
    background: linear-gradient(120deg, #f5f7fa 60%, #e9eefd 100%);
    padding: 60px 0 40px 0;
}
.arrival_section .box {
    background: #fff;
    border-radius: 22px;
    box-shadow: 0 8px 32px rgba(76,110,220,0.13);
    padding: 40px 32px 36px 32px;
    margin-bottom: 24px;
    position: relative;
    overflow: hidden;
}
.arrival_bg_box img {
    position: absolute;
    top: 0; left: 0; width: 100%; height: 100%;
    object-fit: cover;
    opacity: 0.22; /* Make background image more visible */
    z-index: 1;
    filter: blur(1.5px) brightness(0.85);
}
.arrival_section .heading_container h2 {
    font-size: 2.2rem;
    font-weight: 800;
    color: #3546a6;
    margin-bottom: 18px;
    letter-spacing: 1px;
}
.arrival_section .heading_container p {
    font-size: 1.08rem;
    color: #4a6fdc;
    margin-bottom: 0;
}
.arrival_section .row.products-row {
    position: relative;
    z-index: 2;
}
.arrival_section .product-card {
    background: rgba(255,255,255,0.98);
    border-radius: 18px;
    box-shadow: 0 4px 24px rgba(76,110,220,0.14);
    padding: 28px 20px 22px 20px;
    margin-bottom: 32px;
    display: flex;
    align-items: flex-start;
    gap: 18px;
    transition: transform 0.22s, box-shadow 0.22s, border 0.22s;
    position: relative;
    z-index: 2;
    cursor: pointer;
    border: 2px solid #e9eefd;
    min-height: 160px;
}
.arrival_section .product-card:hover {
    transform: translateY(-8px) scale(1.03);
    box-shadow: 0 12px 36px rgba(76,110,220,0.19);
    border: 2px solid #4a6fdc;
    background: #f0f4ff;
}
.arrival_section .product-img {
    width: 100px;
    height: 100px;
    border-radius: 14px;
    object-fit: cover;
    box-shadow: 0 2px 12px 0 rgba(76,110,220,0.13);
    background: #f8f9fa;
    transition: transform 0.22s;
    border: 2px solid #e9eefd;
}
.arrival_section .product-card:hover .product-img {
    transform: scale(1.11) rotate(-2deg);
    border-color: #4a6fdc;
}
.arrival_section .product-info {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.arrival_section .product-info h5 {
    font-size: 1.18rem;
    font-weight: 700;
    color: #22223b;
    margin-bottom: 7px;
    letter-spacing: 0.5px;
}
.arrival_section .product-info p {
    color: #555;
    font-size: 1.01rem;
    margin-bottom: 8px;
}
.arrival_section .product-info .price {
    color: #4a6fdc;
    font-weight: 700;
    font-size: 1.09rem;
    margin-bottom: 7px;
    letter-spacing: 0.5px;
}
.arrival_section .product-info .badge-new {
    background: linear-gradient(90deg, #4a6fdc 0, #6c63ff 100%);
    color: #fff;
    font-size: 0.85rem;
    font-weight: 600;
    border-radius: 8px;
    padding: 3px 12px;
    margin-bottom: 8px;
    display: inline-block;
    letter-spacing: 0.5px;
    box-shadow: 0 1px 4px rgba(76,110,220,0.09);
    animation: fadeInDown 0.7s;
}
@media (max-width: 991px) {
    .arrival_section .box { padding: 18px 8px 18px 8px; }
    .arrival_section .product-card { flex-direction: column; align-items: stretch; min-height: unset; }
    .arrival_section .product-img { width: 100%; height: 180px; }
}
@keyframes fadeInDown {
    from { opacity: 0; transform: translateY(-20px);}
    to { opacity: 1; transform: translateY(0);}
}
</style>

<section class="arrival_section">
    <div class="container">
       <div class="box">
          <div class="arrival_bg_box">
             <img src="{{ asset('home/images/new arr1.jpg') }}" alt="">
          </div>
          <div class="row">
             <div class="col-12">
                <div class="heading_container remove_line_bt" style="position:relative; z-index:2;">
                   <h2>
                      <span style="color:#4a6fdc;">NewArrivals</span>
                   </h2>
                   <p>
                      Discover the latest additions to our agricultural tools collection. Every new product is selected to help you farm smarter, easier, and more efficiently.
                   </p>
                </div>
             </div>
          </div>
          <div class="row products-row">
            @forelse($newArrivals as $product)
                <div class="col-md-6 col-lg-4">
                    <div class="product-card" title="See details for {{ $product->title }}">
                        <img src="{{ asset('product/'.$product->image) }}" alt="{{ $product->title }}" class="product-img">
                        <div class="product-info">
                            <span class="badge-new">New</span>
                            <h5>{{ $product->title }}</h5>
                            <div class="price">${{ number_format($product->price, 2) }}</div>
                            <p>{{ \Illuminate\Support\Str::limit($product->description, 80) }}</p>
                        </div>
                    </div>
                </div>
            @empty
             <div class="col-12">
                    <p style="color:#888; font-size:1.1rem;">No new arrivals at the moment. Please check back soon!</p>
                </div>
            @endforelse
          </div>
       </div>
    </div>
</section>
