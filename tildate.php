<?php

require "date.php";
session_start();


$d = date_create(Date::getdate());
$nd = date_create($_SESSION["student"]["trial_exp_date"]);

$year = date_diff($d, $nd)->format('%y');
$month = date_diff($d, $nd)->format('%m');
$day = date_diff($d, $nd)->format('%d');

$hour = date_diff($d, $nd)->format('%h');
$minute = date_diff($d, $nd)->format('%i');
$second = date_diff($d, $nd)->format('%s');




$s = ($second / 60) * 100;
$m = ($minute / 60) * 100;
$h = ($hour / 60) * 100;

$da = ($day / 31) * 100;
$mo = ($month /12) * 100;
// $y = ($year / 60) * 100;


echo "Avalibal Time : ".date_diff($d, $nd)->format('%y Years %m Months %d Days : %h Hours %i Minits %s Seconds');;

?>



<div  class="pi2" style="margin-top: 10px; background-image: conic-gradient( rgb(0, 217, 255) 0 <?php echo $s . "%" ?>,rgba(255,255,255,255) <?php echo $s . "%" ?>);text-align: center;margin-top: 20px;margin-bottom: 20px;">
    <div class="pi2" style=" background-image: conic-gradient( rgb(225, 0, 255) 0 <?php echo $m . "%" ?>,rgba(255,255,255,255) <?php echo $m . "%" ?>);height: 125px;aspect-ratio: 1;margin-top:12.5px;margin-left: 12.5px;">
        <div class="pi2" style=" background-image: conic-gradient( rgb(47, 255, 0) 0 <?php echo $h . "%" ?>,rgba(255,255,255,255) <?php echo $h . "%" ?>);height: 100px;aspect-ratio: 1;margin-top:12.5px;margin-right: 12.5px;">
            <div class="pi2" style=" background-image: conic-gradient( rgb(236, 255, 23) 0 <?php echo $da . "%" ?>,rgba(255,255,255,255) <?php echo $da . "%" ?>);height: 75px;aspect-ratio: 1;margin-top:12.5px;margin-right: 12.5px;">
                <div class="pi2" style=" background-image: conic-gradient( rgb(23, 255, 120) 0 <?php echo $mo . "%" ?>,rgba(255,255,255,255) <?php echo $mo . "%" ?>);height: 50px;aspect-ratio: 1;margin-top:12.5px;margin-right: 12.5px;">
                <div class="pi2" style=" background-image: conic-gradient( white 0 <?php echo "100" . "%" ?>,rgba(255,255,255,255) <?php echo "100" . "%" ?>);height: 25px;aspect-ratio: 1;margin-top:12.5px;margin-right: 12.5px;">

</div>
                </div>
            </div>
        </div>
    </div>
</div>
