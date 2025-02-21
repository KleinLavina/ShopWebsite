<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Klein Shop</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include "elements/header.php" ?>

<?php include "elements/nav.php" ?>
  

<div class="all-content">
  <?php 
	if (isset($_GET['page'])) {
		$pg = $_GET['page'];
			if ($pg == "home") {
				include "pages/home.php";
				}
				elseif ($pg == "products") {
				include "pages/product.php";
				}
				elseif ($pg == "login") {
				include "pages/login.php";
				}
                else {
                    include "pages/home.php";
                        }
            } else { 
                include "pages/home.php";
            }	
                ?>
</div>

</body>
</html>
