<?php
define ('SERVER', 'localhost:3306');
define ('USER', 'root');
define ('PASS', 'jessie');
define ('DB', 'food');
$bdd = mysqli_connect(SERVER, USER, PASS, DB);
function score($x){
    $score=0;
    $count = count($x);
    for ($i=0;$i<$count;$i++){
        $x[$i] = strtoupper($x[$i]);
        if($x[$i]=='A'){
            $score+=5;
        }else if($x[$i]=='B'){
            $score+=4;
        }else if($x[$i]=='C'){
            $score+=3;
        }else if($x[$i]=='D'){
            $score+=2;
        }else if($x[$i]=='E'){
            $score+=1;
        }
    }
    return round($score/$count);
}
?>