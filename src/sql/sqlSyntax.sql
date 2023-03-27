-- Creatimg the database

CREATE DATABASE movies;

-- Creating the tables

CREATE TABLE actors(
	id int not null AUTO_INCREMENT PRIMARY KEY,
	name varchar(50),
	img varchar(100),
    about varchar(300),
    link varchar(500)
);

CREATE TABLE contact_us(
	id int not null AUTO_INCREMENT PRIMARY KEY,
	name varchar(50),
    surname varchar(50),
    email varchar(50),
	phone varchar(30),
    msg varchar(1000)
);

CREATE TABLE mnames(
	id int not null AUTO_INCREMENT PRIMARY KEY,
	name varchar(100),
    link varchar(100),
    img varchar(100),
    background varchar(100),
    mdate date,
    category varchar(10),
    nr int
);

CREATE TABLE most_watched(
	id int not null AUTO_INCREMENT PRIMARY KEY,
	mid int not null,
    FOREIGN KEY (mid) REFERENCES mnames(id)
);

CREATE TABLE movie_actors(
	id int not null AUTO_INCREMENT PRIMARY KEY,
	mid int not null,
    aid int not null,
    FOREIGN KEY (mid) REFERENCES mnames(id),
    FOREIGN KEY (aid) REFERENCES actors(id)
);

CREATE TABLE movie_details(
	id int not null AUTO_INCREMENT PRIMARY KEY,
	mid int not null,
	link varchar(1000),
    img varchar(100),
    trailer varchar(1000),
    playtime int,
    rateing varchar(10),
    description varchar(1000),
    FOREIGN KEY (mid) REFERENCES mnames(id)
);

CREATE TABLE mzhanret(
	id int not null AUTO_INCREMENT PRIMARY KEY,
	mid int not null,
	zh1 int,
    zh2 int,
    zh3 int,
    FOREIGN KEY (mid) REFERENCES mnames(id),
	FOREIGN KEY (zh1) REFERENCES zhanret(id),
	FOREIGN KEY (zh2) REFERENCES zhanret(id),
	FOREIGN KEY (zh3) REFERENCES zhanret(id)
);

CREATE TABLE series_episodes(
	id int not null AUTO_INCREMENT PRIMARY KEY,
	ssid int,
	episode int,
    link varchar(300),
    FOREIGN KEY (ssid) REFERENCES series_seasones(id)
);

CREATE TABLE series_seasones(
	id int not null AUTO_INCREMENT PRIMARY KEY,
	mid int,
	seasone int,
    img varchar(50),
    in_img varchar(50),
    about varchar(1000),
    trailer varchar(100),
    FOREIGN KEY (mid) REFERENCES mnames(id)
);

CREATE TABLE useri(
	id int not null AUTO_INCREMENT PRIMARY KEY,
	username varchar(100),
    name varchar(30),
    surname varchar(30),
    email varchar(100),
    gender varchar(1),
    phone varchar(30),
    salted_hash varchar(50),
    salted varchar(50),
    role varchar(1)
);

CREATE TABLE zhanret(
	id int not null AUTO_INCREMENT PRIMARY KEY,
	name varchar(30),
    link varchar(30)
);

-- Insarting data

