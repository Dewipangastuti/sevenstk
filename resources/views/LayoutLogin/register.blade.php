<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="favicon.ico">
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,500&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/assets/css/RegisterView.css" rel="stylesheet">
    <title>Seven Stock</title>

    <style>


    </style>
</head>

<body>

    <div class="login-box">
        <img src="/assets/img/logo.svg" alt="">
        <h1>SEVEN STOCK</h1>


        <div class="lb-1">
            <a href="login">Login</a>
        </div>


        <div class="lb-2">
            <a href="register">Create Account</a>
        </div>



        <form class="email-login">
            <div class="u-form-group">
                <input type="text" class="form-control" id="name" placeholder="Username" />
            </div>
            <div class="u-form-group">
                <input type="email" class="form-control" id="email" placeholder="Email" />
            </div>
            <div class="u-form-group">
                <input type="password" class="form-control" id="password" placeholder="Password" />
            </div>
            <div class="u-form-group">
                <input type="password" class="form-control" id="double_password" placeholder="Konfirm Password" />
            </div>
            <div class="u-form-group">
                <button type="button" id="btn-register-api">Create Account</button>
            </div>
            <div class="u-form-group">
                <a href="login" class="have-ac">Already have account?</a>
            </div>
        </form>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

    <script>
    $(document).ready(function() {
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        $("#btn-register-api").click( function(response) {

            var name = $("#name").val();
            var email    = $("#email").val();
            var password = $("#password").val();
            var double_password = $("#double_password").val();

            if (name.length == "") {

                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Nama Wajib Diisi !'
                });

            } else if(email.length == "") {

                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Alamat Email Wajib Diisi !'
                });

            } else if(password.length == "") {

                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Password Wajib Diisi !'
                });
            } else if(password != double_password) {

                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Password Harus Sama !'
                });
            } else {

                //ajax
                $.ajax({

                    url: "http://127.0.0.1:8000/api/stocks/reg",
                    type: "POST",
                    dataType: "JSON",
                    cache: false,
                    data: {
                        "name": name,
                        "email": email,
                        "password": password
                    },

                    success:function(response){

                        if (response.success) {

                            Swal.fire({
                                type: 'success',
                                title: 'Register Berhasil!',
                                text: 'silahkan login!'
                                
                                    })
                                    .then(function () {
                                        window.location.href =
                                            "http://127.0.0.1:8000/login";
                                    });


                        } else {

                            Swal.fire({
                                type: 'error',
                                title: 'Register Gagal!',
                                text: 'silahkan coba lagi!'
                            });

                        }

                        console.log(response);

                    },

                    error:function(response){
                        Swal.fire({
                            type: 'error',
                            title: 'Opps!',
                            text: 'server error!'
                        });
                    }

                })

            }

        });
    });
</script>
    </div>
</body>
</html>
