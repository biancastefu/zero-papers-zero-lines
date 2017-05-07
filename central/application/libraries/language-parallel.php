<?php
GLOBAL $polylangs;
$polylangs=array();
$files = scandir(dirname(__FILE__).'/language-parallel/');
//var_dump($files);

foreach ($files as $filename) {
    $polylang = array();
    $path = dirname(__FILE__) . '/language-parallel/' . $filename;
    if (is_file($path)) {
        require_once $path;
        $polylangs[substr($filename,0,5)] = $polylang;
    }
}

function TranslateTo($lang, $text){
    GLOBAL $polylangs;
    return $polylangs[$lang][$text];
}