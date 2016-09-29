<?php

function setSlug( $slug ){
	
	$text = preg_replace('~[^\pL\d]+~u', '-', $slug);
	$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
	$text = preg_replace('~[^-\w]+~', '', $text);
	$text = trim($text, '-');
	$text = preg_replace('~-+~', '-', $text);
	$text = strtolower($text);

	return $text;
}