<?php
  $dbServer = "es48.siteground.eu";
  $dbUser = "fourcyli_admin";
  $dbPass = "_7L;T^?AOVZT";
  $dbName = "fourcyli_newsletter";

	$conn = mysqli_connect($dbServer, $dbUser, $dbPass, $dbName);
        
	if (mysqli_connect_error()) {			
			die ("Database Connection Error");			
	}

