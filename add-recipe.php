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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap Links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/7kainuaawjddfzf3pj7t2fm3qdjgq5smjfjtsw3l4kqfd1h4/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Custom Styles -->
    <!-- <link rel="stylesheet" href="assets/css/styles.css?v=<?php //echo time(); ?>"> -->

    <title>Add a Recipe</title>
</head>
<body>

 <!-- main-container -->
    <div class="container" style="padding: 0 75px 0 75px;">
    <form method="POST" action="">
        <br>
        <div class="top-form" style="margin-bottom: -38px;">
            <h2 class="">Add a Recipe</h2>
            <div class="float-end" style="margin-top: -50px;">
                <button type="submit" name="add-recipe" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <br>
        <hr>

    
    

        <div class="row mb-3">
            <!-- <div class="col">
                <label for="asset_tag_no" class="form-label">Asset Tag Number</label>
                <div class="input-group">
                    <div class="input-group-text">M-</div>
                    <input type="text" class="form-control" id="asset_tag_no" name="asset_tag_no">
                </div>
            </div> -->
            <div class="col">
                <label for="title" class="form-label">Recipe Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label" for="category">Category</label>
                <select class="form-control" name="category">
                    <option value="">Select an option...</option>
                    <option value="Breakfast">Breakfast</option>
                    <option value="Lunch">Lunch</option>
                    <option value="Dinner">Dinner</option>
                    <option value="Dessert">Dessert</option>
                </select>
            </div>
            <div class="col">
                <label for="prep_time" class="form-label">Preperation Time</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="prep_time" name="prep_time">
                    <div class="input-group-text">Min</div>
                </div>
            </div>
            <div class="col">
                <label for="cook_time" class="form-label">Cook Time</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="cook_time" name="cook_time">
                    <div class="input-group-text">Min</div>
                </div>
            </div>
            <div class="col">
                <label for="preheat_temp" class="form-label">Pre-Heat Temp</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="preheat_temp" name="preheat_temp">
                    <div class="input-group-text">&deg;F</div>
                </div>
            </div>
            <div class="col">
                <label for="serves" class="form-label">Serves</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="serves" name="serves">
                    <div class="input-group-text">persons</div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="link" class="form-label">Recipe Link</label>
                <input type="text" class="form-control" id="link" name="link">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label class="form-label" for="ingredients">Ingredients</label>
                <textarea class="form-control" name="ingredients" rows="5"></textarea>
            </div>
            <div class="col">
                <label class="form-label" for="directions">Directions</label>
                <textarea class="form-control" name="directions" rows="5"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label class="form-label" for="notes">Notes</label>
                <textarea class="form-control" name="notes" rows="5"></textarea>
            </div>
        </div>
    </form>



<!-- </div> -->
 </div>
 
<!-- END main-container -->

<br><br><br>




<script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>



</body>
</html>