# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 192.168.10.10 (MySQL 5.6.33-0ubuntu0.14.04.1)
# Database: gousto
# Generation Time: 2017-07-19 22:07:13 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table ratings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ratings`;

CREATE TABLE `ratings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `recipes_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `ratings` WRITE;
/*!40000 ALTER TABLE `ratings` DISABLE KEYS */;

INSERT INTO `ratings` (`id`, `user_id`, `recipes_id`, `rating`)
VALUES
	(1,1,1,5),
	(2,1,2,3);

/*!40000 ALTER TABLE `ratings` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table recipes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `recipes`;

CREATE TABLE `recipes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `box_type` varchar(45) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `slug` varchar(45) DEFAULT NULL,
  `short_title` varchar(128) DEFAULT NULL,
  `marketing_description` mediumtext,
  `calories_kcal` int(11) DEFAULT NULL,
  `protein_grams` int(11) DEFAULT NULL,
  `fat_grams` int(11) DEFAULT NULL,
  `carbs_grams` int(11) DEFAULT NULL,
  `bulletpoint1` varchar(45) DEFAULT NULL,
  `bulletpoint2` varchar(45) DEFAULT NULL,
  `bulletpoint3` varchar(45) DEFAULT NULL,
  `recipe_diet_type_id` varchar(45) DEFAULT NULL,
  `season` varchar(45) DEFAULT NULL,
  `base` varchar(45) DEFAULT NULL,
  `protein_source` varchar(45) DEFAULT NULL,
  `preparation_time_minutes` int(11) DEFAULT NULL,
  `shelf_lfe_days` int(11) DEFAULT NULL,
  `equipment_needed` varchar(45) DEFAULT NULL,
  `origin_country` varchar(45) DEFAULT NULL,
  `recipe_cuisine` varchar(45) DEFAULT NULL,
  `in_your_box` varchar(128) DEFAULT NULL,
  `gousto_reference` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `recipes` WRITE;
/*!40000 ALTER TABLE `recipes` DISABLE KEYS */;

