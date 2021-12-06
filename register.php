<?php require_once('sql.php') ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MakeBetter | Register</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen   animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name" style="font-size:100px">Reg<br>is<br>ter</h1>

        </div>
        <h3>Register to MakeBetter</h3>
        <p>Create account to see it in action.</p>

        <div class="form-group">
            <input id="nameRegister" type="text" class="form-control" placeholder="Name" required="">
        </div>
        <div class="form-group">
            <input id="emailRegister" type="email" class="form-control" placeholder="Email" required="">
        </div>
        <div class="form-group">
            <input id="passwordRegister" type="password" class="form-control" placeholder="Password" required="">
        </div>
        <button type="submit" onclick="registerUser()" class="btn btn-primary block full-width m-b">Register</button>

        <p class="text-muted text-center"><small>Already have an account?</small></p>
        <a class="btn btn-sm btn-white btn-block" href="login.php">Login</a>

    </div>
</div>

<!-- Mainly scripts -->
<script src="assets/js/jquery-3.1.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/plugins/sweetalert/sweetalert.min.js"></script>
<script>
    function registerUser(){
        let name = $('#nameRegister').val()
        let email = $('#emailRegister').val()
        let password = $('#passwordRegister').val()
        $.ajax({
            url: "api/addUser.php",
            type: 'POST',
            data: {
                name: name,
                email: email,
                password: password,
            },
            success: function (response) {
                swal({
                    title: "Good job!",
                    text: "You registered successfully!",
                    type: "success"
                },function () {
                    window.location.href = 'login.php';
                });
            }
        });
    }
</script>
</body>

</html>
