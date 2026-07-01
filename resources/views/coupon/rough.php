@include('header')

<link rel="stylesheet" href="index.css">

<section class="section">
    <div class="card">
        <div class="card-header">
            <h3> Coupon Details </h3>
            <hr>

        </div>
        <div class="card-body bg-dark text-white">
            <img src="/images/{{ $coupon->c_pic }}" height="200" width="400" />
            <h4>Coupon Code: {{ $coupon->c_code }}</h4>
            <p>Coupon Description:{{ $coupon->c_desc }}</p>
            <p>Coupon Discount: {{ $coupon->c_discount }}</p>
            <p>Coupon Maximium Amount :{{ $coupon->c_max_amt }}</p>

            <a href="/coupon" class="btn btn-outline-primary">Back</a>
        </div>
    </div>

</section>
{{-- 
    <div class="wrapper">
        <div class="card"> 

            <div class="front-page">
                <div class="card-info">
                    <h2 class="card-title">Jessica Jenner</h2>
                    <p class="card-subtitle">100 M followers on Instagram</p>
                </div> 
            </div>
            
            <div class="back-page">
                <div class="card-content">
                    <h3>Jessica Jenner</h3>
                    <p class="card-description"> Jessica Jenner is the top model in the World. jessica Jenner is an American Mannequin. She is also a U.S gold medalist as Decathlon winner. She first appeared on the ramp walk of Sherri's Hill spring.</p>
                    <button class="card-button">Explore More</button>
                </div>
            </div>

        </div>
    </div> --}}

@include('footer')
