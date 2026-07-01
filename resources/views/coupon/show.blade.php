@include('header')

<html lang="en">
<head>
    <title>{{ $coupon->c_code }} Coupon Details</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #6a11cb;
            --primary-dark: #2575fc;
            --secondary: #00b09b;
            --accent: #ff7e5f;
            --dark: #2d3436;
            --light: #f5f5f5;
            --success: #00c853;
            --card-bg: #ffffff;
            --shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            --transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            --text-light: rgba(255, 255, 255, 0.9);
            --text-lighter: rgba(255, 255, 255, 0.7);
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
           
            color: var(--dark);
        }

        .coupon-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            padding: 20px;
        }

        .coupon-container {
            width: 100%;
            max-width: 420px;
            perspective: 1200px;
            margin: 0 auto;
        }

        .coupon-card {
            position: relative;
            width: 100%;
            height: 520px;
            transform-style: preserve-3d;
            transition: var(--transition);
            cursor: pointer;
            border-radius: 20px;
            box-shadow: var(--shadow);
        }

        .coupon-card.flipped {
            transform: rotateY(180deg);
        }

        .card-face {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: 20px;
            overflow: hidden;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            padding: 25px;
            display: flex;
            flex-direction: column;
        }

        .front-face {
            justify-content: space-between;
        }

        .back-face {
            transform: rotateY(180deg);
            justify-content: space-between;
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .badge {
            background: linear-gradient(to right, var(--accent), #ff5e62);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 8px rgba(255, 126, 95, 0.3);
        }

        .expiry {
            font-size: 12px;
            color: var(--text-lighter);
            font-weight: 500;
        }

        .coupon-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 12px;
            margin: 10px 0;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            border: 2px solid rgba(255, 255, 255, 0.2);
        }

        .coupon-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--text-light);
            margin: 15px 0 5px;
            text-align: center;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .discount-banner {
            background: linear-gradient(to right, #11998e, #38ef7d);
            color: white;
            padding: 12px 25px;
            border-radius: 30px;
            font-weight: 700;
            font-size: 26px;
            text-align: center;
            margin: 10px auto;
            width: fit-content;
            box-shadow: 0 8px 20px rgba(17, 153, 142, 0.3);
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
            letter-spacing: 0.5px;
        }

        .hint {
            text-align: center;
            font-size: 14px;
            color: var(--text-lighter);
            margin-top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-weight: 500;
        }

        .hint i {
            font-size: 16px;
        }

        .details-title {
            font-size: 22px;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 20px;
            text-align: center;
            position: relative;
        }

        .details-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(to right, var(--secondary), var(--primary));
            border-radius: 3px;
        }

        .detail-item {
            margin-bottom: 16px;
        }

        .detail-label {
            font-weight: 600;
            color: var(--dark);
            font-size: 14px;
            margin-bottom: 5px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .detail-label i {
            color: var(--primary);
        }

        .detail-value {
            font-size: 16px;
            color: #555;
            padding-left: 24px;
        }

        .highlight {
            font-weight: 700;
            color: var(--primary-dark);
            font-size: 18px;
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 20px;
        }

        .btn {
            padding: 14px 20px;
            border-radius: 12px;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-back {
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
            color: white;
        }

        .btn-back:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(106, 17, 203, 0.3);
        }

        .btn-copy {
            background: linear-gradient(to right, var(--secondary), #00c853);
            color: white;
        }

        .btn-copy:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(0, 200, 83, 0.3);
        }

        .btn-copy.copied {
            background: linear-gradient(to right, #00c853, #5efc8d);
            box-shadow: 0 4px 8px rgba(0, 200, 83, 0.3);
        }

        .icon {
            font-size: 16px;
        }

        @media (max-width: 480px) {
            .coupon-card {
                height: 480px;
            }
            
            .coupon-title {
                font-size: 24px;
            }
            
            .discount-banner {
                font-size: 22px;
                padding: 10px 20px;
            }
            
            .details-title {
                font-size: 20px;
            }
        }

        /* Animation for flip on mobile */
        @media (hover: none) {
            .coupon-card {
                transition: transform 0.6s;
            }
        }
    </style>
</head>
<body>
    <div class="coupon-wrapper">
        <div class="coupon-container">
            <div class="coupon-card" id="couponCard">
                <div class="card-face front-face">
                    <div class="card-header">
                        <div class="badge">Limited Time</div>
                        <div class="expiry">Expires Soon</div>
                    </div>
                    
                    <img src="/images/{{ $coupon->c_pic }}" alt="{{ $coupon->c_code }} Coupon" class="coupon-image"/>
                    
                    <div>
                        <h2 class="coupon-title">{{ $coupon->c_code }}</h2>
                        <div class="discount-banner">SAVE {{ $coupon->c_discount }}%</div>
                    </div>
                    
                    <div class="hint">
                        <i class="fas fa-hand-pointer"></i>
                        Tap for details
                    </div>
                </div>
                
                <div class="card-face back-face">
                    <div>
                        <h3 class="details-title">Coupon Details</h3>
                        
                        <div class="detail-item">
                            <div class="detail-label">
                                <i class="fas fa-tag"></i>
                                <span>Coupon Code</span>
                            </div>
                            <div class="detail-value highlight">{{ $coupon->c_code }}</div>
                        </div>
                        
                        <div class="detail-item">
                            <div class="detail-label">
                                <i class="fas fa-align-left"></i>
                                <span>Description</span>
                            </div>
                            <p class="detail-value">{{ $coupon->c_desc }}</p>
                        </div>
                        
                        <div class="detail-item">
                            <div class="detail-label">
                                <i class="fas fa-percentage"></i>
                                <span>Discount</span>
                            </div>
                            <div class="detail-value">{{ $coupon->c_discount }}% OFF</div>
                        </div>
                        
                        <div class="detail-item">
                            <div class="detail-label">
                                <i class="fas fa-rupee-sign"></i>
                                <span>Max Savings</span>
                            </div>
                            <div class="detail-value">₹{{ number_format($coupon->c_max_amt, 2) }}</div>
                        </div>
                    </div>
                    
                    <div class="action-buttons">
                        <a href="/coupon" class="btn btn-back">
                            <i class="fas fa-arrow-left icon"></i>
                            Back to Coupons
                        </a>
                        <button class="btn btn-copy" id="copyBtn">
                            <i class="far fa-copy icon"></i>
                            Copy Code
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const couponCard = document.getElementById('couponCard');
        const copyBtn = document.getElementById('copyBtn');
        
        // Flip card on click for mobile
        couponCard.addEventListener('click', function() {
            if (window.innerWidth <= 768) { // Only for mobile devices
                this.classList.toggle('flipped');
            }
        });
        
        // Flip card on hover for desktop
        couponCard.addEventListener('mouseenter', function() {
            if (window.innerWidth > 768) {
                this.classList.add('flipped');
            }
        });
        
        couponCard.addEventListener('mouseleave', function() {
            if (window.innerWidth > 768) {
                this.classList.remove('flipped');
            }
        });
        
        // Copy coupon code
        copyBtn.addEventListener('click', function() {
            const couponCode = '{{ $coupon->c_code }}';
            
            navigator.clipboard.writeText(couponCode).then(() => {
                // Visual feedback
                this.innerHTML = `<i class="fas fa-check icon"></i> Copied!`;
                this.classList.add('copied');
                
                // Reset after 2 seconds
                setTimeout(() => {
                    this.innerHTML = `<i class="far fa-copy icon"></i> Copy Code`;
                    this.classList.remove('copied');
                }, 2000);
            }).catch(err => {
                alert('Failed to copy code. Please try manually.');
                console.error('Failed to copy: ', err);
            });
            
            // Prevent card flip when clicking copy button
            event.stopPropagation();
        });
    </script>
</body>
</html>

@include('footer')