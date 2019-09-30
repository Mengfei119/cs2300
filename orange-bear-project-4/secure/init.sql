-- TODO: Put ALL SQL in between `BEGIN TRANSACTION` and `COMMIT`
BEGIN TRANSACTION;

-- TODO: create tables

-- TODO: initial seed data

-- TODO: FOR HASHED PASSWORDS, LEAVE A COMMENT WITH THE PLAIN TEXT PASSWORD!

-- users table
CREATE TABLE users (
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	username TEXT NOT NULL UNIQUE,
	password TEXT NOT NULL
);
-- users seed data
INSERT INTO users (id, username, password) VALUES (1, 'rsk227', '$2y$10$EdpP6Hf.TSIRZfyEqAgHjuMWX3r8CO23yMT8VTeyXj4H.Img2UbTO'); -- password: today
INSERT INTO users (id, username, password) VALUES (2, 'jrf268', '$2y$10$EdpP6Hf.TSIRZfyEqAgHjuMWX3r8CO23yMT8VTeyXj4H.Img2UbTO'); -- password: today
INSERT INTO users (id, username, password) VALUES (3, 'mx224', '$2y$10$EdpP6Hf.TSIRZfyEqAgHjuMWX3r8CO23yMT8VTeyXj4H.Img2UbTO'); -- password: today
INSERT INTO users (id, username, password) VALUES (4, 'sza7', '$2y$10$EdpP6Hf.TSIRZfyEqAgHjuMWX3r8CO23yMT8VTeyXj4H.Img2UbTO'); -- password: today

-- sessions table
CREATE TABLE sessions (
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	user_id INTEGER NOT NULL,
	session TEXT NOT NULL UNIQUE
);
-- order table
CREATE TABLE orders (
 	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	order_name TEXT NOT NULL,
	email TEXT,
 	phone TEXT,
    date TEXT NOT NULL,
    time TEXT NOT NULL,
    utensil TEXT,
    order_details TEXT
);

-- soups table
CREATE TABLE soups (
 	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	soup_name TEXT NOT NULL,
	soup_desc TEXT,
 	soup_day TEXT NOT NULL UNIQUE
);

CREATE TABLE images (
 	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
    image_extn TEXT NOT NULL,
	image_name TEXT NOT NULL,
 	image_desc TEXT NOT NULL
);


INSERT INTO soups (
                      soup_day,
                      soup_desc,
                      soup_name,
                      id
                  )
                  VALUES (
                      'Monday',
                      'A perfect combonation of hearty tomato, spices, and fragrant garlic',
                      'Tomato Garlic',
                      1
                  ),
                  (
                      'Tuesday',
                      'The umami of curry balanced by the sweetness of peas ',
                      'Curry Sweet Pea',
                      2
                  ),
                  (
                      'Wednesday',
                      ' A hearty vegeterian stew with an east african spice blend',
                      'East African Stew',
                      3
                  ),
                  (
                      'Thursday',
                      'Creamy potatoes and spices balanced by the subtle sharpness of cabbage',
                      'Creamy Potato Cabbage',
                      4
                  ),
                  (
                      'Friday',
                      'Our fan favorite curry stewed with cauliflower',
                      'Cauliflower Curry',
                      5
                  ),
                  (
                      'Saturday',
                      '',
                      'No Soup!',
                      6
                  ),
                  (
                      'Sunday',
                      '',
                      'No Soup Today!',
                      7
                  );

-- Source: https://www.facebook.com/pg/TempleOfZeusCornell/photos/?ref=page_internal
INSERT INTO images (
                       image_desc,
                       image_name,
                       image_extn
                   )
                   VALUES (
                       'Croissants are $2.70 each, while bagels are $2.00 each.',
                       'Crossants and Bagels',
                       'jpg'
                   ),
                   (
                       'Scones are $2.70 Each',
                       'Scones',
                       'jpg'
                   ),
                   (
                       'Please ask us for prices of cookies.',
                       'Cookies',
                       'jpg'
                   ),
                   (
                       'Please ask us for Bannana Bread Prices.',
                       'Bannana Bread',
                       'jpg'
                   ),
                   (
                       'We have tons of bagels!',
                       'Bagels',
                       'jpg'
                   ),
                   (
                       'Our salad prices range from $4.00 - $6.25',
                       'Salad',
                       'jpg'
                   ),
                   (
                       'We have tons of croissants!',
                       'Croissants',
                       'jpg'
                   );


COMMIT;
