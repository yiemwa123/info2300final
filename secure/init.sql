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

INSERT INTO movies (id, movie_name, year, rating, synopsis, sources, image_id) VALUES (1, 'Ponyo', 2008, 'G', "The film tells the story of Ponyo (Nara), a goldfish who escapes from the ocean and is rescued by a five-year-old human boy, Sōsuke (Doi) after she is washed ashore while trapped in a glass jar. As they fall in love with each other, the story deals with resolving Ponyo's desire to become a human girl, against the devastating circumstances brought about by her acquisition and use of magic. ", "https://en.wikipedia.org/wiki/Ponyo", 1);
INSERT INTO movies (id, movie_name, year, rating, synopsis, sources, image_id)  VALUES (2, 'My Neighbor Totoro', 1988, 'G', "The film—which stars the voice actors Noriko Hidaka, Chika Sakamoto, and Hitoshi Takagi—tells the story of the two young daughters (Satsuki and Mei) of a professor and their interactions with friendly wood spirits in postwar rural Japan. ", 'https://en.wikipedia.org/wiki/My_Neighbor_Totoro', 2);
INSERT INTO movies (id, movie_name, year, rating, synopsis, sources, image_id)  VALUES (3, 'Spirited Away', 2001, 'PG', "Spirited Away tells the story of Chihiro Ogino (Hiiragi), a 10-year-old girl who, while moving to a new neighbourhood, enters the world of Kami (spirits) of Japanese Shinto folklore.[7] After her parents are turned into pigs by the witch Yubaba (Natsuki), Chihiro takes a job working in Yubaba's bathhouse to find a way to free herself and her parents and return to the human world.", "https://en.wikipedia.org/wiki/Spirited_Away", 3);
INSERT INTO movies (id, movie_name, year, rating, synopsis, sources, image_id)  VALUES (4, "Howl's Moving Castle", 2004, 'PG', "The film tells the story of a young, content milliner named Sophie who is turned into an old woman by a witch who enters her shop and curses her. She encounters a wizard named Howl, and gets caught up in his resistance to fighting for the king. ", "https://en.wikipedia.org/wiki/Howl%27s_Moving_Castle_(film)", 4);
INSERT INTO movies (id, movie_name, year, rating, synopsis, sources, image_id)  VALUES (5, 'Pom Poko', 1994, 'PG', "Consistent with Japanese folklore, the tanuki are portrayed as a highly sociable, mischievous species, who are able to use illusion science to transform into almost anything, but too fun-loving and too fond of tasty treats to be a real threat – unlike the kitsune (foxes) and other shape-shifters.", "https://en.wikipedia.org/wiki/Pom_Poko", 5);
INSERT INTO movies (id, movie_name, year, rating, synopsis, sources, image_id)  VALUES (6, 'Castle in the Sky', 1986, 'PG', "It follows the adventures of a young boy and girl in the late 19th century attempting to keep a magic crystal from a group of military agents, while searching for a legendary floating castle.", "https://en.wikipedia.org/wiki/Castle_in_the_Sky", 6);
INSERT INTO movies (id, movie_name, year, rating, synopsis, sources, image_id)  VALUES (7, "Kiki's Delivery Service", 1989, 'G', "The film tells the story of a young witch, Kiki, and her who moves to a new town and uses her flying ability to earn a living at a bakery. Along the way, she makes some friends", "https://en.wikipedia.org/wiki/Kiki%27s_Delivery_Service", 7);
INSERT INTO movies (id, movie_name, year, rating, synopsis, sources, image_id)  VALUES (8, "Nausicaä of the Valley of the Wind", 1984, 'PG', "Taking place in a future post-apocalyptic world, the film tells the story of Nausicaä (Shimamoto), the young princess of the Valley of the Wind. She becomes embroiled in a struggle with Tolmekia, a kingdom that tries to use an ancient weapon to eradicate a jungle of mutant giant insects. ", "https://en.wikipedia.org/wiki/Nausica%C3%A4_of_the_Valley_of_the_Wind_(film)", 8);
INSERT INTO movies (id, movie_name, year, rating, synopsis, sources, image_id)  VALUES (9, "Porco Rosso", 1992, 'PG', "The plot revolves around an Italian World War I ex-fighter ace, now living as a freelance bounty hunter chasing 'air pirates' in the Adriatic Sea. However, an unusual curse has transformed him into an anthropomorphic pig.", "https://en.wikipedia.org/wiki/Porco_Rosso", 9);
INSERT INTO movies (id, movie_name, year, rating, synopsis, sources, image_id)  VALUES (10, "The Secret World of Arrietty", 2010, 'G', "The film stars the voices of Mirai Shida, Ryunosuke Kamiki, Shinobu Otake, Keiko Takeshita, Tatsuya Fujiwara, Tomokazu Miura, and Kirin Kiki, and tells the story of a young Borrower (Shida) befriending a human boy (Kamiki), while trying to avoid being detected by the other humans. ", "https://en.wikipedia.org/wiki/Arrietty", 10);


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
