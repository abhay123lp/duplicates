@echo off

REM Backup the table structure
mysqldump --no-data -uroot -ptoor mp3 physical_files > physical_files.struct