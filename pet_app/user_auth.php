<?php
session_start();
if(isset($_POST['type']) && $_POST['type']=='ajax'){
	if((time()-$_SESSION['LAST_ACTIVE_TIME'])>1){
		echo "logout";
	}
}
?>