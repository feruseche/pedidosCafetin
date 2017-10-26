<?php
 
include('Mobile_Detect.php');
$detect = new Mobile_Detect();
 
if ( $detect->isAndroidtablet() || $detect->isIpad() || $detect->isBlackberrytablet() ) {
    // mostar versión para tablets
} elseif( $detect->isAndroid() ) {
    // versión Android
} elseif ( $detect->isIphone() ) {
    // versión iPhone
} elseif ( $detect->isMobile() ) {
    // versión para otros móviles
} else{
    // versión "normal"
}
 echo "algo...";
?>