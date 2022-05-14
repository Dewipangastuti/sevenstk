<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,500&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/assets/css/LoginView.css" rel="stylesheet">
    <title>Seven Stock</title>
    <style>

    </style>

</head>
<body>

    <div class="login-box">
        <img src="/assets/img/logo.svg" alt="">
        <h1 id="caracter">SEVEN STOCK</h1>

        <div id="content">
            <div class="lb-1">
                <a href="login">Login</a>
            </div>

            <div class="lb-2">
                <a href="register">Create Account</a>
            </div>
        </div>


        <form class="email-login">
            <div class="u-form-group">
                <input type="email" class="form-control" id="email" placeholder="Username" />
            </div>
            <div class="u-form-group">
                <input type="password" class="form-control" id="password" placeholder="Password" />
            </div>
            <div class="u-form-group">
                <button type="button" id="btn-login-api">Login</button>
            </div>
            <div class="u-form-group">
                <a href="forgotpw" class="forgot-password">Forgot password?</a>
            </div>
        </form>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#btn-login-api").click(function (response) {

                var email = $("#email").val();
                var password = $("#password").val();

                if (email.length == "") {

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Alamat Email Wajib Diisi !'
                    });

                } else if (password.length == "") {

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Password Wajib Diisi !'
                    });

                } else {

                    $.ajax({
                        url: "http://127.0.0.1:8000/api/stocks/auth",
                        type: "POST",
                        dataType: "JSON",
                        cache: false,
                        data: {
                            "email": email,
                            "password": password
                        },

                        success: function (response) {

                            if (response.success) {

                                Swal.fire({
                                        type: 'success',
                                        title: 'Login Berhasil!',
                                        text: 'Anda akan di arahkan dalam 3 Detik',
                                        timer: 1000,
                                        showCancelButton: false,
                                        showConfirmButton: false
                                    })
                                    .then(function () {
                                        window.location.href =
                                            "http://127.0.0.1:8000/home";
                                    });

                            } else {

                                console.log(response.success);

                                Swal.fire({
                                    type: 'error',
                                    title: 'Login Gagal!',
                                    text: 'silahkan coba lagi!'
                                });

                            }

                            console.log(response);

                        },

                        error: function (response) {

                            Swal.fire({
                                type: 'error',
                                title: 'Opps!',
                                text: 'server error!'
                            });

                            console.log(data);

                        }

                    });

                }

            });

        });

    </script>
</body>

</html>
