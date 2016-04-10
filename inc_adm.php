<?php
session_start();
if (!file_exists("database") && !file_exists("database/bdd.csv") && !file_exists("database/account.csv") && !file_exists("database/category.csv")) {?>
	<meta http-equiv="refresh" content="0; url=install.php" />
<?php }
if (file_exists("database") && file_exists("database/bdd.csv") && file_exists("database/account.csv") && file_exists("database/category.csv") && $_SESSION['admin'] == 1) {?>
<!DOCTYPE html>
<html>
<head>
<body style="background-color:#636363">
<style>


ul#menu {
    padding: 0;
}

ul#menu li {
    display: inline;

}

ul#menu li a {
    background-color: black;
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    box-sizing: border-box;
    border-radius: 3px;
    font-family: ‘Lucida Console’, Monaco, monospace;
}

ul#menu li a:hover {
    background-color: #FFA500;

}

</style>
</head>
<body>
<ul id="menu">
  <li><a href="index.php">Home</a></li>
  <li><a href="panier.php">Basket</a></li>

  <li><a href="edit_category.php">Manage Categories</a></li>
  <li><a href="edit_obj.php">Manage Inventories</a></li>
  <li><a href="edit_user.php">Manage Users</a></li>

  <li><a href="logout.php">Logout</a></li>

</ul>
<BR />
</body>
</html>
<?php } ?>
