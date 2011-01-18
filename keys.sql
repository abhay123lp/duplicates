# Before INSERT: disable the keys.
ALTER TABLE physical_files DROP KEY hash_md5_key;

# For generating reports: create the keys again.
ALTER TABLE physical_files ADD KEY hash_md5_key (hash_md5);