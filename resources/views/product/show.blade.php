@include('header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
    :root {
        --primary-color: #256eff;
        --secondary-color: #12263a;
        --accent-color: #f64749;
        --light-color: #f8f9fa;
        --dark-color: #212529;
        --gray-color: #6c757d;
        --success-color: #28a745;
        --border-radius: 8px;
        --box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        --transition: all 0.3s ease;
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
    }

    body {
        background-color: #f5f7fa;
        color: var(--dark-color);
        line-height: 1.6;
    }

    .container {
        max-width: 1300px;
        /* margin: 3rem auto;
      padding: 0 1rem; */
    }

    .product-card {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        background: whitesmoke;
        border-radius: var(--border-radius);
        margin: 100px 100px 100px 100px;
        box-shadow: var(--box-shadow);
        overflow: hidden;
        transition: var(--transition);
    }

    /* Product Gallery with Showcase */
    .product-gallery {
        position: relative;
        padding: 1.5rem;
    }

    .product-badge {
        position: absolute;
        top: 1.5rem;
        left: 1.5rem;
        background: var(--accent-color);
        color: white;
        padding: 0.3rem 0.8rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        z-index: 10;
    }

    .img-display {
        overflow: hidden;
        margin-bottom: 1rem;
        border-radius: var(--border-radius);
    }

    .img-showcase {
        display: flex;
        width: 100%;
        transition: all 0.5s ease;
    }

    .img-showcase img {
        min-width: 100%;
        height: 400px;
        object-fit: contain;
    }

    .img-select {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    .img-item {
        flex: 0 0 calc(20% - 0.5rem);
        cursor: pointer;
    }

    .img-item img {
        width: 100%;
        height: 80px;
        object-fit: cover;
        border-radius: 4px;
        border: 2px solid transparent;
        transition: var(--transition);
    }

    .img-item:hover img {
        border-color: var(--primary-color);
    }

    .img-item.active img {
        border-color: var(--primary-color);
    }

    /* Product Details */
    .product-details {
        padding: 2rem;
    }

    .product-title {
        font-size: 2rem;
        font-weight: 700;
        color: var(--secondary-color);
        margin-bottom: 0.5rem;
        position: relative;
    }

    .product-title::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -0.5rem;
        height: 3px;
        width: 60px;
        background: var(--primary-color);
    }

    .product-brand {
        color: var(--gray-color);
        font-size: 0.9rem;
        margin-top: 1rem;
        margin-bottom: 1rem;
        display: block;
    }

    .rating {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
    }

    .stars {
        color: #ffc107;
        margin-right: 0.5rem;
    }

    .review-count {
        color: var(--gray-color);
        font-size: 0.9rem;
    }

    .price-container {
        margin: 1.5rem 0;
    }

    .current-price {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--primary-color);
    }

    .original-price {
        text-decoration: line-through;
        color: var(--gray-color);
        margin-left: 0.5rem;
    }

    .discount {
        background: #ffecec;
        color: var(--accent-color);
        padding: 0.2rem 0.5rem;
        border-radius: 4px;
        font-size: 0.9rem;
        margin-left: 0.5rem;
    }

    .product-description {
        margin: 1.5rem 0;
    }

    .product-description p {
        margin-bottom: 1rem;
        color: #555;
    }

    .features-list {
        list-style: none;
        margin: 1rem 0;
    }

    .features-list li {
        margin-bottom: 0.8rem;
        padding-left: 1.5rem;
        position: relative;
    }

    .features-list li:before {
        content: "✓";
        color: var(--success-color);
        position: absolute;
        left: 0;
        font-weight: bold;
    }

    .product-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        margin: 2rem 0;
    }

    .quantity-selector {
        display: flex;
        align-items: center;
        border: 1px solid #ddd;
        border-radius: var(--border-radius);
        overflow: hidden;
    }

    .quantity-btn {
        background: #f1f1f1;
        border: none;
        padding: 0.5rem 1rem;
        cursor: pointer;
        font-size: 1rem;
    }

    .quantity-input {
        width: 50px;
        text-align: center;
        border: none;
        border-left: 1px solid #ddd;
        border-right: 1px solid #ddd;
        padding: 0.5rem;
        font-size: 1rem;
    }

    .btn {
        padding: 0.7rem 1.5rem;
        border: none;
        border-radius: var(--border-radius);
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-primary {
        background: var(--primary-color);
        color: white;
    }

    .btn-primary:hover {
        background: #1a5bd8;
        transform: translateY(-2px);
    }

    .btn-secondary {
        background: var(--light-color);
        color: var(--dark-color);
        border: 1px solid #ddd;
    }

    .btn-secondary:hover {
        background: #e9ecef;
    }

    .btn-wishlist {
        background: transparent;
        border: 1px solid #ddd;
        padding: 0.7rem;
        border-radius: 50%;
        transition: var(--transition);
    }

    .btn-wishlist:hover,
    .btn-wishlist.active {
        color: var(--accent-color);
        border-color: var(--accent-color);
    }

    .delivery-info {
        background: white;
        padding: 1.2rem;
        border-radius: var(--border-radius);
        margin: 1.5rem 0;
    }

    .delivery-info p {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 0.7rem;
    }

    .social-sharing {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-top: 2rem;
    }

    .social-sharing p {
        font-weight: 600;
    }

    .social-icons {
        display: flex;
        gap: 0.5rem;
    }

    .social-icon {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        transition: var(--transition);
    }

    .facebook {
        background: #3b5998;
    }

    .twitter {
        background: #1da1f2;
    }

    .instagram {
        background: #e1306c;
    }

    .whatsapp {
        background: #25d366;
    }

    .pinterest {
        background: #e60023;
    }

    .social-icon:hover {
        transform: translateY(-3px);
        opacity: 0.9;
    }

    /* Product Tabs */
    .product-tabs {
        margin-top: 3rem;
        margin: 100px 100px 100px 100px;
    }

    .tab-header {
        display: flex;
        border-bottom: 1px solid #ddd;
        overflow-x: auto;
        scrollbar-width: none;
    }

    .tab-header::-webkit-scrollbar {
        display: none;
    }

    .tab-btn {
        padding: 0.8rem 1.5rem;
        background: none;
        border: none;
        cursor: pointer;
        font-weight: 600;
        color: var(--gray-color);
        position: relative;
        white-space: nowrap;
    }

    .tab-btn.active {
        color: var(--primary-color);
    }

    .tab-btn.active:after {
        content: '';
        position: absolute;
        bottom: -1px;
        left: 0;
        width: 100%;
        height: 3px;
        background: var(--primary-color);
    }

    .tab-content {
        padding: 1.5rem 0;
        display: none;
    }

    .tab-content.active {
        display: block;
    }

    .specs-table {
        width: 100%;
        border-collapse: collapse;
    }

    .specs-table :hover{
        width: 100%;
        border-collapse: collapse;
        
    }


    .specs-table tr:nth-child(even) {
        background: #f9f9f9;
    }

    .specs-table td {
        padding: 0.8rem;
        border-bottom: 1px solid #eee;
    }

    .specs-table td:first-child {
        font-weight: 600;
        width: 30%;
    }

    /* Related Products Section */
    .related-products {
        margin-top: 3rem;
    }

    .section-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        color: var(--secondary-color);
        position: relative;
        padding-left: 1rem;
    }

    .section-title:before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 4px;
        background: var(--primary-color);
        border-radius: 2px;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .product-card {
            grid-template-columns: 1fr;
        }

        .img-showcase img {
            height: 300px;
        }

        .product-actions {
            flex-direction: column;
        }

        .quantity-selector {
            align-self: flex-start;
        }

        .tab-header {
            flex-wrap: nowrap;
        }

        .img-item {
            flex: 0 0 calc(25% - 0.5rem);
        }
    }
