<?php

function show($stuff) {
    echo "<pre>";
    print_r($stuff);
    echo "</pre>";
}

function controller_name($arr) {
    
    $arr = explode("/", $arr);
    $arr[-1] = ucfirst($arr[-1]);
    $arr = implode("/", $arr);
    return $arr;
}

function get_date($date) {
    
    return date("jS M, Y", strtotime($date));
}


function set_value($key, $default = '')
{
    if(!empty($_POST[$key]))
    {
        return $_POST[$key];
    }
    else if(!empty($default)) {
        return $default;
    }

    return '';
}


function set_select($key, $value, $default = '')
{
    if(!empty($_POST[$key]))
    {
        if($value == $_POST[$key]) {
            return 'selected';
        }
    }
    else if(!empty($default)) {
        if($value == $default) {
            return 'selected';
        }
    }

    return '';
}


// function redirect($link)
// {
//     header("Location: ". ROOT."/".$link);
//     die;
// }


function message($msg = '', $erase = false)
{
    if(!empty($msg))
    {
        $_SESSION['message'] = $msg;
    }
    else
    {
        if(!empty($_SESSION['message']))
        {
            $msg = $_SESSION['message'];
            if($erase)
            {
                unset($_SESSION['message']);
            }
            return $msg;            
        }
    }
    return false;
}



function esc($str)
{
    return nl2br(htmlspecialchars($str));
}


function str_to_url($url)
{
    $url = str_replace("'", "", $url);
    $url = preg_replace('~[^\\pL0-9_}+~u', '-', $url);
    $url = trim($url, "-");
    $url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
    $url = strtolower($url);
    $url = preg_replace('~[^-a-z0-9_]+~', '', $url);

    return $url;
}


function views_path($path) {

    return "../app/views/" . $path . ".view.php";
}
