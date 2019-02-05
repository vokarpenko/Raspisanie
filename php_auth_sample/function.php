<?php
function SafeInt($v) {
	if (isset($v)) {
		return (integer)$v;
	} else {
		return 0;
	}
}

?>