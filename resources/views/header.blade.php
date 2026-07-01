@php
    if (!Session::has('user')) {
        header('Location: ' . url('/'));
        exit();
    }
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- Add IonIcons scripts -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <title>Document</title>

</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap');


    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Ubuntu', sans-serif;
    }

    :root {
        --blue: #0052D4;
        background: linear-gradient(var(--blue), #0052D4, #2d07b9, #0052D4);
        /* background:linear-gradient(#0052D4,#2d07b9,#0052D4) ; */
        --white: #fff;
        --grey: #f5f5f5;
        --black1: #222;
        --black2: #999;

        /* variables */
        --clr-primary: #7380ec;
        --clr-danger: #ff7782;
        --clr-success: #41f1b6;
        --clr-white: #fff;
        --clr-info-dark: #7d8da1;
        --clr-info-light: #dce1eb;
        --clr-dark: #363949;
        --clr-warnig: #ff4edc;
        --clr-light: rgba(132, 139, 200, 0.18);
        --clr-primary-variant: #111e88;
        --clr-dark-variant: #677483;
        --clr-color-background: #f6f6f9;

        --card-border-radius: 2rem;
        --border-radius-1: 0.4rem;
        --border-radius-2: 0.8rem;
        --border-radius-3: 1.2rem;

        --card-padding: 1.8rem;
        --padding-1: 1.2rem;
        --box-shadow: 0 2rem 3rem var(--clr-light);

    }

    /*
dark theme
.dark-theme-variables {
  --clr-color-background: #181a1e;
  --clr-white: #202528;
  --clr-light: rgba(0, 0, 0, 0.4);
  --clr-dark: #edeffd;
  --clr-dark-variant: #677483;
  --box-shadow: 0 2rem 3rem var(--clr-light) */

    body {
        min-height: 100vh;
        overflow-x: hidden;
    }

    .conatiner {
        position: relative;
        width: 100%;

    }

    .navigation {
        position: fixed;
        width: 300px;
        height: 100%;
        background: var(--blue);
        border-left: 10px solid var(--blue);
        transition: 0.5s;
        overflow: hidden;

    }

    .navigation.active {
        width: 80px;
    }

    .navigation ul {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
    }

    .navigation ul li {
        position: relative;
        width: 100%;
        list-style: none;
        border-top-left-radius: 30px;
        border-bottom-left-radius: 30px;
    }

    .navigation ul li:hover,
    .navigation ul li.hovered {
        background: var(--white);
        /* it is not in video */
        /* pointer-events: none; */
    }

    .navigation ul li:nth-child(1) {
        margin-bottom: 40px;
    }

    .navigation ul li a {
        position: relative;
        display: block;
        width: 100%;
        display: flex;
        text-decoration: none;
        color: var(--white);
    }

    .navigation ul li:hover a,
    .navigation ul li.hovered a {
        color: var(--blue);
    }

    .navigation ul li a .icon,
    .navigation ul li a .i {
        position: relative;
        display: block;
        min-width: 60px;
        height: 60px;
        line-height: 70px;
        text-align: center;
    }

    .navigation ul li a .icon ion-icon,
    .navigation ul li a .icon i {
        font-size: 1.75rem;

    }

    .navigation ul li a .title {
        position: relative;
        display: block;
        padding: 0 10px;
        height: 60px;
        line-height: 60px;
        text-align: start;
        white-space: nowrap;
    }

    /* curve outside */

    .navigation ul li:hover a::before,
    .navigation ul li.hovered a::before {
        content: '';
        position: absolute;
        right: 0;
        top: -50px;
        width: 50px;
        height: 50px;
        background: transparent;
        border-radius: 50%;
        box-shadow: 35px 35px 0 10px var(--white);
        pointer-events: none;

    }


    .navigation ul li:hover a::after,
    .navigation ul li.hovered a::after {
        content: '';
        position: absolute;
        right: 0;
        bottom: -50px;
        width: 50px;
        height: 50px;
        background: transparent;
        border-radius: 50%;
        box-shadow: 35px -35px 0 10px var(--white);
        pointer-events: none;

    }


    /* main */
    .main {
        position: absolute;
        width: calc(100% - 300px);
        left: 300px;
        min-height: 100vh;
        background: var(--clr-color-background);
        transition: 0.5s;
    }

    .main.active {
        width: calc(100% - 80px);
        left: 80px;

    }

    .topbar {
        width: 100%;
        height: 60px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 10px;
    }

    .toggle {
        position: relative;
        /* top: 0; */
        width: 60px;
        height: 60px;
        /* background: #ccc; */
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 2.5rem;
        cursor: pointer;

    }

    .search {
        --search-height: 44px;
        --search-icon-size: 18px;
        --search-padding: 16px;
        --search-radius: 24px;
        --search-icon-color: #555;
        --search-bg: #fff;
        --search-border: 1px solid #e0e0e0;
        --search-focus-border: 1px solid #4285f4;
        --search-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        --search-focus-shadow: 0 2px 8px rgba(66, 133, 244, 0.2);
        position: relative;
        width: 100%;
        max-width: 400px;
        margin: 0 auto;
        margin-top: 20px;
    }

    .search-label {
        position: relative;
        display: block;
        width: 100%;
    }

    .search-input {
        width: 100%;
        height: var(--search-height);
        border-radius: var(--search-radius);
        padding: 0 var(--search-padding) 0 calc(var(--search-padding) * 2 + var(--search-icon-size));
        font-size: 1rem;
        border: var(--search-border);
        background: var(--search-bg);
        box-shadow: var(--search-shadow);
        transition: all 0.3s ease;
    }

    .search-input:focus {
        outline: none;
        border: var(--search-focus-border);
        box-shadow: var(--search-focus-shadow);
    }

    

    .search-icon {
        position: absolute;
        left: var(--search-padding);
        top: 40%;
        transform: translateY(-50%);
        color: var(--search-icon-color);
        font-size: var(--search-icon-size);
        pointer-events: none;
    }

    

    /* Responsive adjustments */
    @media (max-width: 480px) {
        .search {
            max-width: 100%;
            padding: 0 12px;
        }

        .search-input {
            padding-left: 44px;
        }
    }

    .user {
        position: relative;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        overflow: hidden;
        cursor: pointer;
    }

    .user img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }


    .card-headers {
        background: linear-gradient(135deg, #0052D4, #4364F7, #6FB1FC);
        /* background: linear-gradient(#0052D4, #375687); */
        color: white;
        border-radius: 50px 50px 50px 50px;
        margin-left: 20px;
        margin: 10px;

    }



    /* User dropdown styles - FIXED */
    .dropdown-content {
        display: none;
        position: absolute;
        right: 0;
        top: 50px;
        background-color: #fff;
        min-width: 260px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12);
        border-radius: 12px;
        z-index: 100;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.1);
        overflow: hidden;
        opacity: 0;
        transform: translateY(-10px);
    }

    .dropdown-content.active {
        display: block;
        opacity: 1;
        transform: translateY(0);
    }

    .dropdown-header {
        padding: 15px 20px;
        display: flex;
        align-items: center;
        background: rgb(9, 74, 218);
        color: white;
        border-radius: 8px 8px 0 0;
        box-shadow: 0 4px 15px rgba(106, 17, 203, 0.3);
    }

    .dropdown-avatar {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background-color: white;
        display: flex;
        color: black;
        align-items: center;
        justify-content: center;
        margin-right: 12px;
        font-weight: bold;
        font-size: 26px;
    }

    .dropdown-user-info h4 {
        margin: 0;
        font-size: 15px;
    }

    .dropdown-user-info p {
        margin: 3px 0 0;
        font-size: 13px;
        opacity: 0.8;
    }

    .dropdown-divider {
        height: 1px;
        background: rgba(0, 0, 0, 0.08);
        margin: 4px 0;
    }

    .dropdown-menu {
        padding: 8px 0;
    }

    .dropdown-item {
        display: flex;
        align-items: center;
        padding: 12px 20px;
        color: #444;
        text-decoration: none;
        transition: all 0.2s ease;
        font-size: 14px;
    }

    .dropdown-item i {
        width: 24px;
        margin-right: 12px;
        text-align: center;
        color: #666;
        font-size: 15px;
    }

    .dropdown-item:hover {
        background: #f8f9ff;
        color: #3a56e9;
    }

    .dropdown-item:hover i {
        color: #3a56e9;
    }

    .dropdown-item.logout {
        color: #ff4d4f;
    }

    .dropdown-item.logout i {
        color: #ff4d4f;
    }

    .dropdown-item.logout:hover {
        background: #fff0f0;
    }

    .user-wrapper {
        position: relative;
        margin-right: 20px;
    }

    .user {
        cursor: pointer;
        transition: transform 0.2s;
    }

    .user:hover {
        transform: scale(1.05);
    }

    .user img {
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #e0e7ff;
    }
