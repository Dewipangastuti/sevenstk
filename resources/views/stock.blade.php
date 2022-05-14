@extends("app")


<div id="conntenerr" class="row">

    @include('side_stock')

    <div class="col-12 ">
        <div id="nav" class="row">
            <h1>SEVEN STOCK</h1>
            @include('logoutmenu')
        </div>

        <div id="mencari">
            <form action="" method="GET">
                <input type="text" name="search" id="search" placeholder="Search..." class="form-control">
            </form>
            <td>
                <button id="klik" class="item2" >  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg></button>

                <button id="input-data"> <a href="input"><img id="in" src="/assets/img/plus.svg" alt=""> ADD</a></button>

            </td>


        </div>


        <div id="tabel" class="row">
            <table class="table">
                <thead id="include">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Jenis Produk</th>
                        <th scope="col">Warna </th>
                        <th scope="col">Ukuran</th>
                        <th scope="col">Model</th>
                        <th scope="col">Poin</th>
                        <th scope="col">Kode SKU</th>
                        <th scope="col">STOCK</th>
                    </tr>
                </thead>


                <tbody id='output'>



                </tbody>
            </table>
            <span>
                {{ $produk->links() }}
            </span>


            <!-- ajax/js -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
                integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
                crossorigin="anonymous"></script> 

            <!-- integrasi dengan ajax -->
            <script>
                $('#include').ready(function (e) {
                    $.ajax({
                        url: 'http://127.0.0.1:8000/api/stocks',
                        type: 'GET',
                        dataType: 'json',
                        success: function (e) {
                            console.log(e),
                                console.log(e.produk.backup); 

                            for (let i = 0; i < e.backup.length; i++) {
                                const element = e.backup[i];

                                console.log(element);
                                $('#output').append("<tr><th>" + i + "</th><td>" + e.backup[i]
                                    .product +
                                    "</td><td>" + e.backup[i].value_name + "</td><td>" + e
                                    .backup[i].warna +
                                    "</td><td>" + e.backup[i].optionvalue[0].s + "</td><td>" + e.backup[i]
                                    .optionvalue[0].m + "</td><td>"+ e.backup[i].optionvalue[0].l + "</td><td>" + e.backup[i]
                                    .optionvalue[0].xl + "</td><td>" + e.backup[i].optionvalue[0].xxl +"</td><td>"+ e.backup[i]
                                    .model +"</td><td>" + e.backup[i].sku[0].poin + "</td><td>" + e.backup[i]
                                    .sku[0].sku + "</td><td>" + e.backup[i].sku[0].stock + "</td></tr>");
                            }
                        },
                        error: function () {
                            console.log('error');
                        }
                    });
                });

            </script>
             <script>
                $('#klik').click(function () {
                    var search = $('#search').val();

                    // $('output').empty();
                    $.ajax({
                        type: "GET",
                        url: "http://127.0.0.1:8000/api/stocks?cari=" + search,
                        // data: myusername,
                        // cache: false,
                        success: function (e) {
                            $('#output').empty()
                            let no = 1;
                            for (let i = 0; i < e.backup.length; i++) {
                                const element = e.backup[i];

                                console.log(e),
                                    console.log(e.produk.backup);


                                $('#output').append(`<tr>
                        <th> ${no++} </th> 
                        <td> ${ e.backup[i].product} </td>
                        <td>  ${e.backup[i].value_name} </td>
                        <td>  ${e.backup[i].warna} </td>
                        <td> ${e.backup[i].optionvalue[0].s} </td>
                        <td> ${e.backup[i].optionvalue[0].m} </td>
                        <td> ${e.backup[i].optionvalue[0].l} </td>
                        <td> ${e.backup[i].optionvalue[0].xl} </td>
                        <td> ${e.backup[i].optionvalue[0].xxl} </td>
                        <td>  ${e.backup[i].model}  </td>
                        <td>  ${e.backup[i].sku[0].poin} </td>
                        <td> ${e.backup[i].sku[0].sku} </td>
                        <td> ${e.backup[i].sku[0].stock} </td>
                        </tr>`);
                            }
                        },
                        error: function () {
                            console.log('error');
                        }
                    });
                });
            </script>
        </div>
    </div>
</div>
