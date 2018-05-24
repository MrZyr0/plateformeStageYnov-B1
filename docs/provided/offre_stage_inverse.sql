DROP TABLE IF EXISTS `osi_offer`;

CREATE TABLE `osi_offer` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `type` varchar(255) NOT NULL DEFAULT '',
  `class` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `period` varchar(255) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `osi_offer` (`id`, `title`, `type`, `class`, `description`, `period`, `from_date`, `to_date`)
VALUES
	(1,'Développeur Web en Stage','Stage','B1 Ingésup','## Description\n\nLes étudiants de première année cherchent un stage. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus feugiat fermentum gravida. In eleifend venenatis dui, ut congue nisi ullamcorper ut. Nunc gravida rhoncus volutpat. In pharetra maximus purus quis elementum. Sed commodo auctor metus quis semper. Pellentesque sagittis condimentum massa ut rhoncus. Pellentesque luctus dignissim velit, eu malesuada tortor tristique eget. Fusce eget tempus orci.\n\n## Compétences acquises\n\nLes étudiants ont réalisé un **projet transvesal**. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus feugiat fermentum gravida. In eleifend venenatis dui, ut congue nisi ullamcorper ut. Nunc gravida rhoncus volutpat. In pharetra maximus purus quis elementum. Sed commodo auctor metus quis semper. Pellentesque sagittis condimentum massa ut rhoncus. Pellentesque luctus dignissim velit, eu malesuada tortor tristique eget. Fusce eget tempus orci.','4 semaines','2018-07-01','2018-08-31'),
	(2,'Développeur Web en Alternance','Alternance','B2 Ingésup','## Description\n\nLes étudiants de deuxième année cherchent une alternance. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus feugiat fermentum gravida. In eleifend venenatis dui, ut congue nisi ullamcorper ut. Nunc gravida rhoncus volutpat. In pharetra maximus purus quis elementum. Sed commodo auctor metus quis semper. Pellentesque sagittis condimentum massa ut rhoncus. Pellentesque luctus dignissim velit, eu malesuada tortor tristique eget. Fusce eget tempus orci.\n\n## Compétences acquises\n\nLes étudiants ont réalisé un **projet Symfony**. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus feugiat fermentum gravida. In eleifend venenatis dui, ut congue nisi ullamcorper ut. Nunc gravida rhoncus volutpat. In pharetra maximus purus quis elementum. Sed commodo auctor metus quis semper. Pellentesque sagittis condimentum massa ut rhoncus. Pellentesque luctus dignissim velit, eu malesuada tortor tristique eget. Fusce eget tempus orci.','une semaine sur deux','2018-08-31','2019-06-30');

DROP TABLE IF EXISTS `osi_offer_skill`;

CREATE TABLE `osi_offer_skill` (
  `offer_id` int(11) unsigned NOT NULL,
  `skill_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `osi_offer_skill` (`offer_id`, `skill_id`)
VALUES
	(1,1),
	(1,2),
	(1,3),
	(2,1),
	(2,2),
	(2,3),
	(2,4),
	(2,5);

DROP TABLE IF EXISTS `osi_skill`;

CREATE TABLE `osi_skill` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `osi_skill` (`id`, `title`)
VALUES
	(1,'PHP'),
	(2,'Ergonomie'),
	(3,'SEO'),
	(4,'Symfony'),
	(5,'Node.js');
