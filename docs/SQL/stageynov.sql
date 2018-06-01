-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 31 mai 2018 à 13:55
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9



SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `stageynov`
--

-- --------------------------------------------------------

--
-- Structure de la table `osi_offer`
--


DROP TABLE IF EXISTS `osi_offer`;

CREATE TABLE IF NOT EXISTS `osi_offer` (
    `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `title` varchar(255) NOT NULL DEFAULT '',
    `type` varchar(255) NOT NULL DEFAULT '',
    `class` varchar(255) NOT NULL DEFAULT '',
    `description` text NOT NULL,
    `period` varchar(255) DEFAULT NULL,
    `from_date` date DEFAULT NULL,
    `to_date` date DEFAULT NULL,
    `categorie` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `osi_offer`
--

INSERT INTO `osi_offer` (`id`, `title`, `type`, `class`, `description`, `period`, `from_date`, `to_date`, `categorie`) VALUES
(1, 'Développeur Web', 'Stage', 'BAC +1', 'Un développeur web chez Ynov c\'est avant tout un profil polyvalent et agile. Habitué dès la première année à travailler en projet, il apprend à maîtriser différentes technologies du web telles que des technologies client (*HTML5*, *CSS3*, *javascript*), des technologies serveur (*PHP*), du référencement (*SEO*). En deuxième année, les compétences sont approfondies et de nouvelles technologies sont ajoutées au programme comme le *node.js* pour le serveur et l\'approfondissement du référencement (*SEA*). Mais ce qui différencie nos étudiants du lot c\'est leur capacité à comprendre les attentes d\'un client et à s\'adapter à leurs demandes (*ergonomie*, *intégration*, *webmarketing*)', '4 semaines', '2018-07-01', '2018-08-31', 'informatique'),
(2, 'Animateur 3D en Alternance', 'Alternance', '2eme Année Audiovisuel', '## Description\n\nLes étudiants de deuxième année cherchent une alternance. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus feugiat fermentum gravida. In eleifend venenatis dui, ut congue nisi ullamcorper ut. Nunc gravida rhoncus volutpat. In pharetra maximus purus quis elementum. Sed commodo auctor metus quis semper. Pellentesque sagittis condimentum massa ut rhoncus. Pellentesque luctus dignissim velit, eu malesuada tortor tristique eget. Fusce eget tempus orci.\n\n## Compétences acquises\n\nLes étudiants ont réalisé un **projet Symfony**. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus feugiat fermentum gravida. In eleifend venenatis dui, ut congue nisi ullamcorper ut. Nunc gravida rhoncus volutpat. In pharetra maximus purus quis elementum. Sed commodo auctor metus quis semper. Pellentesque sagittis condimentum massa ut rhoncus. Pellentesque luctus dignissim velit, eu malesuada tortor tristique eget. Fusce eget tempus orci.', 'une semaine sur deux', '2018-08-31', '2019-06-30', 'audiovisuel'),
(3, 'Web designer en Alternance', 'Alternance', '4ème année Digital Business', '## Description\r\n\r\nLes étudiants de première année cherchent un stage. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus feugiat fermentum gravida. In eleifend venenatis dui, ut congue nisi ullamcorper ut. Nunc gravida rhoncus volutpat. In pharetra maximus purus quis elementum. Sed commodo auctor metus quis semper. Pellentesque sagittis condimentum massa ut rhoncus. Pellentesque luctus dignissim velit, eu malesuada tortor tristique eget. Fusce eget tempus orci.\r\n\r\n## Compétences acquises\r\n\r\nLes étudiants ont réalisé un **projet transvesal**. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus feugiat fermentum gravida. In eleifend venenatis dui, ut congue nisi ullamcorper ut. Nunc gravida rhoncus volutpat. In pharetra maximus purus quis elementum. Sed commodo auctor metus quis semper. Pellentesque sagittis condimentum massa ut rhoncus. Pellentesque luctus dignissim velit, eu malesuada tortor tristique eget. Fusce eget tempus orci.', '1 an', '2018-05-11', '2019-05-11', 'digital business'),
(4, 'Game Designer', 'Stage', '2ème année Jeux vidéos', '## Description\r\n\r\nLes étudiants de deuxième année cherchent une alternance. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus feugiat fermentum gravida. In eleifend venenatis dui, ut congue nisi ullamcorper ut. Nunc gravida rhoncus volutpat. In pharetra maximus purus quis elementum. Sed commodo auctor metus quis semper. Pellentesque sagittis condimentum massa ut rhoncus. Pellentesque luctus dignissim velit, eu malesuada tortor tristique eget. Fusce eget tempus orci.\r\n\r\n## Compétences acquises\r\n\r\nLes étudiants ont réalisé un **projet Symfony**. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus feugiat fermentum gravida. In eleifend venenatis dui, ut congue nisi ullamcorper ut. Nunc gravida rhoncus volutpat. In pharetra maximus purus quis elementum. Sed commodo auctor metus quis semper. Pellentesque sagittis condimentum massa ut rhoncus. Pellentesque luctus dignissim velit, eu malesuada tortor tristique eget. Fusce eget tempus orci.', '5 mois', '2018-06-18', '2018-11-30', 'jeux vidéos'),
(5, 'Designer graphique', 'Alternance', '5ème année Graphic Design', '## Description\r\n\r\nLes étudiants de deuxième année cherchent une alternance. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus feugiat fermentum gravida. In eleifend venenatis dui, ut congue nisi ullamcorper ut. Nunc gravida rhoncus volutpat. In pharetra maximus purus quis elementum. Sed commodo auctor metus quis semper. Pellentesque sagittis condimentum massa ut rhoncus. Pellentesque luctus dignissim velit, eu malesuada tortor tristique eget. Fusce eget tempus orci.\r\n\r\n## Compétences acquises\r\n\r\nLes étudiants ont réalisé un **projet Symfony**. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus feugiat fermentum gravida. In eleifend venenatis dui, ut congue nisi ullamcorper ut. Nunc gravida rhoncus volutpat. In pharetra maximus purus quis elementum. Sed commodo auctor metus quis semper. Pellentesque sagittis condimentum massa ut rhoncus. Pellentesque luctus dignissim velit, eu malesuada tortor tristique eget. Fusce eget tempus orci.', '1 an', '2019-12-30', '2018-12-26', 'webcom'),
(6, 'Chaudronnier aéronautique', 'Stage', '1ère année Aéronautique', '## Description\r\n\r\nLes étudiants de deuxième année cherchent une alternance. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus feugiat fermentum gravida. In eleifend venenatis dui, ut congue nisi ullamcorper ut. Nunc gravida rhoncus volutpat. In pharetra maximus purus quis elementum. Sed commodo auctor metus quis semper. Pellentesque sagittis condimentum massa ut rhoncus. Pellentesque luctus dignissim velit, eu malesuada tortor tristique eget. Fusce eget tempus orci.\r\n\r\n## Compétences acquises\r\n\r\nLes étudiants ont réalisé un **projet Symfony**. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus feugiat fermentum gravida. In eleifend venenatis dui, ut congue nisi ullamcorper ut. Nunc gravida rhoncus volutpat. In pharetra maximus purus quis elementum. Sed commodo auctor metus quis semper. Pellentesque sagittis condimentum massa ut rhoncus. Pellentesque luctus dignissim velit, eu malesuada tortor tristique eget. Fusce eget tempus orci.', '2 mois', '2018-07-17', '2018-09-16', 'aeronautique');

-- --------------------------------------------------------

--
-- Structure de la table `osi_offer_skill`
--

DROP TABLE IF EXISTS `osi_offer_skill`;
CREATE TABLE IF NOT EXISTS `osi_offer_skill` (
    `offer_id` int(11) UNSIGNED NOT NULL,
    `skill_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `osi_offer_skill`
--

INSERT INTO `osi_offer_skill` (`offer_id`, `skill_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `osi_skill`
--

DROP TABLE IF EXISTS `osi_skill`;
CREATE TABLE IF NOT EXISTS `osi_skill` (
    `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `title` varchar(255) NOT NULL DEFAULT '',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `osi_skill`
--

INSERT INTO `osi_skill` (`id`, `title`) VALUES
(1, 'PHP'),
(2, 'Ergonomie'),
(3, 'SEO'),
(4, 'Symfony'),
(5, 'Node.js');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
