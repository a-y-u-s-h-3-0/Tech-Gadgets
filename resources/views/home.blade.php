@include('header')

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}


<style>
    @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap');

    :root {
        --blue: #0052D4;
        --white: #fff;
        --grey: #f5f5f5;
        --black1: #222;
        --black2: #999;
        --card-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);

        /* variables */
        --clr-primary: #7380ec;
        --clr-danger: #ff7782;
        --clr-success: #41f1b6;
        --clr-white: #fff;
        --clr-info-dark: #7d8da1;
        --clr-info-light: #dce1eb;
        --clr-dark: #363949;
        --clr-warning: #ff4edc;
        --clr-light: rgba(132, 139, 200, 0.18);
        --clr-primary-variant: #111e88;
        --clr-dark-variant: #677483;
        --clr-color-background: #f6f6f9;

        --card-border-radius: 16px;
        --border-radius-1: 0.4rem;
        --border-radius-2: 0.8rem;
        --border-radius-3: 1.2rem;

        --card-padding: 1.8rem;
        --padding-1: 1.2rem;
    }

    .container {
        background-color: #f8fafc;
    }


    .card-container {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 20px;
        /* Space between cards */
        max-width: 1400px;
        /* Adjusted for better spacing */
        margin: 40px auto;
        padding: 0 20px;
        /* Prevents cards from sticking to screen edges */
    }

    .cards {
        background-color: var(--clr-white);
        padding: var(--card-padding);
        border-radius: var(--card-border-radius);
        box-shadow: var(--box-shadow);
        transition: all 0.3s ease-in-out;
        flex: 1 1 calc(25% - 20px);
        /* Makes it flexible and fits 4 per row */
        max-width: calc(25% - 20px);
        text-align: center;
        position: relative;
        color: var(--clr-dark);
        min-width: 280px;
        /* Prevents cards from becoming too small */
    }

    .cards:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        transform: translateY(-5px);
        background-color: #007bff;
        color: var(--clr-white);

    }

    .cards:hover h1,
    .cards:hover h3,
    .cards:hover small,
    .cards:hover .number {
        color: var(--clr-white);
    }

    .iconbox i {
        background: var(--clr-primary-variant);
        padding: 0.5rem;
        border-radius: 50%;
        color: var(--clr-white);
        font-size: 2rem;
    }

    .middle {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 10px;
    }

    .middle h3 {
        font-size: 1.2rem;
    }

    .middle h1 {
        font-size: 1.6rem;
        color: var(--clr-dark);
    }

    @media (max-width: 1200px) {
        .cards {
            flex: 1 1 calc(33.33% - 20px);
            /* 3 cards per row */
            max-width: calc(33.33% - 20px);
        }
    }

    @media (max-width: 900px) {
        .cards {
            flex: 1 1 calc(50% - 20px);
            /* 2 cards per row */
            max-width: calc(50% - 20px);
        }
    }

    @media (max-width: 600px) {
        .cards {
            flex: 1 1 100%;
            /* 1 card per row */
            max-width: 100%;
        }
    }

    .progress {
        position: relative;
        height: 80px;
        width: 80px;
    }

    .progress svg {
        height: 80px;
        width: 80px;
        transform: rotate(-90deg);
    }

    .progress svg circle {
        fill: none;
        stroke: var(--clr-primary-variant);
        stroke-width: 5;
        stroke-dasharray: 188.4;
        /* Circle circumference */
        stroke-dashoffset: 37.68;
        /* Adjust for 80% completion */
        transition: stroke-dashoffset 0.6s ease-in-out;
    }

    .progress .number {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 1rem;
        font-weight: bold;
        color: var(--clr-dark);
    }

    small {
        display: block;
        margin-top: 10px;
        color: var(--clr-dark);
    }

    .details {
        display: grid;
        grid-template-columns: 1fr 0.5fr;
        gap: 24px;
        margin-top: 30px;
        max-width: 1400px;
        margin-left: auto;
        margin-right: auto;
        padding: 0 20px;
    }

    .recentorders {
        background: var(--clr-white);
        padding: 24px;
        border-radius: var(--card-border-radius);
        box-shadow: var(--card-shadow);
        transition: all 0.3s ease;
    }

    .recentorders:hover {
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    .cardheader {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .cardheader h1 {
        font-weight: 600;
        color: var(--blue);
        font-size: 1.5rem;
        margin: 0;
    }

    .btn {
        padding: 8px 16px;
        background: var(--blue);
        color: var(--clr-white);
        border-radius: 8px;
        font-size: 0.9rem;
        font-weight: 500;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .btn:hover {
        background: var(--clr-primary-variant);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 82, 212, 0.2);
    }

    .details table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        margin-top: 15px;
    }

    .details table thead td {
        font-weight: 600;
        background: var(--blue);
        color: var(--clr-white);
        padding: 12px 15px;
        text-align: left;
        border: none;
    }

    .details table thead td:first-child {
        border-radius: 10px 0 0 0;
    }

    .details table thead td:last-child {
        border-radius: 0 10px 0 0;
    }

    .details table tbody tr {
        transition: all 0.2s ease;
    }

    .details table tbody tr:hover {
        background: rgba(0, 82, 212, 0.05);
    }

    .details table tbody tr:last-child td:first-child {
        border-radius: 0 0 0 10px;
    }

    .details table tbody tr:last-child td:last-child {
        border-radius: 0 0 10px 0;
    }

    .details table tr td {
        padding: 12px 15px;
        font-size: 0.9rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    .details table tr td:last-child {
        text-align: right;
    }

    .a1 {
        color: var(--blue);
        font-weight: 500;
        text-decoration: none;
        padding: 5px 10px;
        border-radius: 6px;
        transition: all 0.2s ease;
        display: inline-block;
    }

    .a1:hover {
        background: rgba(0, 82, 212, 0.1);
        color: var(--clr-primary-variant);
    }

    /* Status indicator styles */
    .status {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
        display: inline-block;
        min-width: 90px;
        text-align: center;
    }

    .status.Delivered {
        background: #e8f5e9;
        color: #2e7d32;
    }

    .status.Shipping {
        background: #fff8e1;
        color: #ff8f00;
    }

    .status.Received {
        background: #ffebee;
        color: #c62828;
    }

    .status.Dispathed {
        background: #e3f2fd;
        color: #1565c0;
    }

    .status.inprogress {
        background: #f3e5f5;
        color: #6a1b9a;
    }

    .recentupdates {
        display: flex;
        flex-direction: column;
        gap: 24px;
    }

    .updates-card {
        background: var(--clr-white);
        padding: 24px;
        border-radius: var(--card-border-radius);
        box-shadow: var(--card-shadow);
        transition: all 0.3s ease;
    }

    .updates-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .updates-card h2 {
        font-size: 1.3rem;
        color: var(--clr-dark);
        margin-bottom: 20px;
        font-weight: 600;
    }

    .update {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        padding: 12px 0;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    .update:last-child {
        border-bottom: none;
    }

    .profile-photo img {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .message p {
        margin: 0;
        font-size: 0.9rem;
        color: var(--clr-dark);
    }

    .message p b {
        color: var(--blue);
    }

    .sales-analytics {
        background: var(--clr-white);
        padding: 24px;
        border-radius: var(--card-border-radius);
        box-shadow: var(--card-shadow);
    }

    .sales-analytics h2 {
        font-size: 1.3rem;
        color: var(--clr-dark);
        margin-bottom: 20px;
        font-weight: 600;
    }

    .item {
        display: flex;
        align-items: center;
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 15px;
        background: rgba(0, 82, 212, 0.03);
        transition: all 0.3s ease;
        border: 1px solid rgba(0, 82, 212, 0.05);
    }

    .item:hover {
        background: rgba(0, 82, 212, 0.08);
        transform: translateX(5px);
    }

    .icon1 {
        font-size: 1.2rem;
        color: var(--white);
        background: var(--blue);
        padding: 12px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        transition: all 0.3s ease;
    }

    .item:hover .icon1 {
        background: var(--clr-primary-variant);
        transform: scale(1.1);
    }

    .right-text {
        flex: 1;
    }

    .info h3 {
        font-size: 1rem;
        color: var(--clr-dark);
        margin: 0 0 3px 0;
        font-weight: 600;
    }

    .info small {
        font-size: 0.8rem;
        color: var(--clr-info-dark);
        display: block;
    }

    /* Add these new styles for the pie chart */
    .chart-container {
        max-width: 1400px;
        margin: 40px auto;
        padding: 0 20px;
    }
    
    .chart-card {
        background: var(--clr-white);
        padding: 24px;
        border-radius: var(--card-border-radius);
        box-shadow: var(--card-shadow);
        transition: all 0.3s ease;
    }
    
    .chart-card:hover {
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }
    
    .chart-title {
        font-weight: 600;
        color: var(--blue);
        font-size: 1.5rem;
        margin: 0 0 20px 0;
        text-align: center;
    }


    .danger {
        color: #f44336;
        font-weight: 600;
    }

    .success {
        color: #4caf50;
    }

    @media (max-width: 1200px) {
        .details {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .card-container {
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        }

        .middle {
            flex-direction: column;
            align-items: flex-start;
        }

        .progress {
            margin-top: 15px;
        }
    }

    @media (max-width: 480px) {
        .card-container {
            grid-template-columns: 1fr;
        }

        .details table tr td {
            padding: 10px 8px;
            font-size: 0.8rem;
        }

        .status {
            min-width: auto;
            padding: 4px 8px;
        }
    }
</style>

<div class="container">
    <div class="card-container">
        <!-- Card 1 -->
        <div class="cards">
            <span class="iconbox">
                <i class="fa-solid fa-arrow-trend-up"></i>
            </span>
            <div class="middle">
                <div class="left">
                    <h3>Total Revenue</h3>
                    <h1>{{$total_revenue}}</h1>
                </div>
                <div class="progress">
                    <svg viewBox="0 0 80 80">
                        <circle cx="40" cy="40" r="30" data-progress="80"></circle>
                    </svg>
                    <div class="number">80%</div>
                </div>
            </div>
            <small>Last 24 Hours</small>
        </div>

        <!-- Card 2 -->

        <a href="/category" class="cards" style="text-decoration: none;">
            <span class="iconbox">
                <i class="fa-solid fa-chart-bar"></i>
            </span>
            <div class="middle">
                <div class="left">
                    <h3>Category</h3>
                    <h1>{{ $c_count }}</h1>
                </div>

                @php
                    $progress = Session::get('category', $c_count); // Default to 0 if session is empty
                @endphp

                <div class="progress">
                    <svg viewBox="0 0 80 80">
                        <circle cx="40" cy="40" r="30" data-progress="{{ $progress }}"></circle>
                    </svg>
                    <div class="number">{{ $progress }}%</div>
                </div>
            </div>
            <small>Last 24 Hours</small>
        </a>


        <!-- Card 3 -->
        <a href="/banner" class="cards" style="text-decoration: none;">
            <span class="iconbox">
                <i class="fa-solid fa-chart-bar"></i>
            </span>
            <div class="middle">
                <div class="left">
                    <h3>Banner</h3>
                    <h1>{{ $b_count }}</h1>
                </div>
                @php
                    $progress = Session::get('banner', $b_count * 10); // Default to 0 if session is empty
                @endphp

                <div class="progress">
                    <svg viewBox="0 0 80 80">
                        <circle cx="40" cy="40" r="30" data-progress="{{ $progress }}"></circle>
                    </svg>
                    <div class="number">{{ $progress }}%</div>
                </div>
            </div>
            <small>Last 24 Hours</small>
        </a>



        <a href="/store" class="cards" style="text-decoration: none;">
            <span class="iconbox">
                <i class="fa-solid fa-chart-bar"></i>
            </span>
            <div class="middle">
                <div class="left">
                    <h3>Store</h3>
                    <h1>{{ $s_count }}</h1>
                </div>
                @php
                    $progress = Session::get('store', $s_count * 5); // Default to 0 if session is empty
                @endphp

                <div class="progress">
                    <svg viewBox="0 0 80 80">
                        <circle cx="40" cy="40" r="30" data-progress="{{ $progress }}"></circle>
                    </svg>
                    <div class="number">{{ $progress }}%</div>
                </div>
            </div>
            <small>Last 24 Hours</small>
        </a>




        <a href="#" class="cards" style="text-decoration: none;">
            <span class="iconbox">
                <i class="fa-solid fa-chart-bar"></i>
            </span>
            <div class="middle">
                <div class="left">
                    <h3>Orders</h3>
                    <h1>{{ $o_count }}</h1>
                </div>
                @php
                    $progress = Session::get('order', $o_count * 2); // Default to 0 if session is empty
                @endphp

                <div class="progress">
                    <svg viewBox="0 0 80 80">
                        <circle cx="40" cy="40" r="30" data-progress="{{ $progress }}"></circle>
                    </svg>
                    <div class="number">{{ $progress }}%</div>
                </div>
            </div>
            <small>Last 24 Hours</small>
        </a>



        <a href="/coupon" class="cards" style="text-decoration: none;">
            <span class="iconbox">
                <i class="fa-solid fa-chart-bar"></i>
            </span>
            <div class="middle">
                <div class="left">
                    <h3>Coupon</h3>
                    <h1>{{ $cou_count }}</h1>
                </div>
                @php
                    $progress = Session::get('category', $cou_count * 10); // Default to 0 if session is empty
                @endphp

                <div class="progress">
                    <svg viewBox="0 0 80 80">
                        <circle cx="40" cy="40" r="30" data-progress="{{ $progress }}"></circle>
                    </svg>
                    <div class="number">{{ $progress }}%</div>
                </div>
            </div>
            <small>Last 24 Hours</small>
        </a>

        <a href="/product" class="cards" style="text-decoration: none;">
            <span class="iconbox">
                <i class="fa-solid fa-chart-bar"></i>
            </span>
            <div class="middle">
                <div class="left">
                    <h3>Products</h3>
                    <h1>{{ $p_count }}</h1>
                </div>

                @php
                    $progress = min(100, max(0, $p_count * 2)); // Ensure between 0-100%
                @endphp

                <div class="progress">
                    <svg viewBox="0 0 80 80">
                        <circle cx="40" cy="40" r="30" data-progress="{{ $progress }}"></circle>
                    </svg>
                    <div class="number">{{ $progress }}%</div>
                </div>
            </div>
            <small>Last 24 Hours</small>
        </a>




        <a href="/blog" class="cards" style="text-decoration: none;">
            <span class="iconbox">
                <i class="fa-solid fa-chart-bar"></i>
            </span>
            <div class="middle">
                <div class="left">
                    <h3>Blog</h3>
                    <h1>{{ $bl_count }}</h1>
                </div>
                @php
                    $progress = Session::get('category', $bl_count * 5); // Default to 0 if session is empty
                @endphp

                <div class="progress">
                    <svg viewBox="0 0 80 80">
                        <circle cx="40" cy="40" r="30" data-progress="{{ $progress }}"></circle>
                    </svg>
                    <div class="number">{{ $progress }}%</div>
                </div>
            </div>
            <small>Last 24 Hours</small>
        </a>


    </div>

    <div class="details">
        <div class="recentorders">
            <div class="cardheader">
                <h1>Recent Orders</h1>
                <a href="/order">
                    <button class="btn">View All</button>

                </a>
            </div>
            <div style="overflow-x: auto;">
                <table>
                    <thead>
                        <tr>
                            <td>Order No</td>
                            <td>Product Name</td>
                            <td>Amount</td>
                            <td>Status</td>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($orders as $item)
                            <tr>
                                <td>{{ $item->_id }}</td>
                                <td>{{ $item->p_name }}</td>
                                <td>{{ $item->tot_amount }}</td>
                                {{-- <td><span class="status delivered"></td> --}}
                                <td><a href="/status/{{ $item->_id }}"
                                            >
                                            @if ($item->status == 1)
                                                <span class="status Received">
                                                    Received
                                                </span>
                                            @elseif ($item->status == 2)
                                                <span class="status Dispathed">
                                                    Dispathed
                                                </span>
                                            @elseif ($item->status == 3)
                                                <span class="status Shipping">
                                                    Shipping
                                                </span>
                                            @elseif ($item->status == 4)
                                                <span class="status inprogress">
                                                    Out for Delivery
                                                </span>
                                            @else
                                                <span class="status Delivered">
                                                    Delivered
                                                </span>
                                            @endif
                                        </a></td>

                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>






        

        <div class="recentupdates">
            <div class="updates-card">
                <h2>Recent Updates</h2>
                <div class="update">
                    <div class="profile-photo">
                        <img src="https://ui-avatars.com/api/?name=Ayush&background=0052D4&color=fff" alt="Ayush">
                    </div>
                    
                    @php
                        $user = Session::get('user');
                    @endphp
                    <div class="message">
                        <p><b>{{ $user->username }}</b> received his order
                        </p>
                        <small>on {{$user->created_at}}</small>
                    </div>
                </div>
                <div class="update">
                    <div class="profile-photo">
                        <img src="https://ui-avatars.com/api/?name=John+Doe&background=0052D4&color=fff"
                            alt="John">
                    </div>
                    <div class="message">
                        <p><b>{{ $user->username }}</b> received his order
                        </p>
                        <small>on {{$user->created_at}}</small>
                    </div>
                </div>
                <div class="update">
                    <div class="profile-photo">
                        <img src="https://ui-avatars.com/api/?name=Jane+Smith&background=0052D4&color=fff"
                            alt="Jane">
                    </div>
                    <div class="message">
                        <p><b>{{ $user->username }}</b> received his order
                        </p>
                        <small>on {{$user->created_at}}</small>
                    </div>
                </div>
            </div>

            <div class="sales-analytics">
                <h2>Sales Analytics</h2>
                <div class="item">
                    <div class="icon1">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="right-text">
                        <div class="info">
                            <h3>Online Orders</h3>
                            <small>Last 24 Hours</small>
                        </div>
                        <h3>{{$o_count}}</h3>
                    </div>
                </div>
                <div class="item">
                    <div class="icon1">
                        <i class="fas fa-store"></i>
                    </div>
                    <div class="right-text">
                        <div class="info">
                            <h3>Store Orders</h3>
                            <small>Last 24 Hours</small>
                        </div>
                        <h3>{{$s_count}}</h3>
                    </div>
                </div>
                <div class="item">
                    <div class="icon1">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div class="right-text">
                        <div class="info">
                            <h3>COD Orders</h3>
                            <small>Last 24 Hours</small>
                        </div>
                        <h3>{{$cash_count}}</h3>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
{{--     
    <div class="chart-container">
        <div class="chart-card">
            <h2 class="chart-title">Dashboard Metrics Distribution</h2>
            <canvas id="dashboardPieChart" height="400"></canvas>
        </div>
    </div> --}}
</div>
<canvas id="dashboardPieChart"></canvas>


<script>
    // Toggle sidebar
    let toggle = document.querySelector('.toggle');
    let navigation = document.querySelector('.navigation');
    let main = document.querySelector('.main');

    toggle.onclick = function() {
        navigation.classList.toggle('active');
        main.classList.toggle('active');
    }

    // Add hovered class to navigation items
    let list = document.querySelectorAll('.navigation li');

    function activeLink() {
        list.forEach((item) => item.classList.remove('hovered'));
        this.classList.add('hovered');
    }

    list.forEach((item) => item.addEventListener('mouseover', activeLink));


    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".progress svg circle").forEach(circle => {
            let progress = parseFloat(circle.getAttribute("data-progress")) || 0;
            let radius = parseFloat(circle.getAttribute("r"));
            let circumference = 2 * Math.PI * radius;
            let offset = circumference - (progress / 100) * circumference;

            // Set circle stroke properties dynamically
            circle.style.strokeDasharray = circumference;
            circle.style.strokeDashoffset = offset;
            circle.style.transition = "stroke-dashoffset 1s ease-in-out";
        });

        // Function to update progress dynamically
        function updateProgress(selector, value) {
            let circle = document.querySelector(selector);
            if (circle) {
                let radius = parseFloat(circle.getAttribute("r"));
                let circumference = 2 * Math.PI * radius;
                let offset = circumference - (value / 100) * circumference;
                circle.style.strokeDashoffset = offset;
            }
        }

        // Example usage: update circles dynamically based on live data
        setTimeout(() => {
            document.querySelectorAll(".progress svg circle").forEach(circle => {
                let progressValue = parseFloat(circle.getAttribute("data-progress")) || 0;
                updateProgress(`[data-progress='${progressValue}']`, progressValue);
            });
        }, 2000);
    });

    
    
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('dashboardPieChart');
        if (ctx) {
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: [
                        "Total Revenue (${{ number_format($total_revenue, 2) }})", 
                        "Categories ({{ $c_count }})", 
                        "Banners ({{ $b_count }})", 
                        "Stores ({{ $s_count }})",
                        "Orders ({{ $o_count }})", 
                        "Coupons ({{ $cou_count }})", 
                        "Products ({{ $p_count }})", 
                        "Blogs ({{ $bl_count }})"
                    ],
                    datasets: [{
                        data: [
                            {{ $total_revenue }}, 
                            {{ $c_count }}, 
                            {{ $b_count }}, 
                            {{ $s_count }},
                            {{ $o_count }}, 
                            {{ $cou_count }}, 
                            {{ $p_count }}, 
                            {{ $bl_count }}
                        ],
                        backgroundColor: [
                            "#0052D4", "#FF6B35", "#FF4F81", "#C14FFF",
                            "#4FC3F7", "#00C49F", "#4CAF50", "#AED581"
                        ],
                        borderWidth: 2,
                        hoverOffset: 15
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'right',
                            labels: {
                                padding: 20,
                                usePointStyle: true,
                                font: {
                                    size: 12
                                }
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const label = context.label || '';
                                    const value = context.raw;
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const percentage = Math.round((value / total) * 100);
                                    return `${label.split(' (')[0]}: ${value} (${percentage}%)`;
                                }
                            }
                        }
                    },
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    }
                }
            });
        }
    });
</script>



@include('footer')