INSERT INTO actors(name, img, about, link)
VALUES
    ("Jason Momoa","actorimg/jason momoa.png","Joseph Jason Namakaeha Momoa (born August 1, 1979) is an American actor. He made his acting debut as Jason Ioane on the syndicated action drama series Baywatch: Hawaii (1999–2001)...","https://en.wikipedia.org/wiki/Jason_Momoa"),
    ("Matthew McConaughey","actorimg/matthew-mcconaughey.png","Matthew David McConaughey (/məˈkɒnəheɪ/; born November 4, 1969) is an American actor...","https://en.wikipedia.org/wiki/Matthew_McConaughey"),
    ("Mackenzie Foy","actorimg/mackenzie_foy.png","Mackenzie Christine Foy (born November 10, 2000) is an American actress and model...","https://en.wikipedia.org/wiki/Mackenzie_Foy"),
    ("Emilia Clarke","actorimg/emilia.png","Emilia Isobel Euphemia Rose Clarke (born 23 October 1986) is a British actress. She studied at the Drama Centre London, appearing in a number of stage productions...","https://en.wikipedia.org/wiki/Emilia_Clarke"),
    ("Sam Claflin","actorimg/sam claflin.png","Samuel George Claflin (born 27 June 1986)[citation needed] is an English actor...","https://en.wikipedia.org/wiki/Sam_Claflin"),
    ("Dwayne Johnson","actorimg/Dwayne-Johnson.png","Dwayne Douglas Johnson
    (born May 2, 1972), also known by his ring name The Rock...","https://en.wikipedia.org/wiki/Dwayne_Johnson"),
    ("Gal Gadot","actorimg/Gal Gatod.png","Gal Gadot-Varsano (Hebrew: גל גדות [ˈɡal ɡaˈdot]; born 30 April 1985) is an Israeli actress and model...","https://en.wikipedia.org/wiki/Gal_Gadot"),
    ("Ryan Reynolds","actorimg/Ryan Reynolds.png","Ryan Rodney Reynolds (born October 23, 1976) is a Canadian actor and film producer...","https://en.wikipedia.org/wiki/Ryan_Reynolds"),
    ("Kit Harington","actorimg/kit2.png","Christopher Catesby (Kit) Harington (born 26 December 1986) is an English actor. He studied at the Royal Central School of Speech and Drama...","https://en.wikipedia.org/wiki/Kit_Harington"),
    ("Alvaro Morte","actorimg/Alvaro-Morte.png","Álvaro Antonio García Pérez
    (born 23 February 1975), known professionally as Álvaro Morte, is a Spanish actor...","https://en.wikipedia.org/wiki/%C3%81lvaro_Morte"),
    ("Ursula Corbero","actorimg/Ursula-Corbero.png","Úrsula Corberó Delgado (born 11 August 1989) is a Spanish actress and model...","https://en.wikipedia.org/wiki/%C3%9Arsula_Corber%C3%B3"),
    ("Jamie lorente","actorimg/jamie lorente.png","Jaime Lorente López (born December 12, 1991) is a Spanish actor and model. He is best known for playing the roles of Denver...","https://en.wikipedia.org/wiki/Jaime_Lorente"),
    ("Alba Flores","actorimg/alba flores.png","Alba González Villa (born October 27, 1986), known professionally as Alba Flores, is a
    Spanish actress...","https://en.wikipedia.org/wiki/Alba_Flores"),
    ("Itziar Ituno","actorimg/itziar ituno.png","Itziar Ituño Martínez (born June 18, 1974) is a Spanish actress. She is best known for her role as Inspector Raquel Murillo...","https://en.wikipedia.org/wiki/Itziar_Itu%C3%B1o"),
    ("Pedro Alonso","actorimg/Pedro-Alonso.png","Pedro Ochoro González Alonso Lopez (born 21 June 1971),
    known as Pedro Alonso,
    is a Spanish actor,
    writer and artist...","https://en.wikipedia.org/wiki/Pedro_Alonso"),
    ("Wentworth Miller","actorimg/Went-wentworth miller.png","Wentworth Earl Miller III
    (born June 2, 1972) is an
    American-British actor and screenwriter...<","https://en.wikipedia.org/wiki/Wentworth_Miller"),
    ("Dominic Purcell","actorimg/Dominic Purcell.png","Dominic Haakon
    Myrtved Purcell
    (born 17 February 1970)
    is a British-Australian actor...","https://en.wikipedia.org/wiki/Dominic_Purcell");


INSERT INTO mnames(name,link,img,background,mdate,category,nr)
VALUES
    ('Aquaman','aquaman','aquaman.jpg','movies_images/aquamancover.jpg','2018-11-26','movie',6),
    ('Coco','coco','coco.jpg','movies_images/cococover.jpg','2017-11-22','movie',6),
    ('Game of thrones','game of thrones','got.jpg','images/game-of-thrones-poster_85627-1920x1200.jpg','2019-05-19','serie',6),
    ('La casa de papel','la casa de papel seasons','la casa de papel 2.jpg','images/lacasacover.jpg','2021-12-03','serie',0),
    ('Squid games','squid games seasones','squid game.jpg','images/squidgamecover2.jpg','2021-09-17','serie',6),
    ('Prison break','prison break season','prison break.jpg','images/prisonbreakcover.jpg','2017-04-04','serie',0),
    ('Red notice','red notice','images.jpg','movies_images/rednoticecover.jpg','2021-11-04','movie',2),
    ('Interstellar','interstellar','download.jpg','movies_images/interstellarcover.jpg','2014-10-26','movie',0),
    ('Now you see me','now you see me','now you see me.jpg','movies_images/nowyouseemecover.jpg','2016-07-06','movie',1),
    ('Me before you','me before you','me before you.jpg','movies_images/mebeforeyoucover.jpg','2016-07-23','movie',1),
    ('I am legend','i am legend','iamlegend.jpg','movies_images/Iamlegendcover.jpg','2007-12-14','movie',0),
    ('Mulan','mulan','mulan.jpg','movies_images//mulancover.jpg','1998-07-05','movie',0);


INSERT INTO most_watched(mid)
VALUES
    (1),
    (2),
    (3),
    (5),
    (7),
    (9),
    (10);

INSERT INTO movie_actors(mid,aid)
VALUES
    (1,1),
    (8,2),
    (8,3),
    (10,4),
    (10,5),
    (7,6),
    (7,7),
    (7,8),
    (3,4),
    (3,9),
    (4,11),
    (4,12),
    (4,13),
    (4,14),
    (4,15),
    (4,16),
    (6,17),
    (6,18);

INSERT INTO movie_details(mid,link,img,trailer,playtime,rateing,description)
VALUES
    (1,'https://sbplay1.com/e/3hwyt3rnmnok?caption_1=https://sub.movie-series.net/aquaman/aquaman.vtt&sub_1=English','movies_images/aquamanmoviepic.jpg','https://www.youtube.com/watch?v=Bz-TzGR9tP0',153,'6.9',' Arthur Curry, the human-born heir to the underwater kingdom of Atlantis, goes on a quest to prevent a war between the worlds of ocean and land.'),
    (2,'https://mixdrop.co/e/4nxwxg6gillqkq?sub1=https://sub.movie-series.net/coco/coco.vtt&sub1_label=English','movies_images/cocomoviepic3.1.jpg','https://www.youtube.com/watch?v=jjudmcSxzpc',105,'8.5',"The story follows a 12-year-old boy named Miguel who is accidentally transported to the Land of the Dead, where he seeks the help of his deceased musician great-great-grandfather to return him to his family among the living and to reverse his family's ban on music."),
    (7,'rednoticevid.html','movies_images/rednoticemoviepic.jpg','https://www.youtube.com/watch?v=Pj0wz7zu3Ms',118,'6.8',' Red Notice is a 2021 American action, comedy and thriller film written and directed by Rawson Marshall Thurber. It stars Dwayne Johnson as an FBI agent who reluctantly teams up with a renowned art thief (Ryan Reynolds) in order to catch an even more notorious criminal (Gal Gadot).'),
    (8,'https://sbplay1.com/e/dgn8qnxvbdr0?caption_1=https://sub.movie-series.net/interstellar-hd-720p/interstellar-hd-720p.vtt&sub_1=English','movies_images/interstellarmoviepic.jpg','https://www.youtube.com/watch?v=zSWdZVtXT7E',169,'8.6',"Interstellar is about Earth's last chance to find a habitable planet before a lack of resources causes the human race to go extinct. The film's protagonist is Cooper (Matthew McConaughey), a former NASA pilot who is tasked with leading a mission through a wormhole to find a habitable planet in another galaxy."),
    (9,'https://mixdrop.co/e/j9m4voqgad1z1m?sub1=https://sub.movie-series.net/now-you-see-me-hd-720p/now-you-see-me-hd-720p.vtt&sub1_label=English','movies_images/nowyouseememoviepic.jpg','https://www.youtube.com/watch?v=C2NWGAqZhF4',115,'7.3',' The plot follows an FBI agent and an Interpol detective who track and attempt to bring to justice a team of magicians who pull off bank heists and robberies during their performances and reward their audiences with the money.'),
    (10,'https://mixdrop.co/e/enwve1g1foj6zq?sub1=https://sub.movie-series.net/me-before-you/me-before-you.vtt&sub1_label=English','movies_images//mebeforeyoumoviepic.png','https://www.youtube.com/watch?v=Eh993__rOxA',110,'7.6',"Young and quirky Louisa 'Lou' Clark (Emilia Clarke) moves from one job to the next to help her family make ends meet. Her cheerful attitude is put to the test when she becomes a caregiver for Will Traynor (Sam Claflin), a wealthy young banker left paralyzed from an accident two years earlier. Will's cynical outlook starts to change when Louisa shows him that life is worth living. As their bond deepens, their lives and hearts change in ways neither one could have imagined."),
    (11,'https://sbplay1.com/e/pmhs0i47zk8z?caption_1=https://sub.movie-series.net/i-am-legend-hd-720p/i-am-legend-hd-720p.vtt&sub_1=English','movies_images/iamlegendmoviepic.jpg','https://www.youtube.com/watch?v=ewpYq9rgg3w',101,'7.2',' Years after a plague kills most of humanity and transforms the rest into monsters, the sole survivor in New York City struggles valiantly to find a cure.'),
    (12,'https://sbplay1.com/e/i3ul1loeto8a?caption_1=https://sub.movie-series.net/mulan-hd-720p/mulan-hd-720p.vtt&sub_1=English','movies_images/mulanmoviepic.jpg','https://www.youtube.com/watch?v=sEQjLQA9qW4',89,'7.6',' To save her ailing father from going to war, a fearless young woman disguises herself as a man to defend her empire from northern invaders.'),
    (11,'https://sbplay1.com/e/pmhs0i47zk8z?caption_1=https://sub.movie-series.net/i-am-legend-hd-720p/i-am-legend-hd-720p.vtt&sub_1=English','movies_images/iamlegendmoviepic.jpg','https://www.youtube.com/watch?v=ewpYq9rgg3w',101,'7.2',' Years after a plague kills most of humanity and transforms the rest into monsters, the sole survivor in New York City struggles valiantly to find a cure.'),
    (12,'https://sbplay1.com/e/i3ul1loeto8a?caption_1=https://sub.movie-series.net/mulan-hd-720p/mulan-hd-720p.vtt&sub_1=English','movies_images/mulanmoviepic.jpg','https://www.youtube.com/watch?v=sEQjLQA9qW4',89,'7.6',' To save her ailing father from going to war, a fearless young woman disguises herself as a man to defend her empire from northern invaders.');

INSERT INTO mzhanret(mid,zh1,zh2,zh3)
VALUES
    (4,7,5,13),
    (3,2,5,6),
    (5,5,13,8),
    (6,1,2,13),
    (7,1,4,13),
    (8,11,2,9),
    (1,1,12,11),
    (9,1,7,13),
    (10,10,5,4),
    (11,8,11,13),
    (12,3,1,2),
    (2,3,2,9);

INSERT INTO series_episodes(ssid,episode,link)
VALUES
    (1,1,'https://sbplay1.com/e/qf84v1yi84re?caption_1=https://sub.movie-series.net/money-heist-season-1-episode-1/money-heist-season-1-episode-1.vtt&sub_1=English'),
    (1,2,'https://sbplay1.com/e/0fcxefyn2vq3?caption_1=https://sub.movie-series.net/money-heist-season-1-episode-2/money-heist-season-1-episode-2.vtt&sub_1=English'),
    (1,3,'https://sbplay1.com/e/yzipjelg5hbm?caption_1=https://sub.movie-series.net/money-heist-season-1-episode-3/money-heist-season-1-episode-3.vtt&sub_1=English'),
    (1,4,'https://sbplay1.com/e/9exfqmz5q4wq?caption_1=https://sub.movie-series.net/money-heist-season-1-episode-4/money-heist-season-1-episode-4.vtt&sub_1=English'),
    (1,5,'https://sbplay1.com/e/ix4p4298s2xs?caption_1=https://sub.movie-series.net/money-heist-season-1-episode-5/money-heist-season-1-episode-5.vtt&sub_1=English'),
    (13,1,'https://sbplay1.com/e/p9z25ko5pjrk?caption_1=https://sub.movie-series.net/game-of-thrones-season-1-episode-01-winter-is-coming/game-of-thrones-season-1-episode-01-winter-is-coming.vtt&sub_1=English'),
    (1,6,'https://sbplay1.com/e/55brzqwa53me?caption_1=https://sub.movie-series.net/money-heist-season-1-episode-6/money-heist-season-1-episode-6.vtt&sub_1=English'),
    (1,7,'https://sbplay1.com/e/dpv7y23tmk2g?caption_1=https://sub.movie-series.net/money-heist-season-1-episode-7/money-heist-season-1-episode-7.vtt&sub_1=English'),
    (1,8,'https://sbplay1.com/e/pa5d37w3suc5?caption_1=https://sub.movie-series.net/money-heist-season-1-episode-8/money-heist-season-1-episode-8.vtt&sub_1=English'),
    (1,9,'https://sbplay1.com/e/3jaql9555i2m?caption_1=https://sub.movie-series.net/money-heist-season-1-episode-9/money-heist-season-1-episode-9.vtt&sub_1=English'),
    (1,10,'https://sbplay1.com/e/l25urmmehu74?caption_1=https://sub.movie-series.net/money-heist-season-1-episode-10/money-heist-season-1-episode-10.vtt&sub_1=English'),
    (1,11,'https://sbplay1.com/e/5oi190e4g60p?caption_1=https://sub.movie-series.net/money-heist-season-1-episode-11/money-heist-season-1-episode-11.vtt&sub_1=English'),
    (1,12,'https://sbplay1.com/e/t22f5r0dwj8s?caption_1=https://sub.movie-series.net/money-heist-season-1-episode-12/money-heist-season-1-episode-12.vtt&sub_1=English'),
    (1,13,'https://sbplay1.com/e/vn7plj28dsj7?caption_1=https://sub.movie-series.net/money-heist-season-1-episode-13/money-heist-season-1-episode-13.vtt&sub_1=English'),
    (2,1,'https://sbplay1.com/e/1ontck53ankk?caption_1=https://sub.movie-series.net/money-heist-season-2-episode-1/money-heist-season-2-episode-1.vtt&sub_1=English'),
    (2,2,'https://sbplay1.com/e/irgpq05vrelg?caption_1=https://sub.movie-series.net/money-heist-season-2-episode-2/money-heist-season-2-episode-2.vtt&sub_1=English'),
    (2,3,'https://sbplay1.com/e/opl47wl391dx?caption_1=https://sub.movie-series.net/money-heist-season-2-episode-3/money-heist-season-2-episode-3.vtt&sub_1=English'),
    (2,4,'https://sbplay1.com/e/dc45jai7gl39?caption_1=https://sub.movie-series.net/money-heist-season-2-episode-4/money-heist-season-2-episode-4.vtt&sub_1=English'),
    (2,5,'https://sbplay1.com/e/y9d74668s8zf?caption_1=https://sub.movie-series.net/money-heist-season-2-episode-5/money-heist-season-2-episode-5.vtt&sub_1=English'),
    (2,6,'https://sbplay1.com/e/yz3ct9h49x4w?caption_1=https://sub.movie-series.net/money-heist-season-2-episode-6/money-heist-season-2-episode-6.vtt&sub_1=English'),
    (3,1,'https://sbplay1.com/e/f1n6qhdvae63?caption_1=https://sub.movie-series.net/money-heist-season-3-episode-1/money-heist-season-3-episode-1.vtt&sub_1=English'),
    (3,2,'https://sbplay1.com/e/7s04iux28us8?caption_1=https://sub.movie-series.net/money-heist-season-3-episode-2/money-heist-season-3-episode-2.vtt&sub_1=English'),
    (3,3,'https://sbplay1.com/e/cum3rje3bmzk?caption_1=https://sub.movie-series.net/money-heist-season-3-episode-3/money-heist-season-3-episode-3.vtt&sub_1=English'),
    (3,4,'https://sbplay1.com/e/nvdpxnc7vf65?caption_1=https://sub.movie-series.net/money-heist-season-3-episode-4/money-heist-season-3-episode-4.vtt&sub_1=English'),
    (3,5,'https://sbplay1.com/e/r1242yjbdgv7?caption_1=https://sub.movie-series.net/money-heist-season-3-episode-5/money-heist-season-3-episode-5.vtt&sub_1=English'),
    (3,6,'https://sbplay1.com/e/nz9jjnt1e4zy?caption_1=https://sub.movie-series.net/money-heist-season-3-episode-6/money-heist-season-3-episode-6.vtt&sub_1=English'),
    (3,7,'https://sbplay1.com/e/sa98m0s275nw?caption_1=https://sub.movie-series.net/money-heist-season-3-episode-7/money-heist-season-3-episode-7.vtt&sub_1=English'),
    (3,8,'https://sbplay1.com/e/aao8xffb5l34?caption_1=https://sub.movie-series.net/money-heist-season-3-episode-8/money-heist-season-3-episode-8.vtt&sub_1=English'),
    (4,1,'https://sbplay1.com/e/up88d3cemcoy?caption_1=https://sub.movie-series.net/money-heist-season-4-episode-1/money-heist-season-4-episode-1.vtt&sub_1=English'),
    (4,2,'https://sbplay1.com/e/11pitylea022?caption_1=https://sub.movie-series.net/money-heist-season-4-episode/money-heist-season-4-episode.vtt&sub_1=English'),
    (4,3,'https://sbplay1.com/e/fp8tj7bu5h80?caption_1=https://sub.movie-series.net/money-heist-season-4-episode-3/money-heist-season-4-episode-3.vtt&sub_1=English'),
    (4,4,'https://sbplay1.com/e/11dn2tajdl16?caption_1=https://sub.movie-series.net/money-heist-season-4-episode-4/money-heist-season-4-episode-4.vtt&sub_1=English'),
    (4,5,'https://sbplay1.com/e/5oadbjsbi18h?caption_1=https://sub.movie-series.net/money-heist-season-4-episode-5/money-heist-season-4-episode-5.vtt&sub_1=English'),
    (4,6,'https://sbplay1.com/e/mc5lzcp2muzk?caption_1=https://sub.movie-series.net/money-heist-season-4-episode-6/money-heist-season-4-episode-6.vtt&sub_1=English'),
    (4,7,'https://sbplay1.com/e/uem415xbp8td?caption_1=https://sub.movie-series.net/money-heist-season-4-episode-7/money-heist-season-4-episode-7.vtt&sub_1=English'),
    (4,8,'https://sbplay1.com/e/wxq9kni7us4d?caption_1=https://sub.movie-series.net/money-heist-season-4-episode-8/money-heist-season-4-episode-8.vtt&sub_1=English'),
    (5,1,'https://sbplay1.com/e/qdb2mllssvza?caption_1=https://sub.movie-series.net/money-heist-season-5-episode-1-el-final-del-camino/money-heist-season-5-episode-1-el-final-del-camino.v4.vtt&sub_1=English'),
    (5,2,'https://sbplay1.com/e/t7rw2ct8rybu?caption_1=https://sub.movie-series.net/money-heist-season-5-episode-2-crees-en-la-reencarnacion/money-heist-season-5-episode-2-crees-en-la-reencarnacion.vtt&sub_1=English'),
    (5,3,'https://sbplay1.com/e/iuvk16qvvmyw?caption_1=https://sub.movie-series.net/money-heist-season-5-episode-3-el-espectaculo-de-la-vida/money-heist-season-5-episode-3-el-espectaculo-de-la-vida.vtt&sub_1=English'),
    (5,4,'https://sbplay1.com/e/napg3e6d2raq?caption_1=https://sub.movie-series.net/money-heist-season-5-episode-4-tu-sitio-en-el-cielo/money-heist-season-5-episode-4-tu-sitio-en-el-cielo.vtt&sub_1=English'),
    (5,5,'https://sbplay1.com/e/hwvnwq8lo4l2?caption_1=https://sub.movie-series.net/money-heist-season-5-episode-5-vivir-muchas-vidas/money-heist-season-5-episode-5-vivir-muchas-vidas.vtt&sub_1=English'),
    (14,1,'https://sbplay1.com/e/x8z9qg8z3m68?caption_1=https://sub.movie-series.net/squid-game-season-1-episode-1/squid-game-season-1-episode-1.v6.vtt&sub_1=English'),
    (14,2,'https://sbplay1.com/e/utaosd2madwe?caption_1=https://sub.movie-series.net/squid-game-season-1-episode-2/squid-game-season-1-episode-2.vtt&sub_1=English'),
    (14,3,'https://sbplay1.com/e/joqr9zl0jqow?caption_1=https://sub.movie-series.net/squid-game-season-1-episode-3/squid-game-season-1-episode-3.vtt&sub_1=English'),
    (14,4,'https://sbplay1.com/e/au20au23exvg?caption_1=https://sub.movie-series.net/squid-game-season-1-episode-2-episode-4/squid-game-season-1-episode-2-episode-4.vtt&sub_1=English'),
    (14,5,'https://sbplay1.com/e/08zwaccmbyay?caption_1=https://sub.movie-series.net/squid-game-season-1-episode-5/squid-game-season-1-episode-5.vtt&sub_1=English'),
    (14,6,'https://sbplay1.com/e/2bq691w6rro5?caption_1=https://sub.movie-series.net/squid-game-season-1-episode-6/squid-game-season-1-episode-6.vtt&sub_1=English'),
    (14,7,'https://sbplay1.com/e/8ho939975k0v?caption_1=https://sub.movie-series.net/squid-game-season-1-episode-7/squid-game-season-1-episode-7.vtt&sub_1=English'),
    (14,8,'https://sbplay1.com/e/xhaeecgeb3j7?caption_1=https://sub.movie-series.net/squid-game-season-1-episode-8/squid-game-season-1-episode-8.vtt&sub_1=English'),
    (14,9,'https://sbplay1.com/e/bnkpnkptyc8t?caption_1=https://sub.movie-series.net/squid-game-season-1-episode-9/squid-game-season-1-episode-9.vtt&sub_1=English');

INSERT INTO series_seasones(mid,seasone,img,in_img,about,trailer)
VALUES
    (4,1,'images/la casa seasone 1.jpg','images/lacasa_s1moviepic1.jpg',' Eight thieves take hostages and lock themselves in the Royal Mint of Spain as a criminal mastermind manipulates the police to carry out his plan.','https://www.youtube.com/watch?v=hMANIarjT50'),
    (4,2,'images/la casa seasone 2.jpg','images/lacasa_s2moviepic.jpg','The biggest money heist in history is in jeopardy: hostages and thieves are growing increasingly tired and nervous, forensic scientists are tracking the house where the heist was planned, and the police are closer to finding out the identity of The Professor. Will they be able to fulfill their plan?','https://www.youtube.com/watch?v=3DtZ8FE0bGs'),
    (4,3,'images/la casa de papel 2.jpg','images/lacasa_s3moviepic.jpg',' This time it is not about money. This time it is about family.','https://www.youtube.com/watch?v=TFJwUwnShnA'),
    (4,4,'images/la casa season 4.jpg','images/lacasa_s4moviepic.jpg','Let the chaos begin.','https://www.youtube.com/watch?v=p_PJbmrX4uk'),
    (4,5,'images/la casa de papel.jpg','images/lacasa_s5moviepic.jpg',"The world's greatest heist comes to an end.",'https://www.youtube.com/watch?v=2ncLy2tHEwg'),
    (3,8,'images/gotseason8.jpg','movies_images/gots1moviespic.jpg','Like the novel, the season initially focuses on the family of nobleman Eddard "Ned" Stark, the Warde',''),
    (3,7,'images/gotseason7.jpg','movies_images/gots2moviespic.png','Season two mainly centers around the War of the Five Kings, fought among the leaders of Westerosi fa',''),
    (3,6,'images/gotseason6.jpg','movies_images/gots3moviepic.jpg','Like the novel, the season continues the storyline of The War of the Five Kings: after the death of ',''),
    (3,5,'images/gotseason5.jpg','movies_images/gots4moviepic.jpg','After the death of Robb Stark at The Red Wedding, all three remaining kings in Westeros believe they',''),
    (3,4,'images/gotseason4.jpg','movies_images/gots5moviepic.jpg','After the murders of King Joffrey and his grandfather Tywin Lannister, Cersei Lannisters young, inde',''),
    (3,3,'images/gotseason3.jpg','movies_images/gots6moviepic.jpg','The season follows the continuing struggle among the noble families of Westeros for the Iron Throne.',''),
    (3,2,'images/gotseason2.jpg','movies_images/gots7moviepic.jpg','After she lost her Dornish allies, her fleet, and House Tyrell, Daenerys, her Dothraki bloodriders, ',''),
    (3,1,'images/gotseason1.jpg','movies_images/gots8moviepic.jpg','The final season depicts the culmination of the series two primary conflicts: the Great War against ','https://www.youtube.com/watch?v=hMANIarjT50'),
    (5,1,'images/squid game.jpg','movies_images/sgs1moviepic.jpg','The series revolves around a contest where 456 players, all of whom are in deep financial debt, risk their lives to play a series of deadly childrens games for the chance to win a ₩45.6 billion prize. The title of the series draws from a similarly named Korean childrens game.','https://www.youtube.com/watch?v=oqxAJKy0ii4'),
    (6,1,'images/pbseason1.jpg','movies_images/pbs1moviepic.jpg','Prison Break revolves around two brothers: Lincoln Burrows, who has been sentenced to death for a crime he did not commit and his younger brother Michael Scofield, a genius who devises an elaborate plan to help him escape prison by purposely getting himself imprisoned.','https://www.youtube.com/watch?v=3zxSwYyb2Vk'),
    (6,2,'images/pbseason2.jpg','movies_images/pbs2moviepic.jpg','The brothers, along with six other prisoners at Fox River State Penitentiary, manage to escape, and the second season follows a massive manhunt chasing the group. Dubbed the Fox River Eight, the group splits and members go their individual way, occasionally meeting up to help each other.','https://www.youtube.com/watch?v=1D62H2UFNqg'),
    (6,3,'images/pbseason3.jpg','movies_images/pbs3moviepic.jpg','The season was shorter than the previous two because of the Writers Guild strike. Prison Break revolves around two brothers: one who has been sentenced to death for a crime he did not commit and his younger sibling, a genius structural engineer, who devises an elaborate plan to help him escape prison.','https://www.youtube.com/watch?v=1D62H2UFNqg'),
    (6,4,'images/pbseason4.jpg','movies_images/pbs4moviepic.jpg','After engineering an escape from the hellish Panamanian prison Sona, brothers Michael Scofield and Lincoln Burrows are determined to seek justice against The Company, the shadowy group responsible for destroying their lives and killing the woman Michael loves, Dr. Sara Tancredi.','https://www.youtube.com/watch?v=d6BRWxsrcNA'),
    (6,5,'images/pbseason5.jpg','movies_images/pbs5moviepic.jpg','Premise. Seven years after his apparent death, Michael Scofield resurfaces in the notorious Ogygia Prison in Sana, Yemen, under the name Kaniel Outis.','https://www.youtube.com/watch?v=iABCLLOrzZA');

INSERT INTO zhanret(name,link)
VALUES
    ('Action','action.html'),
    ('Adventure','adventure.html'),
    ('Animation','animation.html'),
    ('Comdey','comedy.html'),
    ('Drama','drama.html'),
    ('Fantasy','fantasy.html'),
    ('Heist','heist.html'),
    ('Horror Fiction','horror_fiction.html'),
    ('Mystery','mystery.html'),
    ('Romance','romance.html'),
    ('Science Fiction','science_fiction.html'),
    ('Superhero','superhero.html'),
    ('Thriller','thriller.html');