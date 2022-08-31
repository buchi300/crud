<?php 
function trimBody($theText, $lmt=250, $s_chr="\n", $s_cnt=2) {
if (strlen($theText)==0)
{return $theText;
	}
	
$pos = 0;
$trimmed = FALSE;
for ($i = 1; $i <= $s_cnt; $i++) {
if ($tmp = strpos($theText, $s_chr, $pos+1)) {
$pos = $tmp;
$trimmed = TRUE;
} else {
$pos = strlen($theText) - 1;
$trimmed = FALSE;
break;
}
}
$theText = substr($theText, 0, $pos);
if (strlen($theText) > $lmt) {
$theText = substr($theText, 0, $lmt);
$theText = substr($theText, 0, strrpos($theText,' '));
$trimmed = TRUE;
}
if ($trimmed) $theText .= '...';
return $theText;
}

?>