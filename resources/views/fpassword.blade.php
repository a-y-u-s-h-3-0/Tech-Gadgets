<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet"/>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"/>

  <link rel="stylesheet" href="forgot.css" />

  <title>Forgot Password | Tech Gadgets</title>


</head>

<body>
  
  
  <div class="container">

    <div class="forms-container">

        <div class="forgot">

            <form action="/forgot_password" method="POST" class="forgot-form">
              @csrf
                <h2 class="title">Forgot Password</h2>
                

                <div class="input-field">

                    <i class="fas fa-user"></i>

                    <input type="text" name="username" placeholder="Enter Your Username" />

                </div>


                <select id="sec_que" name="sec_que" class="input-field">

                  <option value="" disabled selected>Select Security Question</option>
                  <option value="surname">What is your surname?</option>
                  <option value="pet">What is your pet's name?</option>
                  <option value="birth-city">What is the name of the city you were born in?</option>
                  <option value="school">What is the name of your first school?</option>
              </select>




              <div class="input-field">

                  <i class="fa-solid fa-key"></i>

                  <input type="text" name="answer" placeholder="Answer" />

              </div>


                

                <button type="submit" value="forgot" class="btn solid btn-53">Submit</button>

            
            </form>

        </div>
    </div>
  </div>


  <div class="panels-container">

    <div class="panel left-panel">

      <div class="content">

        <h3>Tech Gadgets</h3>

        <p>
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
          ex ratione. Aliquid!
        </p>

        <button class="btn transparent" id="forgot-btn">

          Forgot
        </button>

      </div>

      <img src="forgot-1.svg" class="image" alt=""  />

    </div>

  </div>






</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

          @if (Session::get('success'))
          <script>
            Swal.fire({
              icon: "success",
              title: "Success!",
              text: "{{ Session::get('success') }}",
            });
          </script>
          @endif

</html>