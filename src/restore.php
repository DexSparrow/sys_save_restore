<?php

function restoreFiles($source, $destination) {
    $zip = new ZipArchive();
    if ($zip->open($source) !== true) {
        return false;
    }

    $zip->extractTo($destination);
    $zip->close();
    return true;
}

// Usage
// $backupFile = 'save_me.zip';
// $restoreDir = 'save_me';

// if (restoreFiles($backupFile, $restoreDir)) {
//     echo 'Restauration terminée.';
// } else {
//     echo 'La restauration a échoué.';
// }

?>