INSERT INTO `recipes` (`id`, `created_at`, `updated_at`, `box_type`, `title`, `slug`, `short_title`, `marketing_description`, `calories_kcal`, `protein_grams`, `fat_grams`, `carbs_grams`, `bulletpoint1`, `bulletpoint2`, `bulletpoint3`, `recipe_diet_type_id`, `season`, `base`, `protein_source`, `preparation_time_minutes`, `shelf_lfe_days`, `equipment_needed`, `origin_country`, `recipe_cuisine`, `in_your_box`, `gousto_reference`)
VALUES
	(1,'2015-06-30 17:58:00','2015-06-30 17:58:00','vegetarian','Sweet Chilli and Lime Beef on a Crunchy Fresh','sweet-chilli-and-lime-beef-on-a-crunchy-fresh','','Here we\'ve used onglet steak which is an extra flavoursome cut of beef that should never be cooked past medium rare. So if you\'re a fan of well done steak, this one may not be for you. However, if you love rare steak and fancy trying a new cut, please be',401,12,35,0,'','','','meat','all','noodles','beef',35,4,'Appetite','Great Britain','asian','',59),
	(2,'2015-06-30 17:58:00','2015-06-30 17:58:00','gourmet','Tamil Nadu Prawn Masala','tamil-nadu-prawn-masala','','Tamil Nadu is a state on the eastern coast of the southern tip of India. Curry from there is particularly famous and it\'s easy to see why. This one is brimming with exciting contrasting tastes from ingredients like chilli powder, coriander and fennel seed',524,12,22,0,'Vibrant & Fresh','Warming, not spicy','Curry From Scratch','fish','all','pasta','seafood',40,4,'Appetite','Great Britain','italian','king prawns, basmati rice, onion, tomatoes, garlic, ginger, ground tumeric, red chilli powder, ground cumin, fresh coriander, cu',58),
	(3,'2015-06-30 17:58:00','2015-06-30 17:58:00','vegetarian','Umbrian Wild Boar Salami Ragu with Linguine','umbrian-wild-boar-salami-ragu-with-linguine','','This delicious pasta dish comes from the Italian region of Umbria. It has a smoky and intense wild boar flavour which combines the earthy garlic, leek and onion flavours, while the chilli flakes add a nice deep aroma. Enjoy within 5-6 days of delivery.',609,17,29,0,'','','','meat','all','pasta','pork',35,4,'Appetite','Great Britain','british','',1),
	(4,'2015-06-30 17:58:00','2015-06-30 17:58:00','gourmet','Tenderstem and Portobello Mushrooms with Corn','tenderstem-and-portobello-mushrooms-with-corn','','One for those who like their veggies with a slightly spicy kick. However, those short on time, be warned \' this is a time-consuming dish, but if you\'re willing to spend a few extra minutes in the kitchen, the fresh corn mash is extraordinary and worth a t',508,28,20,0,'','','','vegetarian','all','','cheese',50,4,'None','Great Britain','british','',56),
	(5,'2015-06-30 17:58:00','2015-06-30 17:58:00','vegetarian','Fennel Crusted Pork with Italian Butter Beans','fennel-crusted-pork-with-italian-butter-beans','','A classic roast with a twist. The pork loin is marinated in rosemary, fennel seeds and chilli flakes then teamed with baked potato wedges and butter beans in tomato sauce. Enjoy within 5-6 days of delivery.',511,11,62,0,'A roast with a twist','Low fat & high protein','With roast potatoes','meat','all','beans/lentils','pork',45,4,'Pestle & Mortar (optional)','Great Britain','british','pork tenderloin, potatoes, butter beans, garlic, fennel seeds, medium onion, chilli flakes, fresh rosemary, tomatoes, vegetable ',55),
	(6,'2015-07-01 17:58:00','2015-07-01 17:58:00','gourmet','Pork Chilli','pork-chilli','','Succulent pork tenderloin and feathery white bean and parsnip mash mingle with feisty cumin seeds and tangy leek in this lighter, less conventional take on a British classic. Welcome to the outer limits of food!',401,12,35,0,'','','','meat','all','','pork',35,4,'Appetite','Great Britain','asian','',60),
	(7,'2015-07-02 17:58:00','2015-07-02 17:58:00','vegetarian','Courgette Pasta Rags','courgette-pasta-rags','','Kick-start the new year with some get-up and go with this lean green vitality machine. Protein-packed chicken and mineral-rich kale are blended into a smooth, nut-free version of pesto; creating the ultimate composition of nutrition and taste',524,12,22,0,'','','','meat','all','','chicken',40,4,'Appetite','Great Britain','british','',59),
	(8,'2015-07-03 17:58:00','2015-07-03 17:58:00','vegetarian','Homemade Eggs & Beans','homemade-egg-beans','','A Goustofied British institution, learn how to make beautifully golden breaded chicken escalopes drizzled in homemade garlic butter and served atop fluffy potato and broccoli mash.',609,17,29,0,'','','','meat','all','','eggs',35,3,'Appetite','Great Britain','italian','',2),
	(9,'2015-07-04 17:58:00','2015-07-04 17:58:00','gourmet','Grilled Jerusalem Fish','grilled-jerusalem-fish','','I love this super healthy fish dish, it contains a punch from zingy ginger, a kick from chili and a salty sweet balance from soy sauce and mirim. A cleansing and restorative meal, great for body and soul.',508,28,20,0,'','','','meat','all','','fish',50,4,'Appetite','Great Britain','mediterranean','',57),
	(10,'2015-07-05 17:58:00','2015-07-05 17:58:00','gourmet','Pork Katsu Curry','pork-katsu-curry','','Comprising all the best bits of the classic American number and none of the mayo, this is a warm & tasty chicken and bulgur salad with just a hint of Scandi influence. A beautifully summery medley of flavours and textures',511,11,62,0,'','','','meat','all','','pork',45,4,'Appetite','Great Britain','mexican','',56);

/*!40000 ALTER TABLE `recipes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `api_token` varchar(128) DEFAULT NULL,
  `remember_token` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `password`, `email`, `api_token`, `remember_token`)
VALUES
	(1,'John Doe',NULL,'jdoe@email.com','689vh7821945gj9jx2893u48347uhfi323h2c94839ygshkw837u64wcj4390bjvc029',NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
