CREATE DATABASE seasurf;
USE seasurf;
CREATE TABLE users(
    id INTEGER,
    uname VARCHAR(30),
    passw VARCHAR(30),
    admin INT NOT NULL DEFAULT 0
);

INSERT INTO users (id, uname, passw, admin) VALUES
(1, 'admin', 'cNfy8i17ca2cOpqYzM9aHnxLysVrrz', 1);

GRANT SELECT on seasurf.users to 'happy_hxar'@'localhost' identified by 'yajnidIcIsdedbobgeabcavDafQuioS';

USE mysql;
UPDATE user set password=PASSWORD("damjebripujDefDeutAchcokEvbav2") where User='root';

FLUSH privileges;
