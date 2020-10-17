<?php
 define("HOST","localhost");
 define("USER","root");
 define("DATABASE","edution");
 define("PASSWORD","");
 define("BASEURL","http://localhost/demoasolutions/");
 date_default_timezone_set('Asia/Kolkata');
 
 define("cu_day",date("d"));
 define("cu_date",date("Y-m-d"));
 define("cu_month",date("m"));
 define("cu_month_name",date("F"));
 define("cu_year",date("Y"));
 if (date('m') > 6) {$year = date('Y')."-".(date('Y') +1);}
 else {$year = (date('Y')-1)."-".date('Y');}
 define("finacial_year",$year);
 //define("month_list",["July","August","September","October","November","December","January","February","March","April","May","June"]);
 
?>