<?php
date_default_timezone_set('America/Denver');
require_once "app/database/connection.php";
// require_once "app/functions/add_app.php";
require_once "path.php";
session_start();

$files = glob("app/functions/*.php");
foreach ($files as $file) {
    require_once $file;
}
// logoutUser($conn);
// if(isLoggedIn() == false) {
//     header('location:' . BASE_URL . '/login.php');
// }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0" /> -->

    <!-- application meta -->

    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta
      name="apple-mobile-web-app-status-bar-style"
      content="black-translucent"
    />
    <meta
      name="viewport"
      content="initial-scale = 1.0, user-scalable=no, minimal-ui"
    />

    <!-- end application meta -->

    <!-- bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <!-- end bootstrap -->

    <!-- custom styles -->
    <style>
      .navbar {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: #f3f3f3;
        display: flex;
        justify-content: space-around;
        align-items: center;
        padding: 10px 0;
        box-shadow: 0 -2px 6px rgba(0, 0, 0, 0.1);
      }
      .navbar a {
        text-decoration: none;
        color: #333;
        text-align: center;
        flex: 1;
        padding: 10px 0;
        transition: background-color 0.3s ease;
      }
      /* .navbar a:hover {
          background-color: #ddd;
        } */
    </style>
    <!-- end custom styles -->

    <title>Recipes</title>
  </head>
  <body style="margin: 0; padding: 0">
    <h2
      class=""
      style="
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background-color: #fff;
        display: flex;
        padding: 10px 0;
        justify-content: space-around;
        text-align: center;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        padding-bottom: 20px;
      "
    >
      Morgan Recipes
    </h2>

    <div class="pt-3"></div>

    <div class="content" style="margin-top: 60px; margin-bottom: 80px;">
    
    <?php
            $id = $_GET['id'];
            $r_sql = "SELECT *
            FROM recipes
            WHERE recipe_id = $id";
            $r_result = mysqli_query($conn, $r_sql);
            if($off_result) {
            $num_rows = mysqli_num_rows($r_result);
            if($num_rows > 0) {
                while ($r_row = mysqli_fetch_assoc($r_result)) {
                    $r_id             = $r_row['recipe_id']; 
                    $r_title          = $r_row['title']; 
                    $r_ingredients    = $r_row['ingredients'];
                    $r_directions     = $r_row['directions'];
                    $r_prep_time      = $r_row['prep_time'];
                    $r_cook_time      = $r_row['cook_time'];
                    $r_preheat_temp   = $r_row['preheat_temp'];
                    $r_serves         = $r_row['serves'];
                    $r_notes          = $r_row['notes'];
                    $r_link           = $r_row['link'];
                    $r_category       = $r_row['category'];
                }
              ?>

              <h2>
                <?php echo $r_title; ?>
              </h2>


<?php }
        } ?>
    

    </div>

    <div class="navbar">
      <a href="index.html"><i class="bi bi-house-door-fill"></i></a>
      <!-- <a href="#discover">Discover</a>
        <a href="#favorites">Favorites</a>
        <a href="#profile">Profile</a> -->
    </div>

    <!-- bootstrap script -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <!-- end bootstrap script -->
  </body>
</html>