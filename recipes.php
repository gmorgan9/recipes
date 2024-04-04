<?php
date_default_timezone_set('America/Denver');
require_once "app/database/connection.php";
require_once "path.php";
session_start();

$files = glob("app/functions/*.php");
foreach ($files as $file) {
    require_once $file;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>

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

    <title>View Asset | Asset360</title>

    <!-- custom styles -->
    <style>
      
    </style>
    <!-- end custom styles -->

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

    <div class="content" style="margin-top: 60px; margin-bottom: 50px;">
            <?php
            $id = $_GET['id'];
            $r_sql = "SELECT * FROM recipes WHERE recipe_id = $id";
            $r_result = mysqli_query($conn, $r_sql);
            if($r_result) {
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

                <div class="recipe_content" style="padding: 15px;">
                  <h3 class="text-center">
                    <?php echo $r_title; ?>
                  </h3>

                  <div class="recipe_details d-flex flex-column mx-auto" style="border: 1.5px solid gray; padding: 5px; font-size: 12px; padding-top: 20px; border-radius: 5px;">
                    <div class="top d-flex mx-auto">
                      <p class="text-muted"><strong>Category: </strong><?php echo $r_category; ?></p>
                      &nbsp; | &nbsp;
                      <p class="text-muted">
                      <strong>Prep: </strong>
                        <?php 
                        if(is_null($r_prep_time)) {
                          echo "N/A";
                        } else {
                          echo $r_prep_time . ' min'; 
                        }
                        ?>
                      </p>
                    </div>
                    
                    <div class="bottom d-flex mx-auto">
                      <p class="text-muted">
                        <strong>Cook: </strong>
                        <?php 
                        if(is_null($r_cook_time)) {
                          echo "N/A";
                        } else {
                          echo $r_cook_time . ' min'; 
                        }
                        ?>
                      </p>
                      &nbsp; | &nbsp;
                      <p class="text-muted">
                        <strong>Preheat: </strong>
                        <?php 
                        if(is_null($r_preheat_temp)) {
                          echo "N/A";
                        } else {
                          echo $r_preheat_temp . ' &deg;F'; 
                        }
                        ?>
                        &nbsp; | &nbsp;
                        <p class="text-muted">
                        <strong>Serves: </strong>
                        <?php 
                        if(is_null($r_serves)) {
                          echo "N/A";
                        } elseif($r_serves == "1") {
                          echo $r_serves . ' person'; 
                        } else {
                          echo $r_serves . ' people'; 
                        }
                        ?>
                      </p>
                      </p>
                    </div>


                    
                    
                   <?php if(is_null($r_link)){} else {?>
                    <div class="bottom2 d-flex mx-auto">
                      <p>
                        <strong>Original Recipe: </strong> <a href="<?php echo $r_link; ?>">Visit</a>
                      </p>
                    </div>
                   <?php } ?>
                   
                  </div>

                  <div class="mt-3">
                    <h4>
                      Ingredients
                    </h4>
                    <p>
                      <?php
                        if(is_null($r_ingredients)) {
                          echo "No ingredients listed.";
                        } else {
                          echo $r_ingredients; 
                        }
                      ?>
                    </p>
                  </div>

                  <div>
                    <h4>
                      Directions
                    </h4>
                    <p>
                      <?php
                        if(is_null($r_directions)) {
                          echo "No directions listed.";
                        } else {
                          echo $r_directions; 
                        }
                      ?>
                    </p>
                  </div>

                  <div>
                    <h4>
                      Notes
                    </h4>
                    <p>
                      <?php
                        if(is_null($r_notes)) {
                          echo "No notes listed.";
                        } else {
                          echo $r_notes; 
                        }
                      ?>
                    </p>
                  </div>

                </div>
                

                
                

            <?php }
        } ?>
    </div>
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
