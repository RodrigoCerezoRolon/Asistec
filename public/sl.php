<?php

	$targetFolder = '/home/osolelar/multienvase_laravel/storage/app/public';


	$linkFolder = '/home/osolelar/public_html/multienvase/storage';

	symlink($targetFolder,$linkFolder);
	
	echo 'Symlink process successfully completed from <strong>'.$targetFolder.' </strong> to <strong>'.$linkFolder.'</strong>';

