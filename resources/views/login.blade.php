<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />



    <link rel="stylesheet" href="login.css" />

    <title>Sign in & Sign up Form</title>

</head>

<body>

    <div class="container">

        <div class="forms-container">

            <div class="signin-signup">

                <form action="/login" method="post" class="sign-in-form">
                    @csrf
                    <h2 class="title">Sign in</h2>

                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <div class="input-wrapper">
                            <input type="text" name="username" placeholder="Enter Your Username:" />
                            @error('username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <div class="input-error-wrapper">
                            <input type="password" name="password" placeholder="Enter Your Password:" />
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-check form-check-lg d-flex align-items-end " style="margin-top: 30px;">
                        <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label text-gray-600" for="flexCheckDefault">
                            Keep me logged in
                        </label>
                    </div>

                    <button type="submit" value="Login" class="btn solid">Login</button>

                    <div class="linkTxt animation">
                        <p>Already have an account? <a href="#" class="login-link">Register Now</a></p>

                        <br>
                        <p><a href="/forgot_pass" class="login-link w-24">Forgot Password ?</a></p>

                    </div>


                    <p class="social-text">Or Sign in with social platforms</p>

                    <div class="social-media">

                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-google"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>

                    </div>

                    {{-- <p>Already Have An Account? <a href="#" class="">Sign Up</a></p>

                        <div>
                            <a href="">Forgot Password</a>
                        </div> --}}




                </form>




                <form action="/register" method="post" class="sign-up-form">
                    @csrf

                    <h2 class="title">Sign Up</h2>

                    <div class="input-field">

                        <i class="fas fa-user"></i>
                        <div class="input-wrapper">

                            <input type="text" name="username" placeholder="Username" />
                            <span class="text-danger">
                                @error('username')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                    </div>

                    <div class="input-field">

                        <i class="fa-solid fa-envelope"></i>

                        <div class="input-wrapper">

                            <input type="email" name="email" placeholder="Email" />
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                    </div>

                    <div class="input-field">

                        <i class="fas fa-phone"></i>
                        <div class="input-wrapper">

                            <input type="tel" name="mobile" placeholder="Mobile No" />
                            <span class="text-danger">
                                @error('mobile')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                    </div>

                    <div class="input-field">

                        <i class="fas fa-lock"></i>
                        <div class="input-wrapper">

                            <input type="password" name="password" placeholder="Password" />
                            <span class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                    </div>

                    <div class="input-field">

                        <i class="fas fa-lock"></i>

                        <div class="input-wrapper">

                            <input type="password" name="cpassword" placeholder="Confirm Password" />
                            <span class="text-danger">
                                @error('cpassword')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                    </div>

                    {{-- <i class="fa-solid fa-circle-question"></i> --}}

                    <select id="sec_que" name="sec_que" class="input-field">

                        <option value="" disabled selected>Select Security Question</option>
                        <option value="surname">What is your surname?</option>
                        <option value="pet">What is your pet's name?</option>
                        <option value="birth-city">What is the name of the city you were born in?</option>
                        <option value="school">What is the name of your first school?</option>
                    </select>




                    <div class="input-field">

                        <i class="fa-solid fa-key"></i>
                        <div class="input-wrapper">

                            <input type="text" name="answer" placeholder="Answer" />
                            <span class="text-danger">
                                @error('answer')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <button type="submit" class="btn">Sign Up</button>

                    <div class="linkTxt animation">
                        <p>Already have an account? <a href="#" class="login-link">Register Now</a></p>


                    </div>

                </form>



            </div>

        </div>

        <div class="panels-container">

            <div class="panel left-panel">

                <div class="content">

                    <h3>Tech Gadgets</h3>

                    <p>Sign in to explore the latest in tech gadgets, smart solutions, and next-<br>gen tools designed to
                        make your life easier and smarter.</p>
                    <button class="btn transparent" id="sign-up-btn">Sign up</button>

                </div>

                <img src="log.svg" class="image" alt="Login Illustration" />

            </div>

            <div class="panel right-panel">

                <div class="content">

                    <h3>Tech Gadgets</h3>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum laboriosam ad deleniti.</p>

                    <button class="btn transparent" id="sign-in-btn">Sign in</button>

                </div>

                <img src="register.svg" class="image" alt="Register Illustration" />

            </div>

        </div>

    </div>

    <script src="app.js"></script>

</body>

</html>
