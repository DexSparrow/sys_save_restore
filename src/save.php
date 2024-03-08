<?php


function remove_directory($DIR_NAME){
    if(is_dir($DIR_NAME)){
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($DIR_NAME), RecursiveIteratorIterator::SELF_FIRST);
        foreach ($files as $file) {
            if($file->isDir() && basename($file) != "." && basename($file)!=".."){
                remove_directory($file);
            }
            else if($file->isFile()){
                unlink($file);                
            }
        }
    }
    return rmdir($DIR_NAME);
}


function backupFiles($source, $destination) {
    if (!is_dir($source)) {
        return false;
    }
    
    $zip = new ZipArchive();
    if ($zip->open($destination, ZipArchive::CREATE) !== true){
        return false;
    }

    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);
    foreach ($files as $file){
        echo $file."<br>";
        if ($file->isDir()&& basename($file) != "." && basename($file)!=".."){
            $zip->addEmptyDir(str_replace(basename($source) . '/', '', basename($file) . '/'));
        } else if ($file->isFile()&& basename($file) != "." && basename($file)!=".."){
            $zip->addFromString(str_replace(basename($source) . '/', '', basename($file)), file_get_contents($file));
        }
    }
    $zip->close();
    return true;
}






function save_file($FILE){
    $current_date = date("o-m-j-h-i-s");
    $file_name =  basename($FILE['name']);
    $tmp_name = $FILE["tmp_name"];
    $uploaddir = '/srv/http/web/sys_save_restore/src/File_storage/';
    mkdir($uploaddir."temp_temp",0777);
    $uploaddir = $uploaddir."temp_temp/";
    $uploadfile = $uploaddir .$file_name;
    if(move_uploaded_file($tmp_name,$uploadfile)){
        echo "Upload successfully!!";
    }
    else {
        echo "Error";
    }
    /* */
    $source = "C:/file/file";
    touch($uploaddir."information.txt");
    file_put_contents($uploaddir."information.txt",implode("\n",[$current_date,$source]));
    $backupFile_storage = "/srv/http/web/sys_save_restore/src/File_storage/";
    echo $backupFile_storage.$file_name;
    if(backupFiles($uploaddir,$backupFile_storage.$file_name."-".$current_date.".zip")){

    }
    else{
        return false;
    }
    /* */
    if(remove_directory($uploaddir)){
        echo "Ok";
    }
    else echo "Not Ok";
    return 1;
}


/*      next_move:
        the source of of the file how to get it
*/

?>