<?php

error_reporting( E_ALL );
ini_set( 'display_errors' , 1 );

// include 'vendor/autoload.php';

// Application-global configuration
include 'config/db.php';

// Add models
include 'models/Employee.php';
include 'models/PdfReader.php';

$class_employee = new Employee();

include 'header.php';

if ( isset( $_GET['page'] ) ) {

	switch( $_GET['page'] ) {
		case 'list':
			$employees = $class_employee->getAll();
			include 'views/list.php';
			break;
		case 'view':
			$id = $_GET['id'];
			$employee = $class_employee->getOne( $id );
			include 'views/view.php';
			break;
		case 'parse':

			$files = glob( 'uploads/*.pdf', GLOB_NOSORT );
			array_multisort(array_map('filemtime', $files), SORT_NUMERIC, SORT_DESC, $files);
			$file = array_shift( $files );
			$names = get_names_from_pdf( $file );
			echo count( $names );
			foreach( $names as $name => $point ) {
				$class_employee->insert( $name );
			}

			break;

		case 'upload':
		
			include 'up1.php';
			break;
		default:
			include 'home.php';
	}

} else {
	include 'home.php';
}

include 'footer.php';