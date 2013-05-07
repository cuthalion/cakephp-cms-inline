

DROP TABLE IF EXISTS `mensagens`;
DROP TABLE IF EXISTS `paginas`;
DROP TABLE IF EXISTS `seos`;
DROP TABLE IF EXISTS `sliders`;
DROP TABLE IF EXISTS `useres`;


CREATE TABLE `mensagens` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`titulo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`nome` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`idResposta` int(11) NOT NULL,
	`mensagem` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`lida` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`created` datetime NOT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=InnoDB;

CREATE TABLE `paginas` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`titulo` varchar(512) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`corpo` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`title` varchar(512) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`descricao` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`tags` varchar(512) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`slug` varchar(512) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`parent_id` int(11) DEFAULT NULL,
	`lft` int(11) DEFAULT NULL,
	`rght` int(11) DEFAULT NULL,
	`created` datetime NOT NULL,
	`modified` datetime NOT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=InnoDB;

CREATE TABLE `seos` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`robots` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`sitemap` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`modified` datetime NOT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=InnoDB;
	
INSERT INTO `seos` (`id`, `robots`, `sitemap`, `modified`) VALUES
(1, 'User-agent: * \r\nDisallow: /admin', NULL, '2013-05-07 16:50:26');


CREATE TABLE `sliders` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`arquivo` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`titulo` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`descricao` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`parent_id` int(11) DEFAULT NULL,
	`lft` int(11) NOT NULL,
	`rght` int(11) NOT NULL,
	`pagina_id` int(11) NOT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=MyISAM;

CREATE TABLE `useres` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`nome` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`email` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`password` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`titulo` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`created` datetime DEFAULT NULL,
	`modified` datetime DEFAULT NULL,
	`hash` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`acessos` int(11) NOT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=InnoDB;