</style>
</head>

<body>

    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <img src="{{ asset('logo2.png') }}" alt="Logo" height="50px" width="50px">
                        </span>
                        <span class="title">𝑻𝒆𝒄𝒉 𝑮𝒂𝒅𝒈𝒆𝒕𝒔 </span>
                    </a>
                </li>

                <li>
                    <a href="/home">
                        <span class="icon"><i class="fas fa-tachometer-alt"></i></span>
                        <span class="title">DashBoard</span>
                    </a>
                </li>


                <li>
                    <a href="/category">
                        <span class="icon"><i class="fas fa-table"></i></span>
                        <span class="title">Category</span>
                    </a>
                </li>

                <li>
                    <a href="/product">
                        <span class="icon"><i class="fa-brands fa-product-hunt"></i></span>
                        <span class="title">Products</span>
                    </a>
                </li>

                <li>
                    <a href="/banner">
                        <span class="icon"><i class="fa-solid fa-image"></i></span>
                        <span class="title">Banner</span>
                    </a>
                </li>

                <li>
                    <a href="/coupon">
                        <span class="icon"><i class="fa-solid fa-ticket"></i></span>
                        <span class="title">Coupon</span>
                    </a>
                </li>

                <li>
                    <a href="/store">
                        <span class="icon"><i class="fa-solid fa-store"></i></span>
                        <span class="title">Store</span>
                    </a>
                </li>

                <li>
                    <a href="/blog">
                        <span class="icon"><i class="fa-solid fa-panorama"></i></span>
                        <span class="title">Blog</span>
                    </a>
                </li>



                <li>
                    <a href="/order">
                        <span class="icon"><i class="fa-solid fa-database"></i></span>
                        <span class="title">Orders</span>
                    </a>
                </li>

                <li>
                    <a href="/users">
                        <span class="icon"><i class="fa-solid fa-users"></i></span>
                        <span class="title">User</span>
                    </a>
                </li>


                <li>
                    <a href="/logout">
                        <span class="icon"><i class="fa-solid fa-right-from-bracket"></i></span>
                        <span class="title">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main">

            <div class="card-headers">
                <div class="topbar">

                    <div class="toggle">
                        <span class="icon"><i class="fa-solid fa-bars fa-2xs"></i></span>
                    </div>
                    <form action="/search" method="POST">
                        @csrf
                        <div class="search">
                            <label for="search-input" class="search-label">
                              
                                <input id="search-input" type="text" name="query" placeholder="Search Here"
                                    class="search-input" aria-label="Search">
                            </label>

                            <button type="submit" class="search-btn" title="search">
                                <i class="search-icon fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </form>




                    @php
                        $user = Session::get('user');
                    @endphp

                    <div class="user-wrapper">
                        <div class="user" id="user-toggle">
                            @if ($user->pic==null)
                            <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&h=100&q=80"
                            alt="User" height="40" width="40">
                            @else
                            <img src="{{ $user->pic  }}"
                            alt="User" height="40" width="40">
                            @endif
                           
                        </div>

                        <div class="dropdown-content" id="user-dropdown">
                            <div class="dropdown-header">
                                <div class="dropdown-avatar">{{ strtoupper(substr($user->username, 0, 1)) }}</div>
                                <div class="dropdown-user-info">
                                    <h4>{{ $user->username }}</h4>
                                    <p>{{ $user->email }}</p>
                                </div>
                            </div>

                            <div class="dropdown-menu">
                                <div class="dropdown-divider"></div>
                                <a href="/editprofile" class="dropdown-item">
                                    <i class="fas fa-user-edit"></i>
                                    <span>Edit Profile</span>
                                </a>
                               
                                <a href="/ch_pass" class="dropdown-item">
                                    <i class="fas fa-key"></i>
                                    <span>Change Password</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                
                                <div class="dropdown-divider"></div>
                                <a href="/logout" class="dropdown-item logout">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>





            </div>

            <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

            <script>
                // Toggle sidebar functionality
                // Select elements needed for sidebar toggle
                let toggle = document.querySelector('.toggle');
                let navigation = document.querySelector('.navigation');
                let main = document.querySelector('.main');

                // Add click event to toggle button
                toggle.onclick = function() {
                    // Toggle 'active' class on navigation (sidebar) and main content area
                    navigation.classList.toggle('active');
                    main.classList.toggle('active');
                }

                // Navigation item hover effect
                // Select all list items in the navigation
                let list = document.querySelectorAll('.navigation li');

                // Function to handle active/hover state
                function activeLink() {
                    // Remove 'hovered' class from all navigation items
                    list.forEach((item) => item.classList.remove('hovered'));
                    // Add 'hovered' class to the currently hovered item
                    this.classList.add('hovered');
                }

                // Add mouseover event to each navigation item
                list.forEach((item) => item.addEventListener('mouseover', activeLink));

                // User dropdown toggle functionality
                // Select user toggle button and dropdown elements
                const userToggle = document.getElementById('user-toggle');
                const userDropdown = document.getElementById('user-dropdown');

                // Add click event to user toggle button
                userToggle.addEventListener('click', function(e) {
                    // Prevent event from bubbling up to document
                    e.stopPropagation();
                    // Toggle 'active' class on dropdown
                    userDropdown.classList.toggle('active');
                });

                // Close dropdown when clicking outside
                document.addEventListener('click', function(e) {
                    // Check if click is outside both the toggle button and dropdown
                    if (!userToggle.contains(e.target) && !userDropdown.contains(e.target)) {
                        // Remove 'active' class to hide dropdown
                        userDropdown.classList.remove('active');
                    }
                });
            </script>
