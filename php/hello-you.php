<?php

/**
 *  Hello, You!
 *
 *  @author Chris Womack <cwillmih@gmail.com>
 *
 *  Copyright (c) cwillmih.  All Rights Reserved.
 *
 *  This software is provided "AS-IS" and the copyright holder
 *  cannot be held responsible for anything this software does,
 *  or does not do, including but not limited to, greeting you,
 *  impressing you, convincing you to hire me, or making your
 *  day just a little brighter.  Of course, if it does any of
 *  these, hooray.
 */

// Let's support multiple interfaces.
switch(php_sapi_name()) {
	// Command line...
	case "cli":

		// Obtain the STDIN stream handler.
		$_handle = fopen("php://stdin", "r");

		while(true) {
			echo "Please enter your name: ";

			// Read a line of input.
			if(($_line = trim(fgets($_handle))) !== "") {
				echo "Hello there, ".ucwords(strtolower($_line))."!\n";

				unset($_line);

				break;
			}
		}

		fclose($_handle);

		unset($_handle);

		break;
	// ...and Apache HTTPD
	case "apache2handler":

		echo "<!doctype html>"
			."<html>"
			."<head>"
			."<title>".substr($_SERVER["PHP_SELF"], strrpos($_SERVER["PHP_SELF"], "/") + 1)."</title>"
			."</head>"
			."<body>"
			;

		if(strtolower($_SERVER["REQUEST_METHOD"]) != "post" || !isset($_POST["my_name"]) || trim($_POST["my_name"]) == "") {
			echo "<form method='post' action='".$_SERVER["REQUEST_URI"]."'>"
				."<label for='my-name'>Your Name:</label>"
				."<input type='text' name='my_name' id='my_name' placeholder='Your name, of course...' pattern='[\w\s]{1,64}' title='1-64 alphanumeric characters only' autocomplete='off' required />"
				."<input type='submit' value='Feeling lucky?' />"
				."</form>"
				;
		} else
			echo "Hello there, <strong>".ucwords(strtolower($_POST["my_name"]))."</strong>!";

		echo "</body>"
			."</html>"
			;

		break;
	default:
		die("How are you trying to run this?");
}

// Just a random comment that's pointless, but don't worry,
// my code isn't generally commented to this level, only when
// necessary for complex logic that run-of-the-mill developers
// may not understand.

exit(1);

