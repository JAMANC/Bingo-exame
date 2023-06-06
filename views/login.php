<!-- login.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <style>



    </style>
</head>

<body class="bg-secondary text-white">
<div style="margin-top:10rem">
  

        <h1 class="text-center ">Login Page</h1>

        <form class="container-fluid" method="POST" onsubmit="login()" >
            <div class="row justify-content-center">
                <div class="col-4">

                    <div class="form-group my-4">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                            placeholder="Enter email" require>
                        <small id="emailHelp" class="form-text text-dark">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <div class="form-group my-4">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" required>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="check">
                        <label class="form-check-label" for="check">Remind me</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>


  
</div>
    

<script src="js/scripts.js"></script>
</body>

</html>