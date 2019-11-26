<?php
function drawline($data)
{
	$a = 0;
	$str = str_split($data);
	while ($a < count($str)) {
		for ($i=0; $i < count($str); $i++) { 
			if ($i == $a) {
				echo "&nbsp; $str[$i]  &nbsp;";
			} else {
				echo " &nbsp; &nbsp; ";
			}
		} echo "<br>";
		$a++;
	}
}
drawline('WAYSDUMB');
echo "<br>";
drawline('DEV99');