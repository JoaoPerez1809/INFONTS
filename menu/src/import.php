<?php 

function generateHash( $lenght = 32) {
    
    $characters = '1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';
    $charactersLenght = strlen($characters);
    $hashString ='';
    for($i = 0 ; $i < $lenght ; $i++){
        $hashString .= $characters[rand(0, $charactersLenght - 1)];

    }
    return $hashString;
}


?>