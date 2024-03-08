<?php
    // include "home.php";
    // include "login.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <script src="script/page_script.js"></script> -->
    <script src="script/page_script2.js"></script>
    <!-- <script src="../test.js"></script> -->
    <link rel="stylesheet" href="css/page_style.css">
</head>
<body>
<input type="button" value="Save" onclick="pop_up_window()">
<input type="button" value="Restore" >


<div id="pop_up">
    <form action="index.php" method="post" enctype="multipart/form-data">
        <label for="images" class="drop-container" id="dropcontainer">
        <span class="drop-title">Drop files here</span>
        <span>or</span>
        <input type="file" id="file_to_save" name="file_to_save">
        <input type="hidden" name="MAX_FILE_SIZE" value="30000" />        <!-- <input type="file" id="file_to_save" accept="image/*" required name="file_to_save"> -->
        </label>
        <input type="submit" value="Ok" id="button_submit_file">
    </form>
</div>

</body>
</html>



