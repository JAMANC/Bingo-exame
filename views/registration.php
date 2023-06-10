<!-- registration.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

    <!-- JS AJAX -->
    <script>
    $(document).ready(function() {
        // Handle form submission using AJAX
        $('#registration-form').submit(function(event) {
            event.preventDefault(); // Prevent default form submission

            // Get the form data
            var formData = $(this).serialize();

            // Send an AJAX request to login_controller.php
            $.ajax({
                type: 'POST',
                url: 'controllers/RegistrationController.php',
                data: formData,
                success: function(response) {
                    if (response === 'success') {
                        // Redirect to home page on successful login
                        //alert('Successfully sign in')
                        window.location.reload()
                        window.location.href = window.location.origin + "/exame";

                    } else {
                        // Display error message on unsuccessful login
                        alert(response);
                    }
                }
            });
        });
    });
    </script>
</head>

<body>
    <div class="container" style="margin-top: 10rem">
        <div class="card bg-secondary align-items-center ">
            <div class="card-body " style="width: 30rem;">
                <h4 class="card-title mt-3 text-center text-white">Create Account</h4>
                <p class="text-center text-white">Get started with your free account</p>

                <form id="registration-form" method="POST" onsubmit="return validateRegistrationForm()" action="register">
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input id="firstname" name="firstname" class="form-control" placeholder="First name"
                            type="text" required>
                        <input id="lastname" name="lastname" class="form-control" placeholder="Last name" type="text" required>
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        </div>
                        <input id="email" name="email" class="form-control" placeholder="Email address" type="email" required>
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                        </div>
                        <select class="custom-select" style="max-width: 120px;">
                            <option selected="">+245</option>
                            <option value="1">+221</option>
                            <option value="2">+198</option>
                            <option value="3">+701</option>
                        </select>
                        <input name="phone" id="phone" class="form-control" placeholder="Phone number" type="text" required>
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input id="password" name="password" class="form-control" placeholder="Create password"
                            type="password" required>
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input id="repeat-password" name="repeat-password" class="form-control"
                            placeholder="Repeat password" type="password" required>
                    </div> <!-- form-group// -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block"> Create Account </button>
                    </div> <!-- form-group// -->
                    <p class="text-center text-white">Have an account? <a href="../index.php">Log In</a> </p>
                </form>
                </article>
            </div> <!-- card.// -->

        </div>
        <!--container end.//-->
        <script src="js/scripts.js"></script>
</body>

</html>