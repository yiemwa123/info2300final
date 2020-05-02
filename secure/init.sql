-- TODO: Put ALL SQL in between `BEGIN TRANSACTION` and `COMMIT`
BEGIN TRANSACTION;

-- TODO: create tables

CREATE TABLE movies(
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
    movie_name TEXT NOT NULL UNIQUE,
    year INTEGER,
    rating TEXT,
    synopsis TEXT,
    sources TEXT,
    image_id INTEGER UNIQUE
);

INSERT INTO movies (id, movie_name, year, rating, synopsis, sources, image_id) VALUES (1, 'Ponyo', 2008, 'G', 'Ponyo is a magical goldfish', "https://en.wikipedia.org/wiki/Ponyo", 1);
INSERT INTO movies (id, movie_name, year, rating, synopsis, sources, image_id)  VALUES (2, 'My Neighbor Totoro', 1988, 'G', 'Totoro is a forest spirit', 'https://en.wikipedia.org/wiki/My_Neighbor_Totoro', 2);
INSERT INTO movies (id, movie_name, year, rating, synopsis, sources, image_id)  VALUES (3, 'Spirited Away', 2001, 'PG', 'Chihiro', "https://en.wikipedia.org/wiki/Spirited_Away", 3);
INSERT INTO movies (id, movie_name, year, rating, synopsis, sources, image_id)  VALUES (4, "Howl's Moving Castle", 2004, 'PG', 'Howl', "https://en.wikipedia.org/wiki/Howl%27s_Moving_Castle_(film)", 4);
INSERT INTO movies (id, movie_name, year, rating, synopsis, sources, image_id)  VALUES (5, 'Pom Poko', 1994, 'PG', 'Raccoon', "https://en.wikipedia.org/wiki/Pom_Poko", 5);
INSERT INTO movies (id, movie_name, year, rating, synopsis, sources, image_id)  VALUES (6, 'Castle in the Sky', 1986, 'PG', 'Laputa', "https://en.wikipedia.org/wiki/Castle_in_the_Sky", 6);
INSERT INTO movies (id, movie_name, year, rating, synopsis, sources, image_id)  VALUES (7, "Kiki's Delivery Service", 1989, 'G', 'Kiki', "https://en.wikipedia.org/wiki/Kiki%27s_Delivery_Service", 7);
INSERT INTO movies (id, movie_name, year, rating, synopsis, sources, image_id)  VALUES (8, "Nausicaä of the Valley of the Wind", 1984, 'PG', 'Valley of the Wind', "https://en.wikipedia.org/wiki/Nausica%C3%A4_of_the_Valley_of_the_Wind_(film)", 8);
INSERT INTO movies (id, movie_name, year, rating, synopsis, sources, image_id)  VALUES (9, "Porco Rosso", 1992, 'PG', 'Pig', "https://en.wikipedia.org/wiki/Porco_Rosso", 9);
INSERT INTO movies (id, movie_name, year, rating, synopsis, sources, image_id)  VALUES (10, "The Secret World of Arrietty", 2010, 'G', 'The littles', "https://en.wikipedia.org/wiki/Arrietty", 10);


CREATE TABLE images (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
    image_name TEXT NOT NULL,
    image_ext TEXT NOT NULL
);

INSERT INTO images (id, image_name, image_ext) VALUES (1, 'ponyo.png', 'png');
INSERT INTO images (id, image_name, image_ext) VALUES (2, 'totoro.jpg', 'jpg');
INSERT INTO images (id, image_name, image_ext) VALUES (3, 'spirit.png', 'png');
INSERT INTO images (id, image_name, image_ext) VALUES (4, 'howl.jpg', 'jpg');
INSERT INTO images (id, image_name, image_ext) VALUES (5, 'pom.jpg', 'jpg');
INSERT INTO images (id, image_name, image_ext) VALUES (6, 'castle.png', 'png');
INSERT INTO images (id, image_name, image_ext) VALUES (7, 'kiki.jpg', 'jpg');
INSERT INTO images (id, image_name, image_ext) VALUES (8, 'nausicaa.jpg', 'jpg');
INSERT INTO images (id, image_name, image_ext) VALUES (9, 'porco.jpg', 'jpg');
INSERT INTO images (id, image_name, image_ext) VALUES (10, 'secret.png', 'png');

CREATE TABLE tags (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
    tag_name TEXT NOT NULL UNIQUE
);

INSERT INTO tags (id, tag_name) VALUES (1, 'magic');
INSERT INTO tags (id, tag_name) VALUES (2, 'spirit');
INSERT INTO tags (id, tag_name) VALUES (3, 'animal');
INSERT INTO tags (id, tag_name) VALUES (4, 'flying');
INSERT INTO tags (id, tag_name) VALUES (5, 'little');
INSERT INTO tags (id, tag_name) VALUES (6, 'girl');
INSERT INTO tags (id, tag_name) VALUES (7, 'adventure');
INSERT INTO tags (id, tag_name) VALUES (8, 'miyazaki');




CREATE TABLE imagetotag (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
    image_id INTEGER NOT NULL,
    tag_id INTEGER NOT NULL
);

INSERT INTO imagetotag (id, image_id, tag_id) VALUES (1, 1, 1);
INSERT INTO imagetotag (id, image_id, tag_id) VALUES (2, 1, 3);
INSERT INTO imagetotag (id, image_id, tag_id) VALUES (3, 1, 6);
INSERT INTO imagetotag (id, image_id, tag_id) VALUES (4, 2, 2);
INSERT INTO imagetotag (id, image_id, tag_id) VALUES (5, 3, 2);
INSERT INTO imagetotag (id, image_id, tag_id) VALUES (6, 3, 6);
INSERT INTO imagetotag (id, image_id, tag_id) VALUES (7, 4, 1);
INSERT INTO imagetotag (id, image_id, tag_id) VALUES (8, 5, 3);
INSERT INTO imagetotag (id, image_id, tag_id) VALUES (9, 6, 7);
INSERT INTO imagetotag (id, image_id, tag_id) VALUES (10, 7, 7);
INSERT INTO imagetotag (id, image_id, tag_id) VALUES (11, 8, 8);
INSERT INTO imagetotag (id, image_id, tag_id) VALUES (12, 9, 3);
INSERT INTO imagetotag (id, image_id, tag_id) VALUES (13, 10, 6);
INSERT INTO imagetotag (id, image_id, tag_id) VALUES (14, 10, 5);
INSERT INTO imagetotag (id, image_id, tag_id) VALUES (15, 7, 4);
INSERT INTO imagetotag (id, image_id, tag_id) VALUES (16, 5, 2);
INSERT INTO imagetotag (id, image_id, tag_id) VALUES (17, 6, 8);
INSERT INTO imagetotag (id, image_id, tag_id) VALUES (18, 4, 4);
INSERT INTO imagetotag (id, image_id, tag_id) VALUES (19, 9, 4);
INSERT INTO imagetotag (id, image_id, tag_id) VALUES (20, 9, 7);
INSERT INTO imagetotag (id, image_id, tag_id) VALUES (21, 2, 6);
INSERT INTO imagetotag (id, image_id, tag_id) VALUES (22, 8, 7);
INSERT INTO imagetotag (id, image_id, tag_id) VALUES (23, 8, 6);
INSERT INTO imagetotag (id, image_id, tag_id) VALUES (24, 8, 4);
INSERT INTO imagetotag (id, image_id, tag_id) VALUES (25, 2, 8);

-- CREATE TABLE `examples` (
-- 	`id`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
-- 	`name`	TEXT NOT NULL
-- );


-- TODO: initial seed data

-- INSERT INTO `examples` (id,name) VALUES (1, 'example-1');
-- INSERT INTO `examples` (id,name) VALUES (2, 'example-2');

COMMIT;
