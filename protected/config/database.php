<?php

// This is the database connection configuration.
return array(
	//'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
<<<<<<< HEAD

	

	'connectionString' => 'mysql:'.dirname(__FILE__).'/../data/testdrive.db',
//>>>>>>> origin/master
=======
	'connectionString' => 'mysql:'.dirname(__FILE__).'/../data/testdrive.db',
>>>>>>> origin/master
	'connectionString' => 'mysql:host=122.154.239.67;dbname=alumni_db',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => '01234',
	'charset' => 'utf8',

);