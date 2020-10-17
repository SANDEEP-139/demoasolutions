<?php
class framework{
    public function view($viewName,$data=[]){
        if(file_exists("application/views/".$viewName.".php")){
            require "application/views/$viewName.php";
        }
        else{
            echo "<div style='margin:0;padding:10px;background-color:silver;'>Sorry ".$viewName.".php not found</div>";
        }
    }
    public function view2($viewName,$myModel,$viewdata=[]){
        if(file_exists("application/views/".$viewName.".php")){
            require "application/views/$viewName.php";
        }
        else{
            echo "<div style='margin:0;padding:10px;background-color:silver;'>Sorry ".$viewName.".php not found</div>";
        }
    }

    public function model($modelName){
        if(file_exists("application/models/".$modelName.".php")){
            require "application/models/$modelName.php";
            return new $modelName;
        }
        else{
            echo "<div style='margin:0;padding:10px;background-color:silver;'>Sorry ".$modelName.".php not found</div>";
        }
    }

    public function input($inputName){
        if($_SERVER['REQUEST_METHOD']=="POST" || $_SERVER['REQUEST_METHOD']=="post"){
            return trim(strip_tags($_POST[$inputName]));
        }
        else if($_SERVER['REQUEST_METHOD']=="GET" || $_SERVER['REQUEST_METHOD']=="get"){
            return trim(strip_tags($_GET[$inputName]));
        }
    }

    public function helper($helperName){
        if(file_exists("system/helpers/".$helperName.".php")){
            require_once "system/helpers/".$helperName.".php";
        }
        else{
            echo "File not found";
        }
    }

    public function setSession($sessionName,$sessionValue){
        if(!empty($sessionName) && !empty($sessionValue)){
            $_SESSION[$sessionName]=$sessionValue;
        }
    }

    public function getSession($sessionName){
        if(!empty($sessionName) && isset($_SESSION[$sessionName])){
            return $_SESSION[$sessionName];
        }
    }

    public function unsetSession($sessionName){
        if(!empty($sessionName)){
            unset($_SESSION[$sessionName]);
        }
    }

    public function destroy(){
        session_destroy();
    }

    public function setFlash($sessionName,$msg){
        if(!empty($sessionName) && !empty($msg)){
            $_SESSION[$sessionName]=$msg;
        }
    }

    public function flash($sessionName,$className){
        if(!empty($sessionName) && !empty($className) && isset($_SESSION[$sessionName])){
            echo "<div class='". $className ."'>".$_SESSION[$sessionName]."</div>";
            unset($_SESSION[$sessionName]);
        }
    }

    public function redirect($path){
        header("location:". BASEURL . "/".$path);
    }
    function multi_strpos($string, $check, $getResults = false)
    {
        $result = array();
        $check = (array) $check;

        foreach ($check as $s)
        {
            $pos = strpos($string, $s);

            if ($pos !== false)
            {
            if ($getResults)
            {
                $result[$s] = $pos;
            }
            else
            {
                return $pos;          
            }
            }
        }

        return empty($result) ? false : $result;
    }
    public function totalsunday($months,$years){                      
        $monthName = date("F", mktime(0, 0, 0, $months));
        $fromdt=date('Y-m-01 ',strtotime("First Day Of  $monthName $years")) ;
        $todt=date('Y-m-d ',strtotime("Last Day of $monthName $years"));
        $num_sundays='';                
        for ($i = 0; $i <= ((strtotime($todt) - strtotime($fromdt)) / 86400); $i++)
        {
            if(date('l',strtotime($fromdt) + ($i * 86400)) == 'Sunday')
            {
                    $num_sundays++;
            }    
        }
        return $num_sundays;
    }
    public function totalsunday_to_date($months,$years,$todt){                      
        $monthName = date("F", mktime(0, 0, 0, $months));
        $fromdt=date('Y-m-01 ',strtotime("First Day Of  $monthName $years"));
        $num_sundays='';                
        for ($i = 0; $i <= ((strtotime($todt) - strtotime($fromdt)) / 86400); $i++)
        {
            if(date('l',strtotime($fromdt) + ($i * 86400)) == 'Sunday')
            {
                    $num_sundays++;
            }    
        }
        return $num_sundays;
    }
}

?>