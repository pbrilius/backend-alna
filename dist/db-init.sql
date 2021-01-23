CREATE DATABASE IF NOT EXISTS backend_alna_target;
CREATE user IF NOT EXISTS docker_alna@localhost IDENTIFIED BY 'TxuJAz';
GRANT ALL ON backend_alna_target.* TO docker_alna@localhost;