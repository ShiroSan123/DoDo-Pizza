<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>DODO</title>
  </head>
  <body>
    <?php 
        $con = mysqli_connect('127.0.0.1','root','','DoDoPizza');
        $query_catalog_pizza = mysqli_query($con, "SELECT * FROM catalog WHERE category='pizza' ");
        $query_catalog_desert = mysqli_query($con, "SELECT * FROM catalog WHERE category='desert' ");
        $query_catalog_drink = mysqli_query($con, "SELECT * FROM catalog WHERE category='drink' ");
        $query_basket = mysqli_query($con, "SELECT * FROM basket ");
        $query_sum = mysqli_query($con, "SELECT SUM(price) AS summing FROM `basket` ");
        $suumma = $query_sum ->fetch_assoc();
        $num_pizza = mysqli_num_rows($query_catalog_pizza);
        $num_desert = mysqli_num_rows($query_catalog_desert);
        $num_drink = mysqli_num_rows($query_catalog_drink);
        $number = mysqli_num_rows($query_basket);
     ?>
    <div class="col-10 mx-auto" id='top'>     
        <div class="row">   <!-- header -->
            <div class="col-2">
                <img src="img/logo.jpg" class="w-100">
            </div>
            <div class="col-7 row pt-5">
                <h4><a href="#pizza" class="text-dark ml-4">Пицца</a></h4>
                <h4><a href="#desert" class="text-dark ml-4">Десерт</a></h4>
                <h4><a href="#drink" class="text-dark ml-4">Напитки</a></h4>
            </div>
            <!-- basket -->
            <div class="col-3 text-right">
                <button class="btn bg-btn-dodo mt-5 basket">Корзина</button>
            </div>
            <div class="bsk-box bg-white border rounded col-3 pt-3"> <!-- Корзина -->
                <?php 
                    for ($i=0; $i < $number; $i++) { 
                        $basket = $query_basket ->fetch_assoc();
                 ?>
                <div class="row">
                    <div class="col-3">
                        <img src="<?php echo $basket['img'] ?>" class="w-100">
                    </div>
                    <div class="col-4 mt-2">
                        <h5><?php echo $basket['name']; ?></h5>                        
                    </div>
                    <div class="col-2 mt-2 px-0 text-center">
                        <h5><?php echo $basket['price']; ?><span>₽</span></h5>                        
                    </div>
                    <div class="col-2 mt-2">     
                        <form action="delete.php" method="GET"> 
                            <input type="" name="id" value="<?php echo $basket[id] ?>" style="display: none">                 
                            <button style='border: none; background: none'> <img src="img/trash.png" class="w-100"></button>         
                        </form>                                  
                    </div>
                </div>
     
                 <?php } ?>
                 <h5>Общая сумма: <?php echo $suumma['summing'] ?></h5>
                 <div>
                    <form action="clear.php">
                        <button class="btn bg-btn-dodo my-3">Очистить корзину</button>
                    </form>
                 </div>
                 <button class="btn bg-btn-dodo cls my-3">Закрыть</button>
            </div>
        </div>     

        <a href='#top'><button class="btn btn-success" style="position: fixed; left: 1750px; top: 700px;">Наверх</button></a>

        <div class="col-12 rounded banner "> <!-- banner -->            
        </div>
        <!-- PIZZA -->
        <h1 class="my-5" id='pizza'>Пицца</h1>
        <div class="row  pb-5">
            <?php 
                for ($i=0; $i < $num_pizza; $i++) { 
                    $pizza = $query_catalog_pizza ->fetch_assoc();
             ?>
            <div class="col-3">   
                <img src="<?php echo $pizza['img'] ?>" class="w-100">
                <div class="pizz"> 
                    <h3><?php echo $pizza['name']; ?></h3>   
                    <p class="text-secondary"><?php echo $stroka2['description']; ?></p>
                </div>  
                <div class="row">
                    <div class="col-6">
                        <h3><?php echo $pizza['price']; ?><span>₽</span></h3>                        
                    </div>
                    <div class="col-6">
                        <form action="insert.php" method="GET">
                            <input type="" name="id" value="<?php echo $pizza[id] ?>" style="display: none">
                            <button class="btn bg-btn-dodo">Выбрать</button>  
                        </form>            
                    </div>
                </div>       
            </div>
             <?php } ?>

        </div>
        <!-- DESERT -->
        <h1 class="my-5" id='desert'>Десерт</h1>
        <div class="row  pb-5">
            <?php 
                for ($i=0; $i < $num_desert; $i++) { 
                    $desert = $query_catalog_desert ->fetch_assoc();
             ?>
            <div class="col-3">   
                <img src="<?php echo $desert['img'] ?>" class="w-100">
                <div class="pizz"> 
                    <h3><?php echo $desert['name']; ?></h3>   
                    <p class="text-secondary"><?php echo $desert['description']; ?></p>
                </div>  
                <div class="row">
                    <div class="col-6">
                        <h3><?php echo $desert['price']; ?><span>₽</span></h3>                        
                    </div>
                    <div class="col-6">
                        <form action="insert.php" method="GET">
                            <input type="" name="id" value="<?php echo $desert[id] ?>" style="display: none">
                            <button class="btn bg-btn-dodo">Выбрать</button>  
                        </form>            
                    </div>
                </div>       
            </div>
             <?php } ?>

        </div>
        <!-- DRINK -->
        <h1 class="my-5" id='drink'>Напитки</h1>
        <div class="row  pb-5">
            <?php 
                for ($i=0; $i < $num_drink; $i++) { 
                    $drink = $query_catalog_drink ->fetch_assoc();
             ?>
            <div class="col-3">   
                <img src="<?php echo $drink['img'] ?>" class="w-100">
                <div class="pizz"> 
                    <h3><?php echo $desert['name']; ?></h3>   
                    <p class="text-secondary"><?php echo $drink['description']; ?></p>
                </div>  
                <div class="row">
                    <div class="col-6">
                        <h3><?php echo $drink['price']; ?><span>₽</span></h3>                        
                    </div>
                    <div class="col-6">
                        <form action="insert.php" method="GET">
                            <input type="" name="id" value="<?php echo $drink[id] ?>" style="display: none">
                            <button class="btn bg-btn-dodo">Выбрать</button>  
                        </form>            
                    </div>
                </div>       
            </div>
             <?php } ?>

        </div>
    </div>

    <script type="text/javascript">
        let bsk = document.querySelector('.basket');
        let bsk_box = document.querySelector('.bsk-box');
        let close = document.querySelector('.cls');

        bsk.onclick = function() {
            bsk_box.style.display = "block";
        }

        close.onclick = function() {
            bsk_box.style.display = "none";
        }

    </script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>