<?php
if (isset($_POST['add-recipe'])) {
    $idno = rand(1000000, 9999999);
    $title = isset($_POST['title']) ? mysqli_real_escape_string($conn, $_POST['title']) : ""; 
    $ingredients = isset($_POST['ingredients']) ? mysqli_real_escape_string($conn, $_POST['ingredients']) : "";
    $directions = isset($_POST['directions']) ? mysqli_real_escape_string($conn, $_POST['directions']) : "";
    $prep_time = isset($_POST['prep_time']) ? mysqli_real_escape_string($conn, $_POST['prep_time']) : "";
    $cook_time = isset($_POST['cook_time']) ? mysqli_real_escape_string($conn, $_POST['cook_time']) : "";
    $preheat_temp = isset($_POST['preheat_temp']) ? mysqli_real_escape_string($conn, $_POST['preheat_temp']) : "";
    $serves = isset($_POST['serves']) ? mysqli_real_escape_string($conn, $_POST['serves']) : "";
    $notes = isset($_POST['notes']) ? mysqli_real_escape_string($conn, $_POST['notes']) : "";
    $link = isset($_POST['link']) ? mysqli_real_escape_string($conn, $_POST['link']) : "";
    $category = isset($_POST['category']) ? mysqli_real_escape_string($conn, $_POST['category']) : "";

    // Check if asset already exists
    $select = "SELECT * FROM recipes WHERE idno = '$idno'";
    $result = mysqli_query($conn, $select);
    if (mysqli_num_rows($result) > 0) {
        $error[] = 'Asset already exists!';
    } else {
        // Insert the new asset into the database
        $insert = "INSERT INTO recipes (idno, title, ingredients, directions, prep_time, cook_time, preheat_temp, serves, notes, link, category) 
            VALUES ('$idno', NULLIF('$title', ''), NULLIF('$ingredients', ''), NULLIF('$directions', ''), NULLIF('$prep_time', ''), NULLIF('$cook_time', ''), NULLIF('$preheat_temp', ''), NULLIF('$serves', ''), NULLIF('$notes', ''), NULLIF('$link', ''), NULLIF('$category', ''))";

        if (mysqli_query($conn, $insert)) {
            header('location:' . BASE_URL . '/');
            exit; // Ensure script stops execution after redirecting
        } else {
            $error[] = 'Error: ' . mysqli_error($conn);
        }
    }
}

?>