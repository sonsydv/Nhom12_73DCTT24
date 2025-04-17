<?php
	$conn = mysqli_connect("localhost", "QLSV_db", "", "QLSV") ;
    mysqli_set_charset($conn, 'utf8');
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
          href="styleAdmin.css?v=1.0">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Quản lý sinh viên UTT</title>
</head>

<body>
    <section>
        <div class="section-contain">
            <?php include("menu.php")?>
            <div id="showFunction">
                <img src="./images/anhtruong.jpg"
                     alt="">
            </div>
        </div>
    </section>
</body>