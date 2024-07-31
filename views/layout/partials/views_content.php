<?php
/**
 * @var $content
 */
if($content == 'home'){
    include "./views/site/home.php";
} else if($content == 'location'){
    include "./views/location/location.php";
}

?>