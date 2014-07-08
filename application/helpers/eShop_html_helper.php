<?php

function meta($tags, $newline = "\n")
{
	$str = '';
	foreach ($tags as $tag)
	{
		foreach ($tag as $name => $value)
		{
			$str .= '<meta '.$name.'="'.$value.'">'.$newline;
		}
	}

	return $str;
}