</style>

<div class="container">
    <div class="product-card">
        <!-- Product Gallery -->
        <div class="product-gallery">
            <span class="product-badge">-15%</span>
            <div class="img-display">
                <div class="img-showcase">
                    <img src="/images/{{ $product->p_pic1 }}" class="product-image" />
                    <img src="/images/{{ $product->p_pic2 }}" class="product-image" />
                    <img src="/images/{{ $product->p_pic3 }}" class="product-image" />
                    <img src="/images/{{ $product->p_pic4 }}" class="product-image" />
                </div>
            </div>

            <div class="img-select">
                <div class="img-item active" data-id="1">
                    <img src="/images/{{ $product->p_pic1 }}" class="product-image" />
                </div>
                <div class="img-item" data-id="2">
                    <img src="/images/{{ $product->p_pic2 }}" class="product-image" />
                </div>
                <div class="img-item" data-id="3">
                    <img src="/images/{{ $product->p_pic3 }}" class="product-image" />
                </div>
                <div class="img-item" data-id="4">
                    <img src="/images/{{ $product->p_pic4 }}" class="product-image" />
                </div>
            </div>
        </div>

        <!-- Product Details -->
        <div class="product-details">
            <h1 class="product-title">{{$product->p_name}}</h1>
            <a href="#" class="product-brand">By Tech Gadgets</a>

            <div class="rating">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <span class="review-count">(142 reviews)</span>
            </div>

            <div class="price-container">
                <span class="current-price">₹ 1 {{$product->p_price}}</span>
               
                <span class="discount">15% OFF</span>
            </div>

          
            <div class="delivery-info">
                <p><i class="fas fa-truck"></i> Free delivery on all orders</p>
                <p><i class="fas fa-undo"></i> 30-day return policy</p>
                <p><i class="fas fa-shield-alt"></i>Also Get Cashback On Payement</p>
            </div>

            {{-- <div class="product-actions">
          <div class="quantity-selector">
            <button class="quantity-btn minus">-</button>
            <input type="number" value="1" min="1" class="quantity-input">
            <button class="quantity-btn plus">+</button>
          </div>
          
          <button class="btn btn-primary">
            <i class="fas fa-shopping-cart"></i> Add to Cart
          </button>
          
          <button class="btn btn-secondary">
            <i class="fas fa-exchange-alt"></i> Compare
          </button>
          
          <button class="btn-wishlist">
            <i class="far fa-heart"></i>
          </button>
        </div>
         --}}
            {{-- <div class="social-sharing">
          <p>Share:</p>
          <div class="social-icons">
            <a href="#" class="social-icon facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social-icon twitter"><i class="fab fa-twitter"></i></a>
            <a href="#" class="social-icon instagram"><i class="fab fa-instagram"></i></a>
            <a href="#" class="social-icon whatsapp"><i class="fab fa-whatsapp"></i></a>
            <a href="#" class="social-icon pinterest"><i class="fab fa-pinterest"></i></a>
          </div>
        </div> --}}
        </div>
    </div>

    <!-- Product Tabs -->
    <div class="product-tabs">
        <div class="tab-header">
            <button class="tab-btn active" data-tab="description">Description</button>
            <button class="tab-btn" data-tab="specs">Specifications</button>
            <button class="tab-btn" data-tab="reviews">Reviews</button>
            <button class="tab-btn" data-tab="support">Support</button>
            <button class="tab-btn" data-tab="shipping">Shipping Info</button>
        </div>

        <div id="description" class="tab-content active">
            <h3>Product Details</h3>
            <p>{{ $product->p_desc }}</p>
            
        </div>

        <div id="specs" class="tab-content">
            <table class="specs-table">
                <tr>
                    <td>Product Size</td>
                    <td>{{$product->p_size}}</td>
                </tr>
                <tr>
                    <td>Product Country</td>
                    <td>{{$product->p_country}}</td>
                </tr>
                <tr>
                    <td>Product Warranty</td>
                    <td>{{$product->p_warranty}} Years</td>
                </tr>
                <tr>
                    <td>Product Working Time</td>
                    <td>{{$product->working_time}} Years</td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>{{$product->category}}</td>
                </tr>
             
            </table>
        </div>

        <div id="reviews" class="tab-content">
            <h3>Customer Reviews</h3>
            <p>This section would contain customer reviews and ratings...</p>
        </div>

        <div id="support" class="tab-content">
            <h3>Product Support</h3>
            <p>This section would contain support information, FAQs, and contact details...</p>
        </div>

        <div id="shipping" class="tab-content">
            <h3>Shipping Information</h3>
            <p>This section would contain shipping details, delivery times, and policies...</p>
        </div>
    </div>

    <!-- Related Products Section -->
    {{-- <div class="related-products">
      <h2 class="section-title">You May Also Like</h2>
      <!-- Related products would be displayed here -->
    </div> --}}
</div>

<script>
    // Ensure all DOM content is loaded before executing scripts
    document.addEventListener('DOMContentLoaded', function() {
        // Image gallery functionality
        const imgs = document.querySelectorAll('.img-item');
        const imgShowcase = document.querySelector('.img-showcase');

        imgs.forEach((img, index) => {
            img.addEventListener('click', function() {
                // Update active class
                imgs.forEach(item => item.classList.remove('active'));
                this.classList.add('active');

                // Move showcase to show the selected image
                const displayWidth = document.querySelector('.img-showcase img:first-child')
                    .clientWidth;
                imgShowcase.style.transform = `translateX(${-index * displayWidth}px)`;
            });
        });

        // Quantity selector functionality
        const minusBtn = document.querySelector('.quantity-btn.minus');
        const plusBtn = document.querySelector('.quantity-btn.plus');
        const quantityInput = document.querySelector('.quantity-input');

        if (minusBtn && plusBtn && quantityInput) {
            minusBtn.addEventListener('click', function() {
                if (parseInt(quantityInput.value) > 1) {
                    quantityInput.value = parseInt(quantityInput.value) - 1;
                }
            });

            plusBtn.addEventListener('click', function() {
                quantityInput.value = parseInt(quantityInput.value) + 1;
            });
        }

        // Tab functionality - FIXED VERSION
        const tabBtns = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');

        tabBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                // Get the tab id this button controls
                const tabId = this.getAttribute('data-tab');

                // Hide all tab contents
                tabContents.forEach(content => {
                    content.classList.remove('active');
                });

                // Remove active class from all tab buttons
                tabBtns.forEach(btn => {
                    btn.classList.remove('active');
                });

                // Show selected tab content - find by id
                document.getElementById(tabId).classList.add('active');

                // Add active class to clicked button
                this.classList.add('active');
            });
        });

        // Wishlist button toggle
        const wishlistBtn = document.querySelector('.btn-wishlist');

        if (wishlistBtn) {
            wishlistBtn.addEventListener('click', function() {
                this.classList.toggle('active');
                const icon = this.querySelector('i');

                if (this.classList.contains('active')) {
                    icon.classList.replace('far', 'fas');
                    icon.style.color = 'var(--accent-color)';
                } else {
                    icon.classList.replace('fas', 'far');
                    icon.style.color = '';
                }
            });
        }

        // Automatically adjust showcase on window resize
        window.addEventListener('resize', function() {
            const activeImg = document.querySelector('.img-item.active');

            if (activeImg && imgShowcase) {
                const index = Array.from(imgs).indexOf(activeImg);
                const displayWidth = document.querySelector('.img-showcase img:first-child')
                .clientWidth;

                imgShowcase.style.transform = `translateX(${-index * displayWidth}px)`;
            }
        });
    });
</script>
@include('footer')
