<?php

$GLOBALS['db'] = new ezSQL_mysqli( 'khgphpuser', 'khgphppswd', 'khgphp', 'localhost' );

function DB() {
	return $GLOBALS['db'];
}
