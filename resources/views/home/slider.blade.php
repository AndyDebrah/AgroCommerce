<style>
    .slider_section {
        position: relative;
        background: linear-gradient(135deg, #f8fbf2 0%, #e8f5e1 50%, #f0f9e8 100%);
        padding: 40px 0;
        overflow: hidden;
    }

    .slider_section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" patternUnits="userSpaceOnUse" width="4" height="4"><circle cx="2" cy="2" r="0.5" fill="%23c8e6c9" opacity="0.3"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>') repeat;
        opacity: 0.4;
        z-index: 1;
    }

    .carousel {
        position: relative;
        z-index: 2;
    }

    .carousel-inner {
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(76, 175, 80, 0.15);
        background: #fff;
    }

    .carousel-item {
        transition: transform 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .video-box {
        position: relative;
        min-height: 400px;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 12px 32px rgba(76, 175, 80, 0.2);
    }

    .video-box video {
        width: 100%;
        height: 400px;
        object-fit: cover;
        display: block;
        filter: brightness(1.1) contrast(1.05);
    }

    .video-overlay {
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: linear-gradient(135deg, rgba(56, 142, 60, 0.3) 0%, rgba(46, 125, 50, 0.4) 100%);
        z-index: 2;
    }

    .video-overlay::after {
        content: '';
        position: absolute;
        top: 20px;
        right: 20px;
        width: 60px;
        height: 60px;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 16px rgba(76, 175, 80, 0.3);
    }

    .detail-box {
        position: relative;
        z-index: 3;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(248, 251, 242, 0.95) 100%);
        border-radius: 20px;
        padding: 40px 32px;
        margin: 20px 0;
        box-shadow: 0 8px 32px rgba(76, 175, 80, 0.12);
        border: 1px solid rgba(76, 175, 80, 0.1);
        backdrop-filter: blur(10px);
        animation: slideInFromRight 1s ease-out;
        position: relative;
        overflow: hidden;
    }

    .detail-box::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: linear-gradient(135deg, #4CAF50, #66BB6A);
        border-radius: 0 4px 4px 0;
    }

    .detail-box::after {
        content: '🌱';
        position: absolute;
        top: 20px;
        right: 25px;
        font-size: 2rem;
        opacity: 0.6;
        animation: float 3s ease-in-out infinite;
    }

    .detail-box h1 {
        font-size: 2.4rem;
        font-weight: 800;
        color: #2E7D32;
        margin-bottom: 20px;
        line-height: 1.2;
        animation: fadeInDown 1s ease-out;
        text-shadow: 0 2px 4px rgba(46, 125, 50, 0.1);
    }

    .detail-box span {
        color: #4CAF50;
        font-weight: 900;
        position: relative;
        background: linear-gradient(135deg, #4CAF50, #66BB6A);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .detail-box p {
        color: #388E3C;
        font-size: 1.1rem;
        margin-bottom: 28px;
        line-height: 1.6;
        animation: fadeInUp 1.2s ease-out;
        font-weight: 500;
    }

    .btn1 {
        background: linear-gradient(135deg, #4CAF50 0%, #66BB6A 50%, #43A047 100%);
        color: #fff;
        border: none;
        border-radius: 50px;
        padding: 14px 36px;
        font-weight: 700;
        font-size: 1.1rem;
        box-shadow: 0 6px 20px rgba(76, 175, 80, 0.3);
        transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        position: relative;
        overflow: hidden;
    }

    .btn1::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .btn1:hover::before {
        left: 100%;
    }

    .btn1:hover {
        background: linear-gradient(135deg, #43A047 0%, #4CAF50 50%, #66BB6A 100%);
        box-shadow: 0 8px 30px rgba(76, 175, 80, 0.4);
        color: #fff;
        transform: translateY(-2px);
    }

    .btn1:active {
        transform: translateY(0);
    }

    /* Agricultural-themed carousel indicators */
    .carousel-indicators {
        bottom: 20px;
        z-index: 10;
    }

    .carousel-indicators li {
        background: rgba(76, 175, 80, 0.5);
        width: 16px;
        height: 16px;
        border-radius: 50%;
        margin: 0 8px;
        border: 2px solid rgba(255, 255, 255, 0.8);
        opacity: 0.6;
        transition: all 0.3s ease;
        position: relative;
    }

    .carousel-indicators li::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 6px;
        height: 6px;
        background: #fff;
        border-radius: 50%;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .carousel-indicators .active {
        opacity: 1;
        background: #4CAF50;
        transform: scale(1.2);
        box-shadow: 0 4px 12px rgba(76, 175, 80, 0.4);
    }

    .carousel-indicators .active::after {
        opacity: 1;
    }

    /* Modern agricultural-themed controls */
    .carousel-control-prev, .carousel-control-next {
        width: 56px;
        height: 56px;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255, 255, 255, 0.9);
        border-radius: 50%;
        color: #4CAF50;
        font-size: 1.8rem;
        opacity: 0.8;
        transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        box-shadow: 0 6px 20px rgba(76, 175, 80, 0.2);
        border: 2px solid rgba(76, 175, 80, 0.1);
        backdrop-filter: blur(10px);
    }

    .carousel-control-prev {
        left: 20px;
    }

    .carousel-control-next {
        right: 20px;
    }

    .carousel-control-prev:hover, .carousel-control-next:hover {
        background: #4CAF50;
        color: #fff;
        opacity: 1;
        transform: translateY(-50%) scale(1.1);
        box-shadow: 0 8px 30px rgba(76, 175, 80, 0.4);
    }

    .carousel-control-prev-icon, .carousel-control-next-icon {
        width: 24px;
        height: 24px;
    }

    /* Responsive Design */
    @media (max-width: 991px) {
        .detail-box {
            padding: 24px 20px;
            margin: 15px 0;
        }
        .video-box {
            min-height: 280px;
        }
        .video-box video {
            height: 280px;
        }
        .detail-box h1 {
            font-size: 2rem;
        }
        .carousel-control-prev, .carousel-control-next {
            width: 48px;
            height: 48px;
            font-size: 1.5rem;
        }
    }

    @media (max-width: 767px) {
        .slider_section {
            padding: 20px 0;
        }
        .detail-box {
            padding: 20px 16px;
            margin: 10px 0;
        }
        .detail-box h1 {
            font-size: 1.8rem;
        }
        .detail-box p {
            font-size: 1rem;
        }
        .video-box {
            min-height: 220px;
        }
        .video-box video {
            height: 220px;
        }
        .btn1 {
            padding: 12px 28px;
            font-size: 1rem;
        }
    }

    /* Animations */
    @keyframes slideInFromRight {
        from {
            opacity: 0;
            transform: translateX(60px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0px) rotate(0deg);
        }
        50% {
            transform: translateY(-8px) rotate(5deg);
        }
    }

    /* Leaf decoration animations */
    .detail-box.slide-in {
        animation: slideInFromRight 1s ease-out;
    }

    /* Add subtle parallax effect */
    .carousel-item.active .video-box {
        animation: subtleZoom 8s ease-in-out infinite alternate;
    }

    @keyframes subtleZoom {
        from { transform: scale(1); }
        to { transform: scale(1.02); }
    }
</style>

<section class="slider_section">
    <div id="customCarousel1" class="carousel slide" data-ride="carousel" data-interval="6000">
        <div class="carousel-inner">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-lg-6">
                            <div class="video-box">
                                <video class="slider-video" autoplay muted loop playsinline>
                                    <source src="{{ asset('home/images/firstV.mp4') }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                <div class="video-overlay"></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="detail-box">
                                <h1>
                                    <span>Empowering Farmers</span><br>
                                    With Modern Tools
                                </h1>
                                <p>
                                    Discover the latest agricultural equipment designed to boost your productivity and make farming easier. From hand tools to advanced machinery, we support every farmer's journey to sustainable success.
                                </p>
                                <div class="btn-box">
                                    <a href="products" class="btn1">
                                        🚜 Shop Tools Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-lg-6">
                            <div class="video-box">
                                <video class="slider-video" autoplay muted loop playsinline>
                                    <source src="{{ asset('home/images/secondV.mp4') }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                <div class="video-overlay"></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="detail-box">
                                <h1>
                                    <span>Smart Irrigation</span><br>
                                    For Every Farm
                                </h1>
                                <p>
                                    Upgrade your irrigation system with our efficient and eco-friendly solutions. Save water, time, and energy while ensuring your crops thrive all season long with precision watering technology.
                                </p>
                                <div class="btn-box">
                                    <a href="products" class="btn1">
                                        💧 Explore Irrigation
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-lg-6">
                            <div class="video-box">
                                <video class="slider-video" autoplay muted loop playsinline>
                                    <source src="{{ asset('home/images/thridV.mp4') }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                <div class="video-overlay"></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="detail-box">
                                <h1>
                                    <span>Quality Harvesting Tools</span><br>
                                    For Bumper Yields
                                </h1>
                                <p>
                                    Make your harvest season smooth and successful with our range of durable, ergonomic harvesting tools. Designed for maximum efficiency and comfort, perfect for farmers of all scales.
                                </p>
                                <div class="btn-box">
                                    <a href="products" class="btn1">
                                        🌾 View Harvest Tools
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 4 -->
            <div class="carousel-item">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-lg-6">
                            <div class="video-box">
                                <video class="slider-video" autoplay muted loop playsinline>
                                    <source src="{{ asset('home/images/fourthV.mp4') }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                <div class="video-overlay"></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="detail-box">
                                <h1>
                                    <span>Expert Support</span><br>
                                    For Every Farmer
                                </h1>
                                <p>
                                    Need advice or have questions? Our experienced agricultural team is here to help you choose the right tools and maximize your farm's potential. Get personalized guidance anytime!
                                </p>
                                <div class="btn-box">
                                    <a href="#" class="btn1">
                                        💬 Chat With Experts
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Carousel Controls -->
        <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>
        <div class="container">
            <ol class="carousel-indicators">
                <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                <li data-target="#customCarousel1" data-slide-to="1"></li>
                <li data-target="#customCarousel1" data-slide-to="2"></li>
                <li data-target="#customCarousel1" data-slide-to="3"></li>
            </ol>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Enhanced carousel functionality
    const carousel = document.getElementById('customCarousel1');
    const detailBoxes = document.querySelectorAll('.detail-box');

    // Add slide-in animation when carousel changes
    if (carousel) {
        carousel.addEventListener('slide.bs.carousel', function(e) {
            // Remove animation from all detail boxes
            detailBoxes.forEach(box => {
                box.classList.remove('slide-in');
            });
        });

        carousel.addEventListener('slid.bs.carousel', function(e) {
            // Add animation to active slide's detail box
            const activeSlide = carousel.querySelector('.carousel-item.active');
            const activeDetailBox = activeSlide.querySelector('.detail-box');
            if (activeDetailBox) {
                activeDetailBox.classList.add('slide-in');
            }
        });
    }

    // Add smooth scroll for anchor links
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href !== '#customCarousel1') {
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });

    // Add loading animation for videos
    const videos = document.querySelectorAll('.slider-video');
    videos.forEach(video => {
        video.addEventListener('loadstart', function() {
            this.closest('.video-box').classList.add('loading');
        });

        video.addEventListener('canplay', function() {
            this.closest('.video-box').classList.remove('loading');
        });
    });
});
</script>
