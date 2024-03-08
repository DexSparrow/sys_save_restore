<?php

    include "test_function.php";
    include "save.php";
    include "restore.php";
    use Ratchet\Server\IoServer;
    if (isset($_FILES["file_to_save"])){
        $file = $_FILES["file_to_save"];
        save_file($file);
        // desc_array($file);
        // echo $_FILES["file_to_save"]["full_path"];
    }
    else{
        include "home/page.php";
    }

?>


