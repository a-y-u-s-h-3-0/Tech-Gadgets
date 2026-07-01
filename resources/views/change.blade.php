<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />

    <link rel="stylesheet" href="change.css" />

    <title>Confirm Password | Tech Gadgets</title>


</head>

<body>

    @php
        $user = Session::get('user');
    @endphp
    <div class="container">

        <div class="forms-container">
            <div class="forgot">

                <form action="/reset_password" method="POST" class="change-form">
                    @csrf
                    <h2 class="title">Change Password</h2>
                    <div class="input-field">

                        <i class="fas fa-user"></i>

                        <input type="text" name="username" placeholder="Enter Your Username" value="{{$username}}" readonly/>

                    </div>


                    <div class="input-field">

                        <i class="fa-solid fa-key"></i>

                        <input type="text" name="password" placeholder="Enter Password" />

                    </div>




                    <div class="input-field">

                        <i class="fa-solid fa-key"></i>

                        <input type="text" name="cpassword" placeholder="Enter Confirm-Password" />

                    </div>




                    <button type="submit" value="change" class="btn solid btn-53">Change</button>


                </form>

            </div>
        </div>
    </div>


    <div class="panels-container">

        <div class="panel left-panel">

            <div class="content">

                <h3>Tech Gadgets</h3>

                <p class="mb-5"> Your data that you entered during registration.</p>



                <button class="btn transparent" id="change-btn">

                    Change
                </button>

            </div>

            <img src="change.svg" class="image" alt="" />

        </div>

    </div>






</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
<!--
          @if (Session::get('success'))
<script>
    Swal.fire({
        icon: "success",
        title: "Success!",
        text: "{{ Session::get('success') }}",
    });
</script>
@endif
 -->

</html>
