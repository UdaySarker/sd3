<?php
    include __DIR__."//classes/EntryPoint.php";
    $url=$_SERVER['REQUEST_URI'];
    $url=strtok($url,"?");  
    $entryPoint=new EntryPoint($url);
    $entryPoint->run();
    
    