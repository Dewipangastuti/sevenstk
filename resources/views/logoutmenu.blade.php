<div class="dropdown">
                <img src="/assets/img/pict_foto.svg" alt="">
                <img src="/assets/img/dropdown.svg" alt="" class="dropbtn">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <div class="dropdown-content">
                    <a href="profil">PROFILE</a>
                    <a href="#" id="btn-logout-api" class="logout">LOGOUT</a>
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
            
                        $("#btn-logout-api").click(function (response) {
            
                                $.ajax({
                                    url: "http://127.0.0.1:8000/api/stocks/logout",
                                    type: "POST",
                                    dataType: "JSON",
                                    cache: false,
            
                                    success: function (response) {
            
                                        if (response.success) {
            
                                            Swal.fire({
                                                    type: 'success',
                                                    title: 'Logout Berhasil!',
                                                    text: 'Anda akan di arahkan dalam 3 Detik',
                                                    timer: 1000,
                                                    showCancelButton: false,
                                                    showConfirmButton: false
                                                })
                                                .then(function () {
                                                    window.location.href =
                                                        "http://127.0.0.1:8000/login";
                                                });
            
                                        } else {
            
                                            console.log(response.success);
            
                                            Swal.fire({
                                                type: 'error',
                                                title: 'Logout Gagal!',
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
                            });
                        });
            
                </script>
            </div>
