This is a personal interest program on finding out duplicate files in an intelligent manner. Not a replacement of file finders; but something about musical database.

I had problems with multiple backing ups of .mp3 files; that captured hard disk space when a file was copied, renamed or duplicated into different location.

Through this application, I build a database list of all .mp3 files in a particular drive or location. This includes:
  * path info (full file path, file name, extension, file size in bytes)
  * hashes (md5, sha1, crc)
  * file times (created on, modified on)

Once the list is complete, I use SQLs to find out the repeating hashes. Tracing these hashes, I can reach to the actual mp3 file being duplicated in multiple locations. Then I decide which file to remove from the list. And, update the database.

Duplicate file finder applications could have solved this issue, but they do not build a mysql database of available mp3 files.

Though I have explicitly used this application to list the .mp3 files only, you can extend it to find out all kinds of files.

It cannot however detect the repated files, if the tags were changed, bit rates were changed or any other modification that affected the binary file.

## Developer Contact ##
Contact me personally here: [by sending instant online email](http://contact.sanjaal.com/email-bimal).