-- TODO: Put ALL SQL in between `BEGIN TRANSACTION` and `COMMIT`
BEGIN TRANSACTION;

-- TODO: create tables

CREATE TABLE movies(
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
    movie_name TEXT NOT NULL UNIQUE,
    year INTEGER,
    rating TEXT,
    synopsis TEXT,
    image_id INTEGER
);

INSERT INTO movies (id, movie_name, year, rating, synopsis, image_id) VALUES (1, 'Ponyo', 2008, 'G', 'Ponyo is a magical goldfish', 1);
INSERT INTO movies (id, movie_name, year, rating, synopsis, image_id)  VALUES (2, 'My Neighbor Totoro', 1988, 'G', 'Totoro is a forest spirit', 2);
INSERT INTO movies (id, movie_name, year, rating, synopsis, image_id)  VALUES (3, 'Spirited Away', 2001, 'PG', 'Chihiro', 3);
INSERT INTO movies (id, movie_name, year, rating, synopsis, image_id)  VALUES (4, "Howl's Moving Castle", 2004, 'PG', 'Howl', 4);
INSERT INTO movies (id, movie_name, year, rating, synopsis, image_id)  VALUES (5, 'Pom Poko', 1994, 'PG', 'Raccoon', 5);
INSERT INTO movies (id, movie_name, year, rating, synopsis, image_id)  VALUES (6, 'Castle in the Sky', 1986, 'PG', 'Laputa', 6);
INSERT INTO movies (id, movie_name, year, rating, synopsis, image_id)  VALUES (7, "Kiki's Delivery Service", 1989, 'G', 'Kiki', 7);
INSERT INTO movies (id, movie_name, year, rating, synopsis, image_id)  VALUES (8, "Nausicaä of the Valley of the Wind", 1984, 'PG', 'Valley of the Wind', 8);
INSERT INTO movies (id, movie_name, year, rating, synopsis, image_id)  VALUES (9, "Porco Rosso", 1992, 'PG', 'Pig', 9);
INSERT INTO movies (id, movie_name, year, rating, synopsis, image_id)  VALUES (10, "The Secret World of Arrietty", 2010, 'G', 'The littles', 10);


CREATE TABLE images (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
    image_name TEXT NOT NULL,
    image_ext TEXT NOT NULL,
    tag_id INTEGER
);

INSERT INTO images (id, image_name, image_ext, tag_id) VALUES (1, 'ponyo.png', 'png', 1);
INSERT INTO images (id, image_name, image_ext, tag_id) VALUES (2, 'totoro.jpg', 'jpg', 2);
INSERT INTO images (id, image_name, image_ext, tag_id) VALUES (3, 'spirit.png', 'png', 2);
INSERT INTO images (id, image_name, image_ext, tag_id) VALUES (4, 'howl.jpg', 'jpg', 1);
INSERT INTO images (id, image_name, image_ext, tag_id) VALUES (5, 'pom.jpg', 'jpg', 3);
INSERT INTO images (id, image_name, image_ext, tag_id) VALUES (6, 'castle.png', 'png', 1);
INSERT INTO images (id, image_name, image_ext, tag_id) VALUES (7, 'kiki.jpg', 'jpg', 4);
INSERT INTO images (id, image_name, image_ext, tag_id) VALUES (8, 'nausicaa.jpg', 'jpg', 4);
INSERT INTO images (id, image_name, image_ext, tag_id) VALUES (9, 'porco.jpg', 'jpg', 3);
INSERT INTO images (id, image_name, image_ext, tag_id) VALUES (10, 'secret.png', 'png', 5);

CREATE TABLE tags (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
    tag_name TEXT NOT NULL UNIQUE,
    image_id INTEGER
);

INSERT INTO tags (id, tag_name, image_id) VALUES (1, 'magic', 1);
INSERT INTO tags (id, tag_name, image_id) VALUES (2, 'spirit', 2);
INSERT INTO tags (id, tag_name, image_id) VALUES (3, 'animal', 5);
INSERT INTO tags (id, tag_name, image_id) VALUES (4, 'flying', 7);
INSERT INTO tags (id, tag_name, image_id) VALUES (5, 'little', 10);

-- CREATE TABLE `examples` (
-- 	`id`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
-- 	`name`	TEXT NOT NULL
-- );


-- TODO: initial seed data

-- INSERT INTO `examples` (id,name) VALUES (1, 'example-1');
-- INSERT INTO `examples` (id,name) VALUES (2, 'example-2');

COMMIT;
