@echo off

# Backup everything
# The data/contents are private
mysqldump -uroot -ptoor mp3 physical_files > physical_files.dmp

# backup the table structures on (public access)
mysqldump --no-data -uroot -ptoor mp3 physical_files > physical_files.struct