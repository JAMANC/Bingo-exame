<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            // Handle form submission using AJAX
            $('#login-form').submit(function (event) {
                event.preventDefault(); // Prevent default form submission

                // Get the form data
                var formData = $(this).serialize();

                // Send an AJAX request to login_controller.php
                $.ajax({
                    type: 'POST',
                    url: 'controllers/LoginController.php',
                    data: formData,
                    success: function (response) {
                        if (response === 'success') {
                            // Redirect to home page on successful login
                          //alert('Successfully sign in')
                          window.location.reload()
                        window.location.href = window.location.origin+"/exame";
                        
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

<body class="bg-secondary text-white">
    <div style="margin-top: 10rem">
        <h1 class="text-center">Login Page</h1>

        <form id="login-form" class="container-fluid" method="POST">
            <div class="row justify-content-center">
                <div class="col-4">
                    <div class="form-group my-4">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                            placeholder="Enter email" name="email" required>
                        <small id="emailHelp" class="form-text text-dark">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <div class="form-group my-4">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password"
                            name="password" required>
                    </div>
                    <div class="form-group text-end">
                    <a href="/exame/registration" class="text-info">Register here</a>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>

    <script src="js/scripts.js"></script>
</body>

</html>