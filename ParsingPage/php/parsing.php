<?php
	$str = file_get_contents("../html/ParsingPage.htm");
	preg_match_all("#<td align=\"center\" class=\"nav\".+?>.+?<a href=\".+?\">(.+?)</a>.+?</td>#su", $str, $res);
	file_put_contents("../data.txt", "");
	$count = 0;
	foreach ($res[1] as $value) {
		if (preg_match_all("/&nbsp;/", $value)) {
			$value = preg_replace("/&nbsp;/", '', $value);
		}
		if(preg_match_all("/^у/iu", $value)){
			$count+=1;
		}
		file_put_contents("../data.txt", $value."\n", FILE_APPEND);
	}
	file_put_contents("../data.txt", $count, FILE_APPEND);
	echo "<h1> Проверьте файл </h1>";
?>