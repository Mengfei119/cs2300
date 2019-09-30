-- TODO: Put ALL SQL in between `BEGIN TRANSACTION` and `COMMIT`
BEGIN TRANSACTION;

-- TODO: create tables

-- CREATE TABLE `examples` (
-- 	`id`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
-- 	`name`	TEXT NOT NULL
-- );

-- users table
-- CREATE TABLE users (
-- 	`id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
-- 	`username` TEXT NOT NULL UNIQUE,
-- 	`password` TEXT NOT NULL,
-- );
CREATE TABLE users (
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	username TEXT NOT NULL UNIQUE,
	password TEXT NOT NULL
);

-- users seed data
INSERT INTO users (id, username, password) VALUES (1, 'mx224', '$2y$10$EdpP6Hf.TSIRZfyEqAgHjuMWX3r8CO23yMT8VTeyXj4H.Img2UbTO'); -- password: today
INSERT INTO users (id, username, password) VALUES (2, 'mx225', '$2y$10$EdpP6Hf.TSIRZfyEqAgHjuMWX3r8CO23yMT8VTeyXj4H.Img2UbTO'); -- password: today
INSERT INTO users (id, username, password) VALUES (3, 'mx226', '$2y$10$EdpP6Hf.TSIRZfyEqAgHjuMWX3r8CO23yMT8VTeyXj4H.Img2UbTO'); -- password: today

-- sessions table
CREATE TABLE sessions (
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	user_id INTEGER NOT NULL,
	session TEXT NOT NULL UNIQUE
);

-- images table
CREATE TABLE images (
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	user_id INTEGER NOT NULL,
	image_name TEXT NOT NULL,
	image_ext TEXT NOT NULL,
	description TEXT,
	source TEXT
);

-- images seed data
INSERT INTO images (id, user_id, image_name, image_ext, description, source) VALUES (1, 1, 'elephant.jpg', 'jpg', 'ice age', 'http://www.5857.com/wall/58277.html');
-- Source: http://www.5857.com/wall/58277.html
INSERT INTO images (id, user_id, image_name, image_ext, description, source) VALUES (2, 1, 'ocean.jpg', 'jpg', 'beautiful view', 'http://www.5857.com/wall/58394_3.html');
-- Source: http://www.5857.com/wall/58394_3.html
INSERT INTO images (id, user_id, image_name, image_ext, description, source) VALUES (3, 1, 'paris.jpg', 'jpg', 'city view','http://www.5857.com/sjbz/79797_4.html');
-- Source: http://www.5857.com/sjbz/79797_4.html
INSERT INTO images (id, user_id, image_name, image_ext, description, source) VALUES (4, 1, 'lamp.jpg', 'jpg', 'night view','http://www.5857.com/sjbz/74058.html');
-- Source: http://www.5857.com/sjbz/74058.html
INSERT INTO images (id, user_id, image_name, image_ext, description, source) VALUES (5, 1, 'pink.jpg', 'jpg', 'simple and pink','http://www.5857.com/sjbz/73735.html');
-- Source: http://www.5857.com/sjbz/73735.html
INSERT INTO images (id, user_id, image_name, image_ext, description, source) VALUES (6, 2, 'universe.jpg', 'jpg', 'cute universe','http://www.5857.com/sjbz/73567.html');
-- Source: http://www.5857.com/sjbz/73567.html
INSERT INTO images (id, user_id, image_name, image_ext, description, source) VALUES (7, 2, 'claw.jpg', 'jpg', 'cute cat paw','http://www.5857.com/sjbz/73403.html');
-- Source: http://www.5857.com/sjbz/73403.html
INSERT INTO images (id, user_id, image_name, image_ext, description, source) VALUES (8, 2, 'samoyed.jpg', 'jpg', 'lovely dog','http://www.5857.com/sjbz/66747.html');
-- Source: http://www.5857.com/sjbz/66747.html
INSERT INTO images (id, user_id, image_name, image_ext, description, source) VALUES (9, 2, 'cartoon.jpg', 'jpg', 'the elephant and the rabbit','http://www.5857.com/wall/59694.html');
-- Source: http://www.5857.com/wall/59694.html
INSERT INTO images (id, user_id, image_name, image_ext, description, source) VALUES (10, 2, 'snow.jpg', 'jpg', 'winter days','http://www.5857.com/sjbz/81641.html');
-- http://www.5857.com/sjbz/81641.html


-- tags table
CREATE TABLE tags (
	id	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	name	TEXT NOT NULL UNIQUE
);
-- tags seed data
INSERT INTO tags (id, name) VALUES (1, 'view');
INSERT INTO tags (id, name) VALUES (2, 'cat');
INSERT INTO tags (id, name) VALUES (3, 'dog');
INSERT INTO tags (id, name) VALUES (4, 'cute');
INSERT INTO tags (id, name) VALUES (5, 'superhero');
INSERT INTO tags (id, name) VALUES (6, 'simple');
INSERT INTO tags (id, name) VALUES (7, 'city');
INSERT INTO tags (id, name) VALUES (8, 'architecture');
INSERT INTO tags (id, name) VALUES (9, 'animal');
INSERT INTO tags (id, name) VALUES (10, 'cartoon');
INSERT INTO tags (id, name) VALUES (11, 'pink');
INSERT INTO tags (id, name) VALUES (12, 'blue');
INSERT INTO tags (id, name) VALUES (13, 'night');



-- images_tags table
CREATE TABLE image_tags (
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	image_id INTERGER NOT NULL,
	tag_id INTERGER NOT NULL
);
-- images_tags seed data
INSERT INTO image_tags  (id, image_id, tag_id) VALUES (1, 1, 9);
INSERT INTO image_tags  (id, image_id, tag_id) VALUES (2, 1, 10);
INSERT INTO image_tags  (id, image_id, tag_id) VALUES (3, 2, 1);
INSERT INTO image_tags  (id, image_id, tag_id) VALUES (4, 2, 12 );
INSERT INTO image_tags  (id, image_id, tag_id) VALUES (5, 3, 1 );
INSERT INTO image_tags  (id, image_id, tag_id) VALUES (6, 3, 7 );
INSERT INTO image_tags  (id, image_id, tag_id) VALUES (7, 3, 8 );
INSERT INTO image_tags  (id, image_id, tag_id) VALUES (8, 4, 13 );
INSERT INTO image_tags  (id, image_id, tag_id) VALUES (9, 5, 6 );
INSERT INTO image_tags  (id, image_id, tag_id) VALUES (10, 5, 11 );
INSERT INTO image_tags  (id, image_id, tag_id) VALUES (11, 6, 4 );
INSERT INTO image_tags  (id, image_id, tag_id) VALUES (12, 6, 6 );
INSERT INTO image_tags  (id, image_id, tag_id) VALUES (13, 6, 10 );
INSERT INTO image_tags  (id, image_id, tag_id) VALUES (14, 6, 12 );
INSERT INTO image_tags  (id, image_id, tag_id) VALUES (15, 7, 2 );
INSERT INTO image_tags  (id, image_id, tag_id) VALUES (16, 7, 4 );
INSERT INTO image_tags  (id, image_id, tag_id) VALUES (17, 7, 6);
INSERT INTO image_tags  (id, image_id, tag_id) VALUES (18, 8, 3 );
INSERT INTO image_tags  (id, image_id, tag_id) VALUES (19, 8, 4 );
INSERT INTO image_tags  (id, image_id, tag_id) VALUES (20, 8, 9 );
INSERT INTO image_tags  (id, image_id, tag_id) VALUES (21, 9, 4 );
INSERT INTO image_tags  (id, image_id, tag_id) VALUES (22, 9, 6 );
INSERT INTO image_tags  (id, image_id, tag_id) VALUES (23, 9, 10);
INSERT INTO image_tags  (id, image_id, tag_id) VALUES (24, 9, 11);
INSERT INTO image_tags  (id, image_id, tag_id) VALUES (25, 10, 1);

-- TODO: FOR HASHED PASSWORDS, LEAVE A COMMENT WITH THE PLAIN TEXT PASSWORD!

-- INSERT INTO `examples` (id,name) VALUES (1, 'example-1');
-- INSERT INTO `examples` (id,name) VALUES (2, 'example-2');

COMMIT;
