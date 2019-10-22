<?php 

function truncbyword($word, $max, $terminate = '...')
{
    $wordarray = explode(' ',$word);

    $x = 1;
    $string = '';
    
    foreach ($wordarray as $word) {
        # code...
        if($x == $max)
        {
            $string .= $word.$terminate;
            break;

        }else
        {
            $string .= $word.' ';
            $x++;
        }        
    }

    return $string;
    
}