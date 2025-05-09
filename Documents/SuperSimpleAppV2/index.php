<?php
  $t = time();
  $t = 0;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Super Simple App</title>

    <link rel="stylesheet" href="client/css/style.css">
  </head>
  <body>
    <h1>Users</h1>

    <div id="add-user-wrap"></div>
    <div id="users-list-wrap"></div>

    <script src="client/js/jquery-3.6.1.min.js"></script>
    <script src="client/js/script.js?v=<?php echo $t;?>"></script>
  </body>
</html>