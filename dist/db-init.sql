CREATE DATABASE IF NOT EXISTS docker_solution_alna;
CREATE user IF NOT EXISTS docker_alna@localhost IDENTIFIED BY 'TxuJAz';
GRANT ALL ON docker_solution_alna.* TO docker_alna@localhost;