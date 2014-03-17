<?php

/**
 *  Hello, You!  (CLI-only)
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

if(php_sapi_name() !== "cli")
	exit("This is the CLI-only version.  Sorry, Charlie!");

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

exit(1);

