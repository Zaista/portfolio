<?php
	/*
	 * JS and CSS Minifier 
	 * version: 1.0 (2013-08-26)
	 *
	 * This document is licensed as free software under the terms of the
	 * MIT License: http://www.opensource.org/licenses/mit-license.php
	 *
	 * Toni Almeida wrote this plugin, which proclaims:
	 * "NO WARRANTY EXPRESSED OR IMPLIED. USE AT YOUR OWN RISK."
	 * 
	 * This plugin uses online webservices from javascript-minifier.com and cssminifier.com
	 * This services are property of Andy Chilton, http://chilts.org/
	 *
	 * Copyrighted 2013 by Toni Almeida, promatik.
	 *
	 * Updated by Jovan Ilic
	 *
	 */
	
	function minifyJS($arr){
		minify($arr, 'https://javascript-minifier.com/raw');
	}
	
	function minifyCSS($arr){
		minify($arr, 'https://cssminifier.com/raw');
	}
	
	function minify($arr, $url) {
		foreach ($arr as $key => $value) {
			$handler = fopen($value, 'w') or die("File <a href='" . $value . "'>" . $value . "</a> error!<br />");
			fwrite($handler, getMinified($url, file_get_contents($key)));
			fclose($handler);
			echo "Minificaiton of file " . $value . " done.<br />";
		}
	}
	
	function getMinified($url, $content) {
		$postdata = array('http' => array(
	        'method'  => 'POST',
	        'header'  => 'Content-type: application/x-www-form-urlencoded',
	        'content' => http_build_query( array('input' => $content) ) ) );
		return file_get_contents($url, false, stream_context_create($postdata));
	}
	
	// FILES ARRAYs
	// Keys as input, Values as output
	
	$js = array(
		"../js/index.js" 	=> "../js/index.min.js"
	);
	
	$css = array(
		"../css/index.css"	=> "../css/index.min.css"
	);
	
	minifyJS($js);
	minifyCSS($css);
	
	
	// edit index.html file to use minified css and js files
	$file = file("../index.html");
	$temp = fopen("../index2.html", "w+");
	
	foreach ($file as $line) {
		if (strpos($line, "css/index.css") !== false)
			$line = str_replace("css/index.css","css/index.min.css",$line);
		if (strpos($line, "js/index.js") !== false)
			$line = str_replace("js/index.js","js/index.min.js",$line);
		fwrite($temp, $line); 
	}
	fclose($temp);
	copy("../index2.html", "../index.html");
	echo "Script complete!";
?>