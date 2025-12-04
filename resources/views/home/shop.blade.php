<!-- filepath: d:\xamp\htdocs\Ecom\resources\views\home\shop.blade.php -->
<style>
    .why_section {
        background: #f5f7fa;
        padding: 60px 0 40px 0;
    }
    .why_section .box {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 4px 24px rgba(76,110,220,0.09);
        padding: 32px 22px 28px 22px;
        margin-bottom: 24px;
        text-align: center;
        transition: transform 0.18s cubic-bezier(.4,0,.2,1), box-shadow 0.18s cubic-bezier(.4,0,.2,1);
        position: relative;
        overflow: hidden;
    }
    .why_section .box:hover {
        transform: translateY(-8px) scale(1.03);
        box-shadow: 0 8px 32px rgba(76,110,220,0.16);
        border: 1.5px solid #4a6fdc;
    }
    .why_section .img-box {
        margin-bottom: 18px;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 70px;
    }
    .why_section .img-box svg {
        width: 56px;
        height: 56px;
        fill: #4a6fdc;
        background: #e9eefd;
        border-radius: 50%;
        padding: 10px;
        box-shadow: 0 2px 8px rgba(76,110,220,0.09);
        transition: background 0.2s, fill 0.2s;
    }
    .why_section .box:hover .img-box svg {
        fill: #fff;
        background: #4a6fdc;
    }
    .why_section .detail-box h5 {
        font-size: 1.25rem;
        font-weight: 700;
        color: #3546a6;
        margin-bottom: 10px;
        letter-spacing: 0.5px;
    }
    .why_section .detail-box p {
        color: #444;
        font-size: 1.05rem;
        margin-bottom: 0;
    }
    @media (max-width: 991px) {
        .why_section .box { padding: 22px 10px 18px 10px; }
        .why_section .img-box { height: 56px; }
    }
</style>

<section class="why_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Why Choose AgriTools Market?
          </h2>
          <p style="color:#4a6fdc; margin-top:10px;">
            Your trusted partner for modern, reliable, and affordable agricultural tools.
          </p>
       </div>
       <div class="row">
          <div class="col-md-4">
             <div class="box">
                <div class="img-box">
                   <!-- Fast Delivery Icon -->
                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"><g><path d="M44 34h-2v-4a2 2 0 0 0-2-2H14v-2h26a4 4 0 0 1 4 4v4a2 2 0 0 1-2 2z"/><circle cx="14" cy="38" r="4"/><circle cx="38" cy="38" r="4"/><path d="M6 34V10a2 2 0 0 1 2-2h28a2 2 0 0 1 2 2v24"/><path d="M6 34h36"/></g></svg>
                </div>
                <div class="detail-box">
                   <h5>
                      Fast & Reliable Delivery
                   </h5>
                   <p>
                      Get your farm tools delivered quickly and safely to your doorstep, wherever you are.
                   </p>
                </div>
             </div>
          </div>
          <div class="col-md-4">
             <div class="box">
                <div class="img-box">
                   <!-- Free Shipping Icon -->
                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"><g><path d="M8 34V14a2 2 0 0 1 2-2h28a2 2 0 0 1 2 2v20"/><circle cx="14" cy="38" r="4"/><circle cx="38" cy="38" r="4"/><path d="M8 34h32"/><path d="M40 34v-4a2 2 0 0 0-2-2H10a2 2 0 0 0-2 2v4"/></g></svg>
                </div>
                <div class="detail-box">
                   <h5>
                      Free Shipping Over ₦50,000
                   </h5>
                   <p>
                      Enjoy free nationwide shipping when you order tools worth ₦50,000 or more.
                   </p>
                </div>
             </div>
          </div>
          <div class="col-md-4">
             <div class="box">
                <div class="img-box">
                   <!-- Best Quality Icon -->
                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"><g><circle cx="24" cy="24" r="20"/><path d="M16 24l6 6 10-10"/></g></svg>
                </div>
                <div class="detail-box">
                   <h5>
                      Best Quality Guaranteed
                   </h5>
                   <p>
                      We offer only trusted, durable, and high-performance tools for every farming need.
                   </p>
                </div>
             </div>
          </div>
       </div>
    </div>
</section>
