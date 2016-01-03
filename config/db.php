<?php

$GLOBALS['db'] = new ezSQL_mysqli( 'astmuser', 'astmpswd', 'astmdb1', 'localhost' );

function DB() {
	return $GLOBALS['db'];
}
