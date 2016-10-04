<?php

function flash($style='info', $message){

	// styles are
	// success, error, warning, info
	session()->flash('flash', $message);
	session()->flash('flash_class', 'alert-'.$style);
}