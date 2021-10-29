<!DOCTYPE html>
<html>
<head>
	<meta charset="ascii">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Daniel's Astro Archive</title>
	<style>
		.desc {
			white-space: break-spaces;
		}
	</style>
</head>
<body>
	<h1>My Astro Archive</h1>
	<p><a href="readme.html">About</a></p>
	<p><a href="categories.html">Categories</a></p>
	<p><a href="etc">Other pictures</a></p>
	<hr>
	<?php

	$output = array();

	$dir = scandir(".");
	for ($x = 2; $x < count($dir); $x++) {
		if ($dir[$x] == "etc" || endsWith($dir[$x], ".php")
				|| endsWith($dir[$x], ".html")) {
			continue;
		}

		$output[$x - 2] = $dir[$x];
	}

	usort($output, function($a, $b) {
		$a = strtotime($a);
	    $b = strtotime($b);
		return $b - $a;
	});

	foreach ($output as $i) {
		echo("<p><h3><a href='" . $i . "'>" . $i . "</a></h3>");

		if (file_exists($i . "/description")) {
			echo("<div class='desc'>");
			$f = file_get_contents($i . "/description");
			echo($f. "</div>");
		} else {
			echo("<div class='desc'>No description</div>");
		}

		echo("</p><hr>");
	}

	// polly fill for newer PHP function
	function endsWith($haystack, $needle) {
		$length = strlen( $needle );
		if(!$length) {
			return true;
		}

		return substr( $haystack, -$length ) === $needle;
	}

	?>
</body>
</html>
