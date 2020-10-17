<?php
function linkCss($cssPath){
    $url=BASEURL."/assets/".$cssPath;
    echo '<link rel="stylesheet" href="'.$url.'"/>';
}
function linkJquery($jqueryPath){
    $url=BASEURL."/assets/".$jqueryPath;
    echo '<script src="'.$url.'"></script>';
}
?>