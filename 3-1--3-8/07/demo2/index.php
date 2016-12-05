<?php
	$a =3;
	$b = $a;
	$a = 4;
	echo $b;
	echo "<br />-------&-------------<br />";
	$c = 3;
	$d = &$c;
	$c = 5;
	echo $d;