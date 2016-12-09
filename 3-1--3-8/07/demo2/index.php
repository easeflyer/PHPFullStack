<<<<<<< HEAD
<?php
	$a =3;
	$b = $a;
	$a = 4;
	echo $b;
	echo "<br />-------&-------------<br />";
	$c = 3;
	$d = &$c;
	$c = 5;
=======
<?php
	$a =3;
	$b = $a;
	$a = 4;
	echo $b;
	echo "<br />-------&-------------<br />";
	$c = 3;
	$d = &$c;
	$c = 5;
>>>>>>> f407ad3bbcbbd827e8bfdf1e4f8410c6352e89c3
	echo $d;