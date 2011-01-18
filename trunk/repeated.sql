# Find out the repeated hashes.
# Run this whole script at once.

DROP TABLE IF EXISTS repeated;

CREATE TABLE repeated

# EXPLAIN
SELECT
	hash_md5,
	COUNT(hash_md5) total
FROM physical_files
GROUP BY
	hash_md5
HAVING
	total > 1
;

# Then, look into "repeated" table.