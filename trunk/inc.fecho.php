<?php
# false echo
function fecho()
{
	return null;
	echo implode(' ', func_get_args()), "\n";
}
?>