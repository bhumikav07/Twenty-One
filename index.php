<?php
ob_start();
//include header.php file
include('header.php');
?>

<?php
//include carousel.php file
include('Template/_carousel.php');

//include adcards.php file
include('Template/_adcards.php');

//include collection.php file
include('Template/_collection.php');

//include servicesec.php file
include('Template/_servicesec.php');

//include featured.php file
include('Template/_featured.php');
?>

<?php
//include footer.php
include('footer.php')
?>