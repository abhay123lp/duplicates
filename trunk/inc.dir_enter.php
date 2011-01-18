<?php
# begin here; enter into a directory and recursively look into it.
function dir_enter($entry_dir='/', $depth=0)
{
	# Remove the last trailing slash and void dual writing
	$entry_dir = preg_replace('/\/$/i', '', $entry_dir);

	$skip_list = array(
		'.',  # self
		'..', # parent
	);

	if($dir_handle = opendir($entry_dir))
	{
		while(false !== ($filename = readdir($dir_handle)))
		{
			if(in_array($filename, $skip_list))
			{
				continue;
			}
			
			$full_file_path = "{$entry_dir}/{$filename}";
			
			if(is_dir($full_file_path))
			{
				# Need to loop here inside the directory

				fecho(str_repeat('  ', $depth)); # depth marker
				#fecho("{$full_file_path}");
				fecho("{$filename}");

				
				# Recurse through the file
				$function = __FUNCTION__;
				$function($full_file_path, $depth+1);
			}
			else
			{
				#fecho(str_repeat('  ', $depth)); # depth marker
				#fecho("{$full_file_path}");
				#fecho("{$filename}");

				process_file($full_file_path, $depth);
			}
		}
		closedir($dir_handle);
	}
}
?>