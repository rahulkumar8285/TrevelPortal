<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">
    <title>Request Complete</title>
    <style>
    h1 {
        text-align: center;
        font-family: "Work Sans",
         "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    }

    .img {
        display: flex;
        justify-content: center;
    }
    </style>
</head>

<body>
    <?php
     if(!empty($fullname)){
      echo '<h1>Hello '.$fullname.'<br>Wellcom To Travel Potal.<br>you Requert has been send Admin <br> Team Contact You Very Soon ! </h1>';
     }  
  ?>
    <div class="img">
        <img src="<?php echo base_url()?>public/asset/images/request.png" style="width:600px">
    </div>

</body>

</html>