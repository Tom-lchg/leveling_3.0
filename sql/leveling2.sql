-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 06 mars 2023 à 05:46
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `leveling2`
--

DELIMITER $$
--
-- Procédures
--
DROP PROCEDURE IF EXISTS `deleteGroupePrivate`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteGroupePrivate` (IN `p_idGroupe` INT(3))   Begin
    delete from  tblgroupsprivate where idGroupe = p_idGroupe;
    delete from tblgroups where idGroupe = p_idGroupe;
End$$

DROP PROCEDURE IF EXISTS `deleteGroupePublic`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteGroupePublic` (IN `p_idGroupe` INT(3))   Begin
    delete from  tblgroupspublic where idGroupe = p_idGroupe;
    delete from tblgroups where idGroupe = p_idGroupe;
End$$

DROP PROCEDURE IF EXISTS `deleteJeuConsole`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteJeuConsole` (IN `p_idGame` INT(3))   Begin
    delete from  tblgamescs where idGame = p_idGame;
    delete from tblgames where idGame = p_idGame;
End$$

DROP PROCEDURE IF EXISTS `deleteJeuPc`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteJeuPc` (IN `p_idGame` INT(3))   Begin
    delete from  tblgamespc where idGame = p_idGame;
    delete from tblgames where idGame = p_idGame;
End$$

DROP PROCEDURE IF EXISTS `deleteUserAdmin`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteUserAdmin` (IN `p_idUser` INT(3))   Begin
    delete from  tblusersadmin where idUser = p_idUser;
    delete from tblusers where idUser = p_idUser;
End$$

DROP PROCEDURE IF EXISTS `deleteUserSimple`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteUserSimple` (IN `p_idUser` INT(3))   Begin
    delete from  tbluserssimple where idUser = p_idUser;
    delete from tblusers where idUser = p_idUser;
End$$

DROP PROCEDURE IF EXISTS `insertGroupePrivate`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertGroupePrivate` (IN `p_groupeMasquer` TINYINT(1), IN `p_groupePrivateNbUsers` INT(11), IN `p_groupePrivateidUser` INT(11), IN `p_groupeName` VARCHAR(50), IN `p_groupeDescription` VARCHAR(50), IN `p_groupeFkIdUser` INT(3), IN `p_groupePrivacy` VARCHAR(50), IN `p_groupeImg` LONGBLOB, IN `p_groupeTypeImg` VARCHAR(50), IN `p_groupeBanner` LONGBLOB, IN `p_groupeTypeBanner` VARCHAR(50))   Begin
        Declare p_idGroupe int(11);
        insert into tblgroups values(null,p_groupeName, p_groupeDescription, p_groupeFkIdUser, p_groupePrivacy,p_groupeImg, p_groupeTypeImg,p_groupeBanner, p_groupeTypeBanner);

        select idGroupe  into p_idGroupe from tblgroups
        where groupeName = p_groupeName and groupeDescription = p_groupeDescription and groupeFkIdUser = p_groupeFkIdUser and groupePrivacy = p_groupePrivacy;

        insert into tblgroupsprivate values (p_idGroupe, p_groupeMasquer, p_groupePrivateNbUsers,p_groupePrivateidUser, p_groupeName, p_groupeDescription,p_groupeFkIdUser, p_groupePrivacy,p_groupeImg, p_groupeTypeImg,p_groupeBanner, p_groupeTypeBanner);
    End$$

DROP PROCEDURE IF EXISTS `insertGroupePublic`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertGroupePublic` (IN `p_groupeMasquer` TINYINT(1), IN `p_groupePublicNbUsers` INT(11), IN `p_groupePublicidUser` INT(11), IN `p_groupeName` VARCHAR(50), IN `p_groupeDescription` VARCHAR(50), IN `p_groupeFkIdUser` INT(3), IN `p_groupePrivacy` VARCHAR(50), IN `p_groupeImg` LONGBLOB, IN `p_groupeTypeImg` VARCHAR(50), IN `p_groupeBanner` LONGBLOB, IN `p_groupeTypeBanner` VARCHAR(50))   Begin
        Declare p_idGroupe int(11);
        insert into tblgroups values(null,p_groupeName, p_groupeDescription, p_groupeFkIdUser, p_groupePrivacy,p_groupeImg, p_groupeTypeImg,p_groupeBanner, p_groupeTypeBanner);

        select idGroupe  into p_idGroupe from tblgroups
        where groupeName = p_groupeName and groupeDescription = p_groupeDescription and groupeFkIdUser = p_groupeFkIdUser and groupePrivacy = p_groupePrivacy;

        insert into tblgroupspublic values (p_idGroupe, p_groupeMasquer, p_groupePublicNbUsers,p_groupePublicidUser, p_groupeName, p_groupeDescription,p_groupeFkIdUser, p_groupePrivacy,p_groupeImg, p_groupeTypeImg,p_groupeBanner, p_groupeTypeBanner);
    End$$

DROP PROCEDURE IF EXISTS `insertJeuConsole`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertJeuConsole` (IN `p_gameCsSupport` VARCHAR(50), IN `p_gameCsDateSortie` VARCHAR(50), IN `p_gameCsPrix` FLOAT, IN `p_gameCsTaille` FLOAT, IN `p_gameCsModeleEco` VARCHAR(50), IN `p_gameName` VARCHAR(50), IN `p_gameDescription` VARCHAR(1000), IN `p_gameGenre` VARCHAR(100), IN `p_gameAvis` VARCHAR(100), IN `p_gameClassification` VARCHAR(100), IN `p_gameMode` VARCHAR(100), IN `p_gameImg` VARCHAR(100), IN `p_gameTrailer` VARCHAR(100), IN `p_gameImgOther` VARCHAR(100))   Begin
        Declare p_idGame int(11);
        insert into tblgames values(null,p_gameName, p_gameDescription, p_gameGenre, p_gameAvis, p_gameClassification, p_gameMode, p_gameImg, p_gameTrailer,p_gameImgOther);

        select idGame into p_idGame from tblgames
        where gameName = p_gameName and gameDescription = p_gameDescription and gameGenre = p_gameGenre and gameAvis = p_gameAvis and
        gameClassification = p_gameClassification and gameMode = p_gameMode;

        insert into tblgamescs values (p_idGame, p_gameCsSupport, p_gameCsDateSortie,p_gameCsPrix, p_gameCsTaille, p_gameCsModeleEco, p_gameName, p_gameDescription, p_gameGenre,
        p_gameAvis, p_gameClassification, p_gameMode, p_gameImg, p_gameTrailer,p_gameImgOther);
    End$$

DROP PROCEDURE IF EXISTS `insertJeuPc`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertJeuPc` (IN `p_gamePcModeleEco` VARCHAR(50), IN `p_gamePcPrix` FLOAT, IN `p_gamePcOs` VARCHAR(50), IN `p_gamePcProc` VARCHAR(50), IN `p_gamePcCg` VARCHAR(50), IN `p_gamePcTaille` FLOAT, IN `p_gameName` VARCHAR(50), IN `p_gameDescription` VARCHAR(1000), IN `p_gameGenre` VARCHAR(100), IN `p_gameAvis` VARCHAR(100), IN `p_gameClassification` VARCHAR(100), IN `p_gameMode` VARCHAR(100), IN `p_gameImg` VARCHAR(100), IN `p_gameTrailer` VARCHAR(100), IN `p_gameImgOther` VARCHAR(100))   Begin
        Declare p_idGame int(11);
        insert into tblgames values(null,p_gameName, p_gameDescription, p_gameGenre, p_gameAvis, p_gameClassification, p_gameMode, p_gameImg, p_gameTrailer,p_gameImgOther);

        select idGame into p_idGame from tblgames
        where gameName = p_gameName and gameDescription = p_gameDescription and gameGenre = p_gameGenre and gameAvis = p_gameAvis and
        gameClassification = p_gameClassification and gameMode = p_gameMode;

        insert into tblgamespc values (p_idGame, p_gamePcModeleEco, p_gamePcPrix,p_gamePcOs, p_gamePcProc, p_gamePcCg,p_gamePcTaille, p_gameName, p_gameDescription, p_gameGenre,
        p_gameAvis, p_gameClassification, p_gameMode, p_gameImg, p_gameTrailer,p_gameImgOther);
    End$$

DROP PROCEDURE IF EXISTS `insertUserAdmin`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertUserAdmin` (IN `p_userAdminGrade` VARCHAR(50), IN `p_userAdminFonction` VARCHAR(50), IN `p_userSimpleCanModify` INT(1), IN `p_userNom` VARCHAR(50), IN `p_userPrenom` VARCHAR(50), IN `p_userAge` VARCHAR(50), IN `p_userBio` VARCHAR(50), IN `p_userNaissance` VARCHAR(50), IN `p_userLevel` INT(11), IN `p_userPseudo` VARCHAR(50), IN `p_userMail` VARCHAR(50), IN `p_userPassword` VARCHAR(50), IN `p_userRole` VARCHAR(50), IN `p_userDateInscription` VARCHAR(50), IN `p_userImg` LONGBLOB, IN `p_userTypeImg` VARCHAR(50), IN `p_userBanner` LONGBLOB, IN `p_userTypeBanner` VARCHAR(50))   Begin
        Declare p_idUser int(11);
        insert into tblusers values(null,p_userNom, p_userPrenom, p_userAge, p_userBio,p_userNaissance,p_userLevel,p_userPseudo,p_userMail,p_userPassword,p_userRole,p_userDateInscription, p_userImg, p_userTypeImg, p_userBanner, p_userTypeBanner);

         select idUser into p_idUser from tblusers
        where userNom = p_userNom and userPrenom = p_userPrenom and userAge = p_userAge and userBio = p_userBio and userNaissance = p_userNaissance and userLevel =p_userLevel and userPseudo =p_userPseudo
        and userMail = p_userMail and userPassword = p_userPassword and userRole = p_userRole and userDateInscription =p_userDateInscription;

        insert into tblusersadmin values (p_idUser, p_userAdminGrade, p_userAdminFonction,p_userSimpleCanModify, p_userNom,p_userPrenom, p_userAge, p_userBio , p_userNaissance, p_userLevel, p_userPseudo, p_userMail, p_userPassword, p_userRole, p_userDateInscription,
        p_userImg, p_userTypeImg, p_userBanner, p_userTypeBanner);
    End$$

DROP PROCEDURE IF EXISTS `insertUserSimple`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertUserSimple` (IN `p_userSimplePlateforme` VARCHAR(50), `p_userSimpleCanModify` INT(1), IN `p_userNom` VARCHAR(50), IN `p_userPrenom` VARCHAR(50), IN `p_userAge` VARCHAR(50), IN `p_userBio` VARCHAR(50), IN `p_userNaissance` VARCHAR(50), IN `p_userLevel` INT(11), IN `p_userPseudo` VARCHAR(50), IN `p_userMail` VARCHAR(50), IN `p_userPassword` VARCHAR(50), IN `p_userRole` VARCHAR(50), IN `p_userDateInscription` VARCHAR(50), IN `p_userImg` LONGBLOB, IN `p_userTypeImg` VARCHAR(50), IN `p_userBanner` LONGBLOB, IN `p_userTypeBanner` VARCHAR(50))   Begin
        Declare p_idUser int(11);
        insert into tblusers values(null,p_userNom, p_userPrenom, p_userAge, p_userBio,p_userNaissance,p_userLevel,p_userPseudo,p_userMail,p_userPassword,p_userRole,p_userDateInscription, p_userImg, p_userTypeImg, p_userBanner, p_userTypeBanner);

        select idUser into p_idUser from tblusers
        where userNom = p_userNom and userPrenom = p_userPrenom and userAge = p_userAge and userBio = p_userBio and userNaissance = p_userNaissance and userLevel =p_userLevel and userPseudo =p_userPseudo
        and userMail = p_userMail and userPassword = p_userPassword and userRole = p_userRole and userDateInscription =p_userDateInscription;

        insert into tbluserssimple values (p_idUser, p_userSimplePlateforme, p_userSimpleCanModify, p_userNom,p_userPrenom, p_userAge, p_userBio , p_userNaissance, p_userLevel, p_userPseudo, p_userMail, p_userPassword, p_userRole, p_userDateInscription,
        p_userImg, p_userTypeImg,p_userBanner, p_userTypeBanner);
    End$$

DROP PROCEDURE IF EXISTS `updateGameConsole`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateGameConsole` (IN `p_idGame` INT(11), IN `p_gameCsSupport` VARCHAR(50), IN `p_gameCsDateSortie` VARCHAR(50), IN `p_gameCsPrix` FLOAT, IN `p_gameCsTaille` FLOAT, IN `p_gameCsModeleEco` VARCHAR(50), IN `p_gameName` VARCHAR(50), IN `p_gameDescription` VARCHAR(1000), IN `p_gameGenre` VARCHAR(100), IN `p_gameAvis` VARCHAR(100), IN `p_gameClassification` VARCHAR(100), IN `p_gameMode` VARCHAR(100), IN `p_gameImg` VARCHAR(100), IN `p_gameTrailer` VARCHAR(100), IN `p_gameImgOther` VARCHAR(100))   Begin
    update tblgamescs set gameCsSupport = p_gameCsSupport, gameCsDateSortie = p_gameCsDateSortie, gameCsPrix=p_gameCsPrix, gameCsTaille = p_gameCsTaille, gameCsModeleEco = p_gameCsModeleEco ,gameName = p_gameName, gameDescription = p_gameDescription,
    gameGenre = p_gameGenre ,gameAvis = p_gameAvis, gameClassification =p_gameClassification, gameMode =p_gameMode, gameImg =p_gameImg, gameTrailer = p_gameTrailer, gameImgOther = p_gameImgOther where idGame = p_idGame ; 

    update tblgames set gameName = p_gameName, gameDescription = p_gameDescription,gameGenre = p_gameGenre ,gameAvis = p_gameAvis, gameClassification =p_gameClassification, gameMode =p_gameMode, gameImg =p_gameImg, gameTrailer = p_gameTrailer, gameImgOther = p_gameImgOther 
    where idGame = p_idGame ;
End$$

DROP PROCEDURE IF EXISTS `updateGamePc`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateGamePc` (IN `p_idGame` INT(11), IN `p_gamePcModeleEco` VARCHAR(50), IN `p_gamePcPrix` FLOAT, IN `p_gamePcOs` VARCHAR(50), IN `p_gamePcProc` VARCHAR(50), IN `p_gamePcCg` VARCHAR(50), IN `p_gamePcTaille` FLOAT, IN `p_gameName` VARCHAR(50), IN `p_gameDescription` VARCHAR(1000), IN `p_gameGenre` VARCHAR(100), IN `p_gameAvis` VARCHAR(100), IN `p_gameClassification` VARCHAR(100), IN `p_gameMode` VARCHAR(100), IN `p_gameImg` VARCHAR(100), IN `p_gameTrailer` VARCHAR(100), IN `p_gameImgOther` VARCHAR(100))   Begin
    update tblgamespc set gamePcModeleEco = p_gamePcModeleEco, gamePcPrix = p_gamePcPrix, gamePcOs=p_gamePcOs, gamePcProc = p_gamePcProc, gamePcCg = p_gamePcCg , gamePcTaille = p_gamePcTaille, gameName = p_gameName, gameDescription = p_gameDescription,
    gameGenre = p_gameGenre ,gameAvis = p_gameAvis, gameClassification =p_gameClassification, gameMode =p_gameMode, gameImg =p_gameImg, gameTrailer = p_gameTrailer, gameImgOther = p_gameImgOther where idGame = p_idGame ; 

    update tblgames set gameName = p_gameName, gameDescription = p_gameDescription,gameGenre = p_gameGenre ,gameAvis = p_gameAvis, gameClassification =p_gameClassification, gameMode =p_gameMode, gameImg =p_gameImg, gameTrailer = p_gameTrailer, gameImgOther = p_gameImgOther 
    where idGame = p_idGame ;
End$$

DROP PROCEDURE IF EXISTS `updateGroupePrivate`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateGroupePrivate` (IN `p_idGroupe` INT(3), IN `p_groupeMasquer` TINYINT(1), IN `p_groupePrivateNbUsers` INT(11), IN `p_groupePrivateidUser` INT(11), IN `p_groupeName` VARCHAR(50), IN `p_groupeDescription` VARCHAR(50), IN `p_groupeFkIdUser` INT(11), IN `p_groupePrivacy` VARCHAR(50), IN `p_groupeImg` LONGBLOB, IN `p_groupeTypeImg` VARCHAR(50), IN `p_groupeBanner` LONGBLOB, IN `p_groupeTypeBanner` VARCHAR(50))   Begin
    update tblgroupsprivate set groupeMasquer = p_groupeMasquer, groupePrivateNbUsers = p_groupePrivateNbUsers, groupePrivateNbUsers = p_groupePrivateNbUsers, groupePrivateidUser = p_groupePrivateidUser, groupeName = p_groupeName, groupeDescription = p_groupeDescription,
     groupeFkIdUser = p_groupeFkIdUser , groupePrivacy = p_groupePrivacy, groupeImg = p_groupeImg, groupeTypeImg = p_groupeTypeImg, groupeBanner = p_groupeBanner, groupeTypeBanner = p_groupeTypeBanner
     where idGroupe = p_idGroupe ; 

    update tblgroups set  groupeName = p_groupeName, groupeDescription = p_groupeDescription, groupeFkIdUser = p_groupeFkIdUser , groupePrivacy = p_groupePrivacy, groupeImg = p_groupeImg, groupeTypeImg = p_groupeTypeImg, groupeBanner = p_groupeBanner,
     groupeTypeBanner = p_groupeTypeBanner where idGroupe = p_idGroupe ; 
End$$

DROP PROCEDURE IF EXISTS `updateGroupePublic`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateGroupePublic` (IN `p_idGroupe` INT(3), IN `p_groupeMasquer` TINYINT(1), IN `p_groupePublicNbUsers` INT(11), IN `p_groupePublicidUser` INT(11), IN `p_groupeName` VARCHAR(50), IN `p_groupeDescription` VARCHAR(50), IN `p_groupeFkIdUser` INT(11), IN `p_groupePrivacy` VARCHAR(50), IN `p_groupeImg` LONGBLOB, IN `p_groupeTypeImg` VARCHAR(50), IN `p_groupeBanner` LONGBLOB, IN `p_groupeTypeBanner` VARCHAR(50))   Begin
    update tblgroupspublic set groupeMasquer = p_groupeMasquer, groupePublicNbUsers = p_groupePublicNbUsers, groupePublicNbUsers = p_groupePublicNbUsers, groupePublicidUser = p_groupePublicidUser, groupeName = p_groupeName, groupeDescription = p_groupeDescription,
     groupeFkIdUser = p_groupeFkIdUser , groupePrivacy = p_groupePrivacy, groupeImg = p_groupeImg, groupeTypeImg = p_groupeTypeImg, groupeBanner = p_groupeBanner, groupeTypeBanner = p_groupeTypeBanner
     where idGroupe = p_idGroupe ; 

    update tblgroups set  groupeName = p_groupeName, groupeDescription = p_groupeDescription, groupeFkIdUser = p_groupeFkIdUser , groupePrivacy = p_groupePrivacy, groupeImg = p_groupeImg, groupeTypeImg = p_groupeTypeImg, groupeBanner = p_groupeBanner,
     groupeTypeBanner = p_groupeTypeBanner where idGroupe = p_idGroupe ; 
End$$

DROP PROCEDURE IF EXISTS `updateUserAdmin`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateUserAdmin` (IN `p_idUser` INT(11), IN `p_userAdminGrade` VARCHAR(50), IN `p_userAdminFonction` VARCHAR(50), IN `p_userCanModify` INT(1), IN `p_userNom` VARCHAR(50), IN `p_userPrenom` VARCHAR(50), IN `p_userAge` VARCHAR(50), IN `p_userBio` VARCHAR(50), IN `p_userNaissance` VARCHAR(50), IN `p_userLevel` INT(11), IN `p_userPseudo` VARCHAR(50), IN `p_userMail` VARCHAR(50), IN `p_userPassword` VARCHAR(50), IN `p_userRole` VARCHAR(50), IN `p_userDateInscription` VARCHAR(50), IN `p_userAdminImg` LONGBLOB, IN `p_userAdminTypeImg` VARCHAR(50), IN `p_userAdminBanner` LONGBLOB, IN `p_userAdminTypeBanner` VARCHAR(50))   Begin
    update tblusersadmin set userAdminGrade = p_userAdminGrade, userAdminFonction = p_userAdminFonction, userCanModify = p_userCanModify, userNom =p_userNom, userPrenom = p_userPrenom, userAge = p_userAge , userBio = p_userBio, userNaissance = p_userNaissance,
    userLevel = p_userLevel, userPseudo = p_userPseudo ,userMail = p_userMail, userPassword =p_userPassword, userRole =p_userRole, userDateInscription =p_userDateInscription, userAdminImg = p_userAdminImg, userAdminTypeImg = p_userAdminTypeImg,
    userAdminBanner = p_userAdminBanner, userAdminTypeBanner = p_userAdminTypeBanner where idUser = p_idUser ; 

    update tblusers set  userNom =p_userNom, userPrenom = p_userPrenom, userAge = p_userAge , userBio = p_userBio, userNaissance = p_userNaissance,userLevel = p_userLevel, userPseudo = p_userPseudo ,userMail = p_userMail, userPassword =p_userPassword,
     userRole =p_userRole, userDateInscription =p_userDateInscription, userImg = p_userAdminImg, userTypeImg = p_userAdminTypeImg, userBanner = p_userAdminBanner, userTypeBanner = p_userAdminTypeBanner where idUser = p_idUser ; 
End$$

DROP PROCEDURE IF EXISTS `updateUserSimple`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateUserSimple` (IN `p_idUser` INT(11), IN `p_userSimplePlateforme` VARCHAR(50), IN `p_userSimpleCanModify` INT(1), IN `p_userNom` VARCHAR(50), IN `p_userPrenom` VARCHAR(50), IN `p_userAge` VARCHAR(50), IN `p_userBio` VARCHAR(50), IN `p_userNaissance` VARCHAR(50), IN `p_userLevel` INT(11), IN `p_userPseudo` VARCHAR(50), IN `p_userMail` VARCHAR(50), IN `p_userPassword` VARCHAR(50), IN `p_userRole` VARCHAR(50), IN `p_userDateInscription` VARCHAR(50), IN `p_userSimpleImg` LONGBLOB, IN `p_userSimpleTypeImg` VARCHAR(50), IN `p_userSimpleBanner` LONGBLOB, IN `p_userSimpleTypeBanner` VARCHAR(50))   Begin
    update tbluserssimple set userSimplePlateforme = p_userSimplePlateforme, userSimpleCanModify = p_userSimpleCanModify, userNom =p_userNom, userPrenom = p_userPrenom, userAge = p_userAge , userBio = p_userBio, userNaissance = p_userNaissance,
    userLevel = p_userLevel, userPseudo = p_userPseudo ,userMail = p_userMail, userPassword =p_userPassword, userRole =p_userRole, userDateInscription =p_userDateInscription, userSimpleImg = p_userSimpleImg, userSimpleTypeImg = p_userSimpleTypeImg,
    userSimpleBanner = p_userSimpleBanner, userSimpleTypeBanner = p_userSimpleTypeBanner where idUser = p_idUser ; 

    update tblusers set  userNom =p_userNom, userPrenom = p_userPrenom, userAge = p_userAge , userBio = p_userBio, userNaissance = p_userNaissance,userLevel = p_userLevel, userPseudo = p_userPseudo ,userMail = p_userMail, userPassword =p_userPassword,
     userRole =p_userRole, userDateInscription =p_userDateInscription, userImg = p_userSimpleImg, userTypeImg = p_userSimpleTypeImg, userBanner = p_userSimpleBanner, userTypeBanner = p_userSimpleTypeBanner where idUser = p_idUser ; 
End$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `tblfriends`
--

DROP TABLE IF EXISTS `tblfriends`;
CREATE TABLE IF NOT EXISTS `tblfriends` (
  `idFriends` int NOT NULL AUTO_INCREMENT,
  `userConnected` int NOT NULL,
  `userFriend` int NOT NULL,
  PRIMARY KEY (`idFriends`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tblfriends`
--

INSERT INTO `tblfriends` (`idFriends`, `userConnected`, `userFriend`) VALUES
(5, 22, 21);

-- --------------------------------------------------------

--
-- Structure de la table `tblgames`
--

DROP TABLE IF EXISTS `tblgames`;
CREATE TABLE IF NOT EXISTS `tblgames` (
  `idGame` int NOT NULL AUTO_INCREMENT,
  `gameName` varchar(50) NOT NULL,
  `gameDescription` varchar(1000) NOT NULL,
  `gameGenre` varchar(100) NOT NULL,
  `gameAvis` varchar(100) NOT NULL,
  `gameClassification` varchar(100) NOT NULL,
  `gameMode` varchar(100) NOT NULL,
  `gameImg` varchar(100) NOT NULL,
  `gameTrailer` varchar(100) NOT NULL,
  `gameImgOther` varchar(100) NOT NULL,
  PRIMARY KEY (`idGame`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblgames`
--

INSERT INTO `tblgames` (`idGame`, `gameName`, `gameDescription`, `gameGenre`, `gameAvis`, `gameClassification`, `gameMode`, `gameImg`, `gameTrailer`, `gameImgOther`) VALUES
(10, 'FIFA', 'FIFA Football est le nom générique d’une série de jeux vidéo de football développé et édité annuellement par Electronic Arts depuis 1993.', 'Sport', '16', '+3', 'Multijoueur', 'AppJeuConsole', 'AppJeuConsole', 'AppJeuConsole'),
(11, 'Mario 8 Deluxe', 'Mario Kart 8 sur Switch est un jeu de course coloré et délirant qui reprend les personnages phares des grandes licences Nintendo. ', 'Course', '12', '+3', 'Multijoueur', 'AppJeuConsole', 'AppJeuConsole', 'AppJeuConsole'),
(12, 'Warzone', ' Warzone est un free-to-play disposant de deux modes de jeu : battle royale et pillage.', 'Guerre', '19', '+18', 'Multijoueur', 'AppJeuPc', 'AppJeuPc', 'AppJeuPc');

-- --------------------------------------------------------

--
-- Structure de la table `tblgamescs`
--

DROP TABLE IF EXISTS `tblgamescs`;
CREATE TABLE IF NOT EXISTS `tblgamescs` (
  `idGame` int NOT NULL,
  `gameCsSupport` varchar(50) NOT NULL,
  `gameCsDateSortie` varchar(50) NOT NULL,
  `gameCsPrix` float NOT NULL,
  `gameCsTaille` float NOT NULL,
  `gameCsModeleEco` varchar(50) NOT NULL,
  `gameName` varchar(50) NOT NULL,
  `gameDescription` varchar(1000) NOT NULL,
  `gameGenre` varchar(100) NOT NULL,
  `gameAvis` varchar(100) NOT NULL,
  `gameClassification` varchar(100) NOT NULL,
  `gameMode` varchar(100) NOT NULL,
  `gameImg` varchar(100) NOT NULL,
  `gameTrailer` varchar(100) NOT NULL,
  `gameImgOther` varchar(100) NOT NULL,
  KEY `idGame` (`idGame`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblgamescs`
--

INSERT INTO `tblgamescs` (`idGame`, `gameCsSupport`, `gameCsDateSortie`, `gameCsPrix`, `gameCsTaille`, `gameCsModeleEco`, `gameName`, `gameDescription`, `gameGenre`, `gameAvis`, `gameClassification`, `gameMode`, `gameImg`, `gameTrailer`, `gameImgOther`) VALUES
(10, 'XBOX', '12/12/2012', 40, 1212.3, 'Payant', 'FIFA', 'FIFA Football est le nom générique d’une série de jeux vidéo de football développé et édité annuellement par Electronic Arts depuis 1993.', 'Sport', '16', '+3', 'Multijoueur', 'AppJeuConsole', 'AppJeuConsole', 'AppJeuConsole'),
(11, 'Switch', '03/07/2019', 35, 30, 'Payant', 'Mario 8 Deluxe', 'Mario Kart 8 sur Switch est un jeu de course coloré et délirant qui reprend les personnages phares des grandes licences Nintendo. ', 'Course', '12', '+3', 'Multijoueur', 'AppJeuConsole', 'AppJeuConsole', 'AppJeuConsole');

-- --------------------------------------------------------

--
-- Structure de la table `tblgamespc`
--

DROP TABLE IF EXISTS `tblgamespc`;
CREATE TABLE IF NOT EXISTS `tblgamespc` (
  `idGame` int NOT NULL,
  `gamePcModeleEco` varchar(50) NOT NULL,
  `gamePcPrix` float NOT NULL,
  `gamePcOs` varchar(50) NOT NULL,
  `gamePcProc` varchar(50) NOT NULL,
  `gamePcCg` varchar(50) NOT NULL,
  `gamePcTaille` float NOT NULL,
  `gameName` varchar(50) NOT NULL,
  `gameDescription` varchar(1000) NOT NULL,
  `gameGenre` varchar(100) NOT NULL,
  `gameAvis` varchar(100) NOT NULL,
  `gameClassification` varchar(100) NOT NULL,
  `gameMode` varchar(100) NOT NULL,
  `gameImg` varchar(100) NOT NULL,
  `gameTrailer` varchar(100) NOT NULL,
  `gameImgOther` varchar(100) NOT NULL,
  KEY `idGame` (`idGame`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblgamespc`
--

INSERT INTO `tblgamespc` (`idGame`, `gamePcModeleEco`, `gamePcPrix`, `gamePcOs`, `gamePcProc`, `gamePcCg`, `gamePcTaille`, `gameName`, `gameDescription`, `gameGenre`, `gameAvis`, `gameClassification`, `gameMode`, `gameImg`, `gameTrailer`, `gameImgOther`) VALUES
(12, 'Gratuit', 0, 'Windows', 'I9 Intel', '2070', 90, 'Warzone', ' Warzone est un free-to-play disposant de deux modes de jeu : battle royale et pillage.', 'Guerre', '19', '+18', 'Multijoueur', 'AppJeuPc', 'AppJeuPc', 'AppJeuPc');

-- --------------------------------------------------------

--
-- Structure de la table `tblgroups`
--

DROP TABLE IF EXISTS `tblgroups`;
CREATE TABLE IF NOT EXISTS `tblgroups` (
  `idGroupe` int NOT NULL AUTO_INCREMENT,
  `groupeName` varchar(50) NOT NULL,
  `groupeDescription` varchar(50) NOT NULL,
  `groupeFkIdUser` int NOT NULL,
  `groupePrivacy` varchar(50) NOT NULL,
  `groupeImg` longblob,
  `groupeTypeImg` varchar(50) DEFAULT NULL,
  `groupeBanner` longblob,
  `groupeTypeBanner` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idGroupe`)
) ENGINE=MyISAM AUTO_INCREMENT=24538 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblgroups`
--

INSERT INTO `tblgroups` (`idGroupe`, `groupeName`, `groupeDescription`, `groupeFkIdUser`, `groupePrivacy`, `groupeImg`, `groupeTypeImg`, `groupeBanner`, `groupeTypeBanner`) VALUES
(24534, 'rrr', 'azr', 21, 'prive', 0x89504e470d0a1a0a0000000d49484452000004a2000000c008060000003717cbc8000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000054949444154785eedd83101c0300cc0b06c00c29f6df78c427d498f39f8d9dd330000000070d9fb1700000000ae32a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a000000808411050000004060e603366302a93c065fd00000000049454e44ae426082, 'image/png', 0x89504e470d0a1a0a0000000d49484452000004a2000000c008060000003717cbc8000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000054949444154785eedd83101c0300cc0b06c00c29f6df78c427d498f39f8d9dd330000000070d9fb1700000000ae32a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a000000808411050000004060e603366302a93c065fd00000000049454e44ae426082, 'image/png'),
(24535, 'ar', 'azr', 21, 'publique', 0x89504e470d0a1a0a0000000d49484452000000330000000b0806000000d288b5ea000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000002c49444154484b63141253f9cf304c0013941e1660d43383158c7a66b08251cf0c5630ea99c10a869167181800c9580161786779d20000000049454e44ae426082, 'image/png', 0x89504e470d0a1a0a0000000d49484452000000330000000b0806000000d288b5ea000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000002c49444154484b63141253f9cf304c0013941e1660d43383158c7a66b08251cf0c5630ea99c10a869167181800c9580161786779d20000000049454e44ae426082, 'image/png'),
(24536, 'f', 'f', 22, 'publique', 0x89504e470d0a1a0a0000000d49484452000000330000000b0806000000d288b5ea000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000002c49444154484b63141253f9cf304c0013941e1660d43383158c7a66b08251cf0c5630ea99c10a869167181800c9580161786779d20000000049454e44ae426082, 'image/png', 0x89504e470d0a1a0a0000000d49484452000000330000000b0806000000d288b5ea000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000002c49444154484b63141253f9cf304c0013941e1660d43383158c7a66b08251cf0c5630ea99c10a869167181800c9580161786779d20000000049454e44ae426082, 'image/png'),
(24537, 'r', 'r', 22, 'prive', 0x89504e470d0a1a0a0000000d494844520000000a0000001508060000007fb27ff3000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000002149444154384f63949393fbcf40046082d204c1a842bc6054215e308c1432300000cddf0183dd1148160000000049454e44ae426082, 'image/png', 0x89504e470d0a1a0a0000000d494844520000000a0000001508060000007fb27ff3000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000002149444154384f63949393fbcf40046082d204c1a842bc6054215e308c1432300000cddf0183dd1148160000000049454e44ae426082, 'image/png'),
(24533, 'azrazr', 'azr', 21, 'publique', 0x89504e470d0a1a0a0000000d49484452000004a2000000c008060000003717cbc8000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000054949444154785eedd83101c0300cc0b06c00c29f6df78c427d498f39f8d9dd330000000070d9fb1700000000ae32a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a000000808411050000004060e603366302a93c065fd00000000049454e44ae426082, 'image/png', 0x89504e470d0a1a0a0000000d49484452000004a2000000c008060000003717cbc8000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000054949444154785eedd83101c0300cc0b06c00c29f6df78c427d498f39f8d9dd330000000070d9fb1700000000ae32a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a000000808411050000004060e603366302a93c065fd00000000049454e44ae426082, 'image/png'),
(24532, 'osu', 'osu', 21, 'publique', 0x89504e470d0a1a0a0000000d49484452000004a2000000c008060000003717cbc8000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000054949444154785eedd83101c0300cc0b06c00c29f6df78c427d498f39f8d9dd330000000070d9fb1700000000ae32a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a000000808411050000004060e603366302a93c065fd00000000049454e44ae426082, 'image/png', 0x89504e470d0a1a0a0000000d49484452000004a2000000c008060000003717cbc8000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000054949444154785eedd83101c0300cc0b06c00c29f6df78c427d498f39f8d9dd330000000070d9fb1700000000ae32a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a000000808411050000004060e603366302a93c065fd00000000049454e44ae426082, 'image/png');

-- --------------------------------------------------------

--
-- Structure de la table `tblgroupsprivate`
--

DROP TABLE IF EXISTS `tblgroupsprivate`;
CREATE TABLE IF NOT EXISTS `tblgroupsprivate` (
  `idGroupe` int NOT NULL,
  `groupeMasquer` int NOT NULL,
  `groupePrivateNbUsers` int NOT NULL,
  `groupePrivateIdUser` int NOT NULL,
  `groupeName` varchar(50) NOT NULL,
  `groupeDescription` varchar(50) NOT NULL,
  `groupeFkIdUser` int NOT NULL,
  `groupePrivacy` varchar(50) NOT NULL,
  `groupeImg` longblob,
  `groupeTypeImg` varchar(50) DEFAULT NULL,
  `groupeBanner` longblob,
  `groupeTypeBanner` varchar(50) DEFAULT NULL,
  KEY `idGroupe` (`idGroupe`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblgroupsprivate`
--

INSERT INTO `tblgroupsprivate` (`idGroupe`, `groupeMasquer`, `groupePrivateNbUsers`, `groupePrivateIdUser`, `groupeName`, `groupeDescription`, `groupeFkIdUser`, `groupePrivacy`, `groupeImg`, `groupeTypeImg`, `groupeBanner`, `groupeTypeBanner`) VALUES
(24534, 0, 0, 21, 'rrr', 'azr', 21, 'prive', 0x89504e470d0a1a0a0000000d49484452000004a2000000c008060000003717cbc8000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000054949444154785eedd83101c0300cc0b06c00c29f6df78c427d498f39f8d9dd330000000070d9fb1700000000ae32a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a000000808411050000004060e603366302a93c065fd00000000049454e44ae426082, 'image/png', 0x89504e470d0a1a0a0000000d49484452000004a2000000c008060000003717cbc8000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000054949444154785eedd83101c0300cc0b06c00c29f6df78c427d498f39f8d9dd330000000070d9fb1700000000ae32a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a000000808411050000004060e603366302a93c065fd00000000049454e44ae426082, 'image/png'),
(24537, 0, 0, 22, 'r', 'r', 22, 'prive', 0x89504e470d0a1a0a0000000d494844520000000a0000001508060000007fb27ff3000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000002149444154384f63949393fbcf40046082d204c1a842bc6054215e308c1432300000cddf0183dd1148160000000049454e44ae426082, 'image/png', 0x89504e470d0a1a0a0000000d494844520000000a0000001508060000007fb27ff3000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000002149444154384f63949393fbcf40046082d204c1a842bc6054215e308c1432300000cddf0183dd1148160000000049454e44ae426082, 'image/png');

-- --------------------------------------------------------

--
-- Structure de la table `tblgroupspublic`
--

DROP TABLE IF EXISTS `tblgroupspublic`;
CREATE TABLE IF NOT EXISTS `tblgroupspublic` (
  `idGroupe` int NOT NULL,
  `groupeMasquer` int NOT NULL,
  `groupePublicNbUsers` int NOT NULL,
  `groupePublicidUser` int NOT NULL,
  `groupeName` varchar(50) NOT NULL,
  `groupeDescription` varchar(50) NOT NULL,
  `groupeFkIdUser` int NOT NULL,
  `groupePrivacy` varchar(50) NOT NULL,
  `groupeImg` longblob,
  `groupeTypeImg` varchar(50) DEFAULT NULL,
  `groupeBanner` longblob,
  `groupeTypeBanner` varchar(50) DEFAULT NULL,
  KEY `idGroupe` (`idGroupe`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblgroupspublic`
--

INSERT INTO `tblgroupspublic` (`idGroupe`, `groupeMasquer`, `groupePublicNbUsers`, `groupePublicidUser`, `groupeName`, `groupeDescription`, `groupeFkIdUser`, `groupePrivacy`, `groupeImg`, `groupeTypeImg`, `groupeBanner`, `groupeTypeBanner`) VALUES
(24532, 0, 0, 21, 'osu', 'osu', 21, 'publique', 0x89504e470d0a1a0a0000000d49484452000004a2000000c008060000003717cbc8000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000054949444154785eedd83101c0300cc0b06c00c29f6df78c427d498f39f8d9dd330000000070d9fb1700000000ae32a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a000000808411050000004060e603366302a93c065fd00000000049454e44ae426082, 'image/png', 0x89504e470d0a1a0a0000000d49484452000004a2000000c008060000003717cbc8000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000054949444154785eedd83101c0300cc0b06c00c29f6df78c427d498f39f8d9dd330000000070d9fb1700000000ae32a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a000000808411050000004060e603366302a93c065fd00000000049454e44ae426082, 'image/png'),
(24533, 0, 0, 21, 'azrazr', 'azr', 21, 'publique', 0x89504e470d0a1a0a0000000d49484452000004a2000000c008060000003717cbc8000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000054949444154785eedd83101c0300cc0b06c00c29f6df78c427d498f39f8d9dd330000000070d9fb1700000000ae32a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a000000808411050000004060e603366302a93c065fd00000000049454e44ae426082, 'image/png', 0x89504e470d0a1a0a0000000d49484452000004a2000000c008060000003717cbc8000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000054949444154785eedd83101c0300cc0b06c00c29f6df78c427d498f39f8d9dd330000000070d9fb1700000000ae32a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a000000808411050000004060e603366302a93c065fd00000000049454e44ae426082, 'image/png'),
(24535, 1, 0, 21, 'ar', 'azr', 21, 'publique', 0x89504e470d0a1a0a0000000d49484452000000330000000b0806000000d288b5ea000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000002c49444154484b63141253f9cf304c0013941e1660d43383158c7a66b08251cf0c5630ea99c10a869167181800c9580161786779d20000000049454e44ae426082, 'image/png', 0x89504e470d0a1a0a0000000d49484452000000330000000b0806000000d288b5ea000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000002c49444154484b63141253f9cf304c0013941e1660d43383158c7a66b08251cf0c5630ea99c10a869167181800c9580161786779d20000000049454e44ae426082, 'image/png'),
(24536, 1, 0, 22, 'f', 'f', 22, 'publique', 0x89504e470d0a1a0a0000000d49484452000000330000000b0806000000d288b5ea000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000002c49444154484b63141253f9cf304c0013941e1660d43383158c7a66b08251cf0c5630ea99c10a869167181800c9580161786779d20000000049454e44ae426082, 'image/png', 0x89504e470d0a1a0a0000000d49484452000000330000000b0806000000d288b5ea000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000002c49444154484b63141253f9cf304c0013941e1660d43383158c7a66b08251cf0c5630ea99c10a869167181800c9580161786779d20000000049454e44ae426082, 'image/png');

-- --------------------------------------------------------

--
-- Structure de la table `tblposts`
--

DROP TABLE IF EXISTS `tblposts`;
CREATE TABLE IF NOT EXISTS `tblposts` (
  `idPost` int NOT NULL AUTO_INCREMENT,
  `fkIdUser` int NOT NULL,
  `postContent` varchar(255) NOT NULL,
  `nblikes` int NOT NULL,
  `nbcommentaires` int NOT NULL,
  PRIMARY KEY (`idPost`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tblposts`
--

INSERT INTO `tblposts` (`idPost`, `fkIdUser`, `postContent`, `nblikes`, `nbcommentaires`) VALUES
(71, 21, 'Ouais le post', 0, 0),
(74, 22, 'c', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `tblusers`
--

DROP TABLE IF EXISTS `tblusers`;
CREATE TABLE IF NOT EXISTS `tblusers` (
  `idUser` int NOT NULL AUTO_INCREMENT,
  `userNom` varchar(50) NOT NULL,
  `userPrenom` varchar(50) NOT NULL,
  `userAge` varchar(50) NOT NULL,
  `userBio` varchar(50) NOT NULL,
  `userNaissance` varchar(50) NOT NULL,
  `userLevel` int NOT NULL,
  `userPseudo` varchar(50) NOT NULL,
  `userMail` varchar(50) NOT NULL,
  `userPassword` varchar(50) NOT NULL,
  `userRole` varchar(50) NOT NULL,
  `userDateInscription` varchar(50) NOT NULL,
  `userImg` longblob,
  `userTypeImg` varchar(50) DEFAULT NULL,
  `userBanner` longblob,
  `userTypeBanner` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblusers`
--

INSERT INTO `tblusers` (`idUser`, `userNom`, `userPrenom`, `userAge`, `userBio`, `userNaissance`, `userLevel`, `userPseudo`, `userMail`, `userPassword`, `userRole`, `userDateInscription`, `userImg`, `userTypeImg`, `userBanner`, `userTypeBanner`) VALUES
(14, 'LAUX', 'TomaSss', '22', 'I like sleep', '22/01/2002', 3, 'KIDEI', 'td@gmail.com', '456', 'Admin', '31/12/2023', 0x4a415641496d67, NULL, 0x4a41564142616e6e6572, NULL),
(19, 'LEVY', 'DanA', '21', 'Fort à tous les jeux', 'SKUSKU', 1, '21/12/2000', 'dlevy@gmail.com', '123', 'user', '11/02/2023', 0x4a415641496d67, NULL, 0x4a41564142616e6e6572, NULL),
(20, 'DUGIMONT', 'Garance', '19', 'je sais pas quoi mettre', '07/03/2004', 1, 'GARANCE', 'gdugimont@gmail.com', '123', 'admin', '11/02/2023', 0x4a415641496d67, NULL, 0x4a41564142616e6e6572, NULL),
(21, 'LAU', 'Tom', '22', 'Oui.', '2000-08-04', 1, 'KiSEi ', 't@gmail.com', 'a', 'user', 'dateInscription', 0x89504e470d0a1a0a0000000d49484452000004a2000000c008060000003717cbc8000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000054949444154785eedd83101c0300cc0b06c00c29f6df78c427d498f39f8d9dd330000000070d9fb1700000000ae32a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a000000808411050000004060e603366302a93c065fd00000000049454e44ae426082, 'image/png', 0x89504e470d0a1a0a0000000d49484452000004a2000000c008060000003717cbc8000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000054949444154785eedd83101c0300cc0b06c00c29f6df78c427d498f39f8d9dd330000000070d9fb1700000000ae32a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a000000808411050000004060e603366302a93c065fd00000000049454e44ae426082, 'image/png'),
(22, 'test', 'test', '24', 'Oui', '1900-08-04', 1, 'test', 'test@gmail.com', 't', 'user', 'dateInscription', 0x89504e470d0a1a0a0000000d49484452000000330000000b0806000000d288b5ea000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000002c49444154484b63141253f9cf304c0013941e1660d43383158c7a66b08251cf0c5630ea99c10a869167181800c9580161786779d20000000049454e44ae426082, 'image/png', 0x89504e470d0a1a0a0000000d49484452000000330000000b0806000000d288b5ea000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000002c49444154484b63141253f9cf304c0013941e1660d43383158c7a66b08251cf0c5630ea99c10a869167181800c9580161786779d20000000049454e44ae426082, 'image/png');

-- --------------------------------------------------------

--
-- Structure de la table `tblusersadmin`
--

DROP TABLE IF EXISTS `tblusersadmin`;
CREATE TABLE IF NOT EXISTS `tblusersadmin` (
  `idUser` int NOT NULL,
  `userAdminGrade` varchar(50) NOT NULL,
  `userAdminFonction` varchar(50) NOT NULL,
  `userCanModify` int NOT NULL,
  `userNom` varchar(50) NOT NULL,
  `userPrenom` varchar(50) NOT NULL,
  `userAge` varchar(50) NOT NULL,
  `userBio` varchar(50) NOT NULL,
  `userNaissance` varchar(50) NOT NULL,
  `userLevel` int NOT NULL,
  `userPseudo` varchar(50) NOT NULL,
  `userMail` varchar(50) NOT NULL,
  `userPassword` varchar(50) NOT NULL,
  `userRole` varchar(50) NOT NULL,
  `userDateInscription` varchar(50) NOT NULL,
  `userAdminImg` longblob,
  `userAdminTypeImg` varchar(50) DEFAULT NULL,
  `userAdminBanner` longblob,
  `userAdminTypeBanner` varchar(50) DEFAULT NULL,
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblusersadmin`
--

INSERT INTO `tblusersadmin` (`idUser`, `userAdminGrade`, `userAdminFonction`, `userCanModify`, `userNom`, `userPrenom`, `userAge`, `userBio`, `userNaissance`, `userLevel`, `userPseudo`, `userMail`, `userPassword`, `userRole`, `userDateInscription`, `userAdminImg`, `userAdminTypeImg`, `userAdminBanner`, `userAdminTypeBanner`) VALUES
(14, 'Super-Admin', 'Chef de serive', 1, 'LAUX', 'TomaSss', '22', 'I like sleep', '22/01/2002', 3, 'KIDEI', 'td@gmail.com', '456', 'Admin', '31/12/2023', 0x4a415641496d67, NULL, 0x4a41564142616e6e6572, NULL),
(20, 'Technicien support', 'Alternant', 1, 'DUGIMONT', 'Garance', '19', 'je sais pas quoi mettre', '07/03/2004', 1, 'GARANCE', 'gdugimont@gmail.com', '123', 'admin', '11/02/2023', 0x4a415641496d67, NULL, 0x4a41564142616e6e6572, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tbluserssimple`
--

DROP TABLE IF EXISTS `tbluserssimple`;
CREATE TABLE IF NOT EXISTS `tbluserssimple` (
  `idUser` int NOT NULL,
  `userSimplePlateforme` varchar(50) NOT NULL,
  `userSimpleCanModify` int NOT NULL,
  `userNom` varchar(50) NOT NULL,
  `userPrenom` varchar(50) NOT NULL,
  `userAge` varchar(50) NOT NULL,
  `userBio` varchar(50) NOT NULL,
  `userNaissance` varchar(50) NOT NULL,
  `userLevel` int NOT NULL,
  `userPseudo` varchar(50) NOT NULL,
  `userMail` varchar(50) NOT NULL,
  `userPassword` varchar(50) NOT NULL,
  `userRole` varchar(50) NOT NULL,
  `userDateInscription` varchar(50) NOT NULL,
  `userSimpleImg` longblob,
  `userSimpleTypeImg` varchar(50) DEFAULT NULL,
  `userSimpleBanner` longblob,
  `userSimpleTypeBanner` varchar(50) DEFAULT NULL,
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbluserssimple`
--

INSERT INTO `tbluserssimple` (`idUser`, `userSimplePlateforme`, `userSimpleCanModify`, `userNom`, `userPrenom`, `userAge`, `userBio`, `userNaissance`, `userLevel`, `userPseudo`, `userMail`, `userPassword`, `userRole`, `userDateInscription`, `userSimpleImg`, `userSimpleTypeImg`, `userSimpleBanner`, `userSimpleTypeBanner`) VALUES
(19, 'Application', 0, 'LEVY', 'DanA', '21', 'Fort à tous les jeux', 'SKUSKU', 1, '21/12/2000', 'dlevy@gmail.com', '123', 'user', '11/02/2023', 0x4a415641496d67, NULL, 0x4a41564142616e6e6572, NULL),
(21, 'PC', 0, 'LAU', 'Tom', '22', 'azr', '2000-08-04', 1, 'kisei', 't@gmail.com', 'a', 'user', 'dateInscription', 0x89504e470d0a1a0a0000000d49484452000004a2000000c008060000003717cbc8000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000054949444154785eedd83101c0300cc0b06c00c29f6df78c427d498f39f8d9dd330000000070d9fb1700000000ae32a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a000000808411050000004060e603366302a93c065fd00000000049454e44ae426082, 'image/png', 0x89504e470d0a1a0a0000000d49484452000004a2000000c008060000003717cbc8000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000054949444154785eedd83101c0300cc0b06c00c29f6df78c427d498f39f8d9dd330000000070d9fb1700000000ae32a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a0000008084110500000040c28802000000206144010000009030a20000000048185100000000248c28000000001246140000000009230a000000808411050000004060e603366302a93c065fd00000000049454e44ae426082, 'image/png'),
(22, 'PC', 0, 'test', 'test', '24', 'test', '1900-08-04', 1, 'test', 'test@gmail.com', 't', 'user', 'dateInscription', 0x89504e470d0a1a0a0000000d49484452000000330000000b0806000000d288b5ea000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000002c49444154484b63141253f9cf304c0013941e1660d43383158c7a66b08251cf0c5630ea99c10a869167181800c9580161786779d20000000049454e44ae426082, 'image/png', 0x89504e470d0a1a0a0000000d49484452000000330000000b0806000000d288b5ea000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000002c49444154484b63141253f9cf304c0013941e1660d43383158c7a66b08251cf0c5630ea99c10a869167181800c9580161786779d20000000049454e44ae426082, 'image/png');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tblgamescs`
--
ALTER TABLE `tblgamescs`
  ADD CONSTRAINT `tblgamescs_ibfk_1` FOREIGN KEY (`idGame`) REFERENCES `tblgames` (`idGame`);

--
-- Contraintes pour la table `tblgamespc`
--
ALTER TABLE `tblgamespc`
  ADD CONSTRAINT `tblgamespc_ibfk_1` FOREIGN KEY (`idGame`) REFERENCES `tblgames` (`idGame`);

--
-- Contraintes pour la table `tblusersadmin`
--
ALTER TABLE `tblusersadmin`
  ADD CONSTRAINT `tblusersadmin_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `tblusers` (`idUser`);

--
-- Contraintes pour la table `tbluserssimple`
--
ALTER TABLE `tbluserssimple`
  ADD CONSTRAINT `tbluserssimple_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `tblusers` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
