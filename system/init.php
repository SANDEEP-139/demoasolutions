<?php  
spl_autoload_register(function($ClassName){
    include "classes/$ClassName.php";
});
$rout=new rout;

?>