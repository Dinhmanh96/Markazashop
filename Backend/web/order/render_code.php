<?php
	//Auto render link Confirm order
	function rand_string( $length ) {
	$chars = "123456789";
	$size = strlen( $chars );
	$str = '';
	for( $i = 0; $i < $length; $i++ ) {
	$str .= $chars[ rand( 0, $size - 1 ) ];
	 }
	return $str;
}
?>