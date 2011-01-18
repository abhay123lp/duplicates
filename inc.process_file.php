<?php
# Handle a file found
function process_file($full_file_path='/tmp/nothing.txt', $depth=1)
{
	if(!is_file($full_file_path))
	{
		# || basename($full_file_path)!=$filename)
		return null;
	}


	$depth = (int)$depth;
	fecho(str_repeat('  ', $depth)); # depth marker
	#fecho("{$full_path})";
	#fecho("{$filename})";
	
	#$full_file_path = 'F:/htdocs/smarty-framework/public_html/.htaccess';
	$parts = pathinfo($full_file_path);
	if(!isset($parts['dirname'])) $parts['dirname'] = ''; # full path name
	if(!isset($parts['basename'])) $parts['basename'] = ''; # file name with extension
	if(!isset($parts['extension'])) $parts['extension'] = ''; # extension only
	if(!isset($parts['filename'])) $parts['filename'] = ''; # without the extension
	
	if(strtolower($parts['extension'])!='mp3')
	{
		# accept .mp3 files only
		return null;
	}
	
#	print_r($parts);
#	die();
/*
Array
(
    [dirname] => F:/SmartDraw VP/SmartDraw VP
    [basename] => CaseMapLink.dll
    [extension] => dll
    [filename] => CaseMapLink
)*/
	

	$file_size = filesize($full_file_path);
	$md5  = md5_file($full_file_path);
	$sha1 = sha1_file($full_file_path);
	fecho("{$parts['basename']}, {$file_size}, {$md5}, {$sha1}");
	flush();
	
	$created_on = filectime($full_file_path);
	$modified_on = filemtime($full_file_path);
	$accessed_on = 0;
	
	# Save the information into the database
	$sql="
INSERT INTO `physical_files`(
	`file_id`,
	`file_depth`, `file_size`,
	`file_name`, `file_extension`,
	`hash_md5`, `hash_sha1`,
	`file_path`,
	`created_on`, `modified_on`, `accessed_on`
) VALUES (
	NULL,
	'{$depth}', '{$file_size}',
	'{$parts['basename']}', '{$parts['extension']}',
	'{$md5}', '{$sha1}',
	'{$full_file_path}',
	'{$created_on}', '{$modified_on}', '{$accessed_on}'
);";
		#die($sql);
		mysql_query($sql);
}
?>