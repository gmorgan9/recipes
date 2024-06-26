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
      content="black"
    />
    <!-- <meta name="viewport" content="initial-scale = 1.0, user-scalable=no" /> -->

    <meta
      name="viewport"
      content="target-densitydpi=device-dpi, width=device-width, user-scalable=no, maximum-scale=1, minimum-scale=1"
    />
    <link rel="apple-touch-icon" sizes="57x57" href="icon/57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="icon/72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="icon/76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="icon/114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="icon/120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="icon/144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="icon/152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="icon/180.png">


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
      /* .navbar {
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
       */
      .card:not(:last-child) {
        margin-bottom: 15px; /* Adjust this value as needed */
      }
    </style>
    <!-- end custom styles -->

    <title>Recipes</title>
  </head>
  <body style="margin: 0; padding: 0">
    <h2
      class=""
      style="
        z-index: 999;
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

<div class="content d-flex flex-column" style="margin-top: 60px; margin-bottom: 80px; z-index: -999;">

    <?php
// Assuming you have already established a database connection

// Query to select title and category from the recipes table
$query = "SELECT title, category, recipe_id FROM recipes";
$result = mysqli_query($conn, $query);

// Check if query executed successfully
if ($result) {
    // Loop through the result set
    while ($row = mysqli_fetch_assoc($result)) { ?>
        
        
            <div class="card mx-auto" style="width: 95%">
                <div class="card-body">
                    <a href="recipes.php?id=<?php echo $row['recipe_id']; ?>" class="stretched-link"></a>
                    <h3 class="card-title"><?php echo $row['title']; ?></h3>
                    <p class="card-text text-muted" style="margin-top: -7px; font-size: 12px"><?php echo $row['category']; ?></p>
                </div>
            </div>
    <?php }
} else {
    // Handle error if query fails
    echo "Error: " . mysqli_error($conn);
}

// Close database connection
mysqli_close($connection);
?>
</div>

    <!-- <div class="navbar">
      <a href="index.html"><i class="bi bi-house-door-fill"></i></a>
      <a href="#discover">Discover</a>
      <a href="#favorites">Favorites</a>
      <a href="#profile">Profile</a>
    </div> -->

    <!-- bootstrap script -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <!-- end bootstrap script -->
  </body>
</html>
