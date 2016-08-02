CREATE DATABASE seasurf;
USE seasurf;
CREATE TABLE users(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(30),
    `password` VARCHAR(60),
    `admin` INTEGER NOT NULL DEFAULT 0,
    PRIMARY KEY (id)
);

INSERT INTO users (username, password, admin) VALUES
('admin', '$2y$10$bPTZknRUBCGExuSrGvq8y.pO/pbtOlmuV5NNw.7D07z9HsDFEV8NK', 1);

CREATE TABLE messages(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `message` TEXT,
    `read` INTEGER NOT NULL DEFAULT 0,
    PRIMARY KEY (id)
);

INSERT INTO messages (message) VALUES
('message goes here');

GRANT SELECT, INSERT on seasurf.users to 'happy_hxar'@'localhost' identified by 'yajnidIcIsdedbobgeabcavDafQuioS';
GRANT SELECT, INSERT, UPDATE on seasurf.messages to 'happy_hxar'@'localhost' identified by 'yajnidIcIsdedbobgeabcavDafQuioS';

USE mysql;
UPDATE user set password=PASSWORD("damjebripujDefDeutAchcokEvbav2") where User='root';

FLUSH privileges;
