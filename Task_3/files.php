<?php
/**
 * Функция search - ищет в заданной папке все файлы,
 * имена которых состоят из цифр и букв латинского алфавита,
 * имеют расширение ixt и выведет на экран имена этих файлов,
 * упорядоченных по имени.
*/
function search($root){
    $files = scandir($root);

    $search_list = [];

    echo "<pre>";
    foreach($files as $file) {
        if($file == "." || $file == ".." ) continue;
//        echo preg_match('/^[a-zA-Z0-9_]+/s', $file);
        if(preg_match('/(.ixt+)/s', $file) && preg_match('/^[a-zA-Z0-9_]+/i', $file)){
            echo $file."<br>";
        }
    }

}

$root = "datafiles";
search($root);

