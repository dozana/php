# Change Permissions

To change the permissions of a file, you can use the chmod command in Terminal. 
Here's how you can do it:



## Open Terminal: 
You can find Terminal in the "Applications" folder or by using Spotlight Search (Cmd + Space and type "Terminal").



## Navigate to the directory: 
Use the cd command to navigate to the directory where your .php file is located. For example:

cd /path/to/directory



## Change permissions: 
Once you're in the directory containing your file, you can use the chmod command to change its permissions. For example, to set the permissions to read, write, and execute for the owner, and read-only for others, you can use:

chmod 755 filename.php

Replace filename.php with the name of your file.



## Verify permissions: 
You can use the ls -l command to verify that the permissions have been set correctly:

ls -l filename.php


'''

  $file = "tempdoc.txt";

  if (file_exists($file)) {
      if (unlink($file)) {
          echo "File deleted successfully.";
      } else {
          echo "Error deleting file.";
      }
  } else {
      echo "File does not exist.";
  }

'''