CREATE DATABASE seasurf;
USE seasurf;
CREATE TABLE users(
    id INTEGER,
    username VARCHAR(30),
    password VARCHAR(60),
    admin INT NOT NULL DEFAULT 0
);

INSERT INTO users (id, username, password, admin) VALUES
(1, 'admin', '$2y$10$bPTZknRUBCGExuSrGvq8y.pO/pbtOlmuV5NNw.7D07z9HsDFEV8NK', 1);

GRANT SELECT,INSERT on seasurf.users to 'happy_hxar'@'localhost' identified by 'yajnidIcIsdedbobgeabcavDafQuioS';

USE mysql;
UPDATE user set password=PASSWORD("damjebripujDefDeutAchcokEvbav2") where User='root';

FLUSH privileges;
