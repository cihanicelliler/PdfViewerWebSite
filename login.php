<?php require_once('sql.php') ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MakeBetter | Login</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">Log <br>In</h1>

        </div>
        <h3>Welcome to MakeBetter</h3>
        <p>Login in. To see it in action.</p>

        <div class="form-group">
            <input id="emailLogin" type="email" class="form-control" placeholder="Email" required="">
        </div>
        <div class="form-group">
            <input id="passwordLogin" type="password" class="form-control" placeholder="Password" required="">
        </div>
        <button type="submit" onclick="loginUser()" class="btn btn-primary block full-width m-b">Login</button>

        <p class="text-muted text-center"><small>Do not have an account?</small></p>
        <a class="btn btn-sm btn-white btn-block" href="register.php">Create an account</a>

    </div>
</div>

<!-- Mainly scripts -->
<script src="assets/js/jquery-3.1.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/plugins/sweetalert/sweetalert.min.js"></script>
<script>
    function loginUser(){
        let email = $('#emailLogin').val()
        let password = $('#passwordLogin').val()
        $.ajax({
            url: "api/getUser.php",
            type: 'POST',
            data: {
                email: email,
                password: password,
            },
            success: function (response) {
                swal({
                    title: "Good job!",
                    text: "You logged in successfully!",
                    type: "success"
                },function () {
                    window.location.href = 'index.php';
                });
            },
            error: function (response){
                swal("Not Recognized", "Email or Password is incorrect!", "error");
            }
        });
    }
</script>
</body>

</html>
