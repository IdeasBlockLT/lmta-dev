<?php

function dump($data)
{
    echo '<pre>';
    print_r($data);

}
//for debugging
function dd($data)
{
    echo '<pre>';
    print_r($data);
    die();
}