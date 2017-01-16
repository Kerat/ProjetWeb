<?php
function isConnected()
{
    if (!isset($_SESSION) or empty($_SESSION["login"]) or empty($_SESSION["mdp"])) {
        return false;
    } else {
        return true;
    }
}
    function isResponsable(){
        if(!isset($_SESSION) or empty($_SESSION["login"]) or empty($_SESSION["mdp"])){
            return false;
        }
        else{
            return ($_SESSION["type"]=="responsable");
        }
    }
    function dateFr2dateISO($dateFr){
        $date = DateTime::createFromFormat('d/m/Y', $dateFr);
        $dateISO = $date->format("Y-m-d");

        return $dateISO;
    }
    function randSpec(){
        $spec = '&!?$*%';
        return $spec[rand(0,strlen($spec)-1)];
    }
function randNumbers(){
    $numbers='0123456789';
    return $numbers[rand(0,strlen($numbers)-1)];
}
function randAbc(){
    $abc='abcdefghijklmnopqrstuvwxyz';
    return $abc[rand(0,strlen($abc)-1)];
}
function randABCD(){
    $ABC='ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    return $ABC[rand(0,strlen($ABC)-1)];
}
function randCar(){
    $number = rand(1,4);
    switch ($number){
        case 1:
            return randNumbers();
        case 2:
            return randSpec();
        case 3:
            return randAbc();
        case 4:
            return randABCD();
    }
}
function genMdp() {
    $randomString = '';
    //while(!preg_match("^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{10}",$randomString)) {
        for ($i = 0; $i < 10; $i++) {
            $randomString .= randCar();
        }
    //}
    return $randomString;
}
?>