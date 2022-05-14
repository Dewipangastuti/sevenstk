<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="logo.png">
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,500&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/assets/css/inputView.css" rel="stylesheet">
    <title>Seven Stock</title>
</head>


<body>

    <div class="container">
    <div class="input-box">
    <form action="stock">

        <div class="row">
            <div class="col-25">  
                <img id="in" src="/assets/img/input.svg" alt=""> 
            </div>
            <div class="col-75">
                <h1 id="caracter">             
                    INPUT DATA</h1>
            
            </div>
        </div>


    <div class="row">
      <div class="col-25">
        <label for="product-name">PRODUCT NAME</label>
        <input type="text" id="product-name" name="p-name" placeholder="Product Name..">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="id-p">TYPE PRODUCT</label>
        <input type="text" id="type-p" name="type-pr" placeholder="Type Product..">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="color-p">COLOR</label>
        <input type="text" id="color-p" name="color-pr" placeholder="Color..">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="size-p">SIZE</label>
        <input type="text" id="size-p" name="size-pr" placeholder="Size..">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="model-p"> MODEL</label>
        <input type="text" id="model-p" name="model-pr" placeholder="Model..">
      </div>
    </div>


    <div class="row">
      <div class="col-25">
        <label for="point-p">POINT</label>
        <input type="text" id="point-p" name="point-pr" placeholder="Point..">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="sku-p">SKU CODE</label>
        <input type="text" id="sku-p" name="sku-pr" placeholder="Sku code..">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="stock-p">STOCK</label>
        <input type="text" id="stock-p" name="stock-pr" placeholder="Stock..">
      </div>
    </div>

        <div class="">
        <button type="reset"><a href="stocks">CANCEL</a></button>
        <button type="submit">SAVE</button>
        </div>
  </form>
</div>
</div>
</body>
</html>