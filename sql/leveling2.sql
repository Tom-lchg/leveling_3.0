-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 11 juin 2023 à 20:11
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertGroupePrivate` (IN `p_groupeMasquer` INT(2), IN `p_groupePrivateNbUsers` INT(11), IN `p_groupePrivateidUser` INT(11), IN `p_groupeName` VARCHAR(50), IN `p_groupeDescription` VARCHAR(50), IN `p_groupeFkIdUser` INT(3), IN `p_groupePrivacy` VARCHAR(50), IN `p_groupeImg` LONGBLOB, IN `p_groupeTypeImg` VARCHAR(50), IN `p_groupeBanner` LONGBLOB, IN `p_groupeTypeBanner` VARCHAR(50))   Begin
        Declare p_idGroupe int(11);
        insert into tblgroups values(null,p_groupeName, p_groupeDescription, p_groupeFkIdUser, p_groupePrivacy,p_groupeImg, p_groupeTypeImg,p_groupeBanner, p_groupeTypeBanner);

        select idGroupe  into p_idGroupe from tblgroups
        where groupeName = p_groupeName and groupeDescription = p_groupeDescription and groupeFkIdUser = p_groupeFkIdUser and groupePrivacy = p_groupePrivacy;

        insert into tblgroupsuser values (null, p_idGroupe, p_groupePrivateidUser );

        insert into tblgroupsprivate values (p_idGroupe, p_groupeMasquer, p_groupePrivateNbUsers,p_groupePrivateidUser, p_groupeName, p_groupeDescription,p_groupeFkIdUser, p_groupePrivacy,p_groupeImg, p_groupeTypeImg,p_groupeBanner, p_groupeTypeBanner);
    End$$

DROP PROCEDURE IF EXISTS `insertGroupePublic`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertGroupePublic` (IN `p_groupeMasquer` INT(2), IN `p_groupePublicNbUsers` INT(11), IN `p_groupePublicidUser` INT(11), IN `p_groupeName` VARCHAR(50), IN `p_groupeDescription` VARCHAR(50), IN `p_groupeFkIdUser` INT(3), IN `p_groupePrivacy` VARCHAR(50), IN `p_groupeImg` LONGBLOB, IN `p_groupeTypeImg` VARCHAR(50), IN `p_groupeBanner` LONGBLOB, IN `p_groupeTypeBanner` VARCHAR(50))   Begin
        Declare p_idGroupe int(11);
        insert into tblgroups values(null,p_groupeName, p_groupeDescription, p_groupeFkIdUser, p_groupePrivacy,p_groupeImg, p_groupeTypeImg,p_groupeBanner, p_groupeTypeBanner);

        select idGroupe  into p_idGroupe from tblgroups
        where groupeName = p_groupeName and groupeDescription = p_groupeDescription and groupeFkIdUser = p_groupeFkIdUser and groupePrivacy = p_groupePrivacy;

        insert into tblgroupsuser values (null, p_idGroupe, p_groupePublicidUser );
        
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertJeuPc` (IN `p_gamePCDateSortie` VARCHAR(50), IN `p_gamePcModeleEco` VARCHAR(50), IN `p_gamePcPrix` FLOAT, IN `p_gamePcOs` VARCHAR(50), IN `p_gamePcProc` VARCHAR(50), IN `p_gamePcCg` VARCHAR(50), IN `p_gamePcTaille` FLOAT, IN `p_gameName` VARCHAR(50), `p_gameDescription` VARCHAR(100), IN `p_gameGenre` VARCHAR(100), `p_gameAvis` VARCHAR(100), IN `p_gameClassification` VARCHAR(100), IN `p_gameMode` VARCHAR(100), IN `p_gameImg` VARCHAR(100), IN `p_gameTrailer` VARCHAR(100), IN `p_gameImgOther` VARCHAR(100))   Begin
        Declare p_idGame int(11);
        insert into tblgames values(null,p_gameName, p_gameDescription, p_gameGenre, p_gameAvis, p_gameClassification, p_gameMode, p_gameImg, p_gameTrailer,p_gameImgOther);

        select idGame into p_idGame from tblgames
        where gameName = p_gameName and gameDescription = p_gameDescription and gameGenre = p_gameGenre and gameAvis = p_gameAvis and
        gameClassification = p_gameClassification and gameMode = p_gameMode;

        insert into tblgamespc values (p_idGame,p_gamePCDateSortie, p_gamePcModeleEco, p_gamePcPrix,p_gamePcOs, p_gamePcProc, p_gamePcCg,p_gamePcTaille, p_gameName, p_gameDescription, p_gameGenre,
        p_gameAvis, p_gameClassification, p_gameMode, p_gameImg, p_gameTrailer,p_gameImgOther);
    End$$

DROP PROCEDURE IF EXISTS `insertUserAdmin`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertUserAdmin` (IN `p_userAdminGrade` VARCHAR(50), IN `p_userAdminFonction` VARCHAR(50), IN `p_userSimpleCanModify` INT(1), IN `p_userNom` VARCHAR(50), IN `p_userPrenom` VARCHAR(50), IN `p_userAge` VARCHAR(50), IN `p_userBio` VARCHAR(50), IN `p_userNaissance` VARCHAR(50), IN `p_userLevel` INT(11), IN `p_userPseudo` VARCHAR(50), IN `p_userMail` VARCHAR(50), IN `p_userPassword` VARCHAR(255), IN `p_userRole` VARCHAR(50), IN `p_userDateInscription` VARCHAR(50), IN `p_userImg` LONGBLOB, IN `p_userTypeImg` VARCHAR(50), IN `p_userBanner` LONGBLOB, IN `p_userTypeBanner` VARCHAR(50))   Begin
        Declare p_idUser int(11);
        insert into tblusers values(null,p_userNom, p_userPrenom, p_userAge, p_userBio,p_userNaissance,p_userLevel,p_userPseudo,p_userMail,p_userPassword,p_userRole,p_userDateInscription, p_userImg, p_userTypeImg, p_userBanner, p_userTypeBanner);

         select idUser into p_idUser from tblusers
        where userNom = p_userNom and userPrenom = p_userPrenom and userAge = p_userAge and userBio = p_userBio and userNaissance = p_userNaissance and userLevel =p_userLevel and userPseudo =p_userPseudo
        and userMail = p_userMail and userPassword = p_userPassword and userRole = p_userRole and userDateInscription =p_userDateInscription;

        insert into tblusersadmin values (p_idUser, p_userAdminGrade, p_userAdminFonction,p_userSimpleCanModify, p_userNom,p_userPrenom, p_userAge, p_userBio , p_userNaissance, p_userLevel, p_userPseudo, p_userMail, p_userPassword, p_userRole, p_userDateInscription,
        p_userImg, p_userTypeImg, p_userBanner, p_userTypeBanner);
    End$$

DROP PROCEDURE IF EXISTS `insertUserInGroupe`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertUserInGroupe` (IN `p_idGroupe` INT(4), IN `p_idUser` INT(4))   Begin
    insert into tblgroupsuser values(null,p_idGroupe, p_idUser);
End$$

DROP PROCEDURE IF EXISTS `insertUserSimple`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertUserSimple` (IN `p_userSimplePlateforme` VARCHAR(50), IN `p_userSimpleCanModify` INT(1), IN `p_userNom` VARCHAR(50), IN `p_userPrenom` VARCHAR(50), IN `p_userAge` VARCHAR(50), IN `p_userBio` VARCHAR(50), IN `p_userNaissance` VARCHAR(50), IN `p_userLevel` INT(11), IN `p_userPseudo` VARCHAR(50), IN `p_userMail` VARCHAR(50), IN `p_userPassword` VARCHAR(255), IN `p_userRole` VARCHAR(50), IN `p_userDateInscription` VARCHAR(50), IN `p_userImg` LONGBLOB, IN `p_userTypeImg` VARCHAR(50), IN `p_userBanner` LONGBLOB, IN `p_userTypeBanner` VARCHAR(50), IN `p_userXP` INT(6))   Begin
        Declare p_idUser int(11);
        insert into tblusers values(null,p_userNom, p_userPrenom, p_userAge, p_userBio,p_userNaissance,p_userLevel,p_userPseudo,p_userMail,p_userPassword,p_userRole,p_userDateInscription, p_userImg, p_userTypeImg, p_userBanner, p_userTypeBanner, p_userXP);

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
-- Structure de la table `tblchat`
--

DROP TABLE IF EXISTS `tblchat`;
CREATE TABLE IF NOT EXISTS `tblchat` (
  `idChat` int NOT NULL AUTO_INCREMENT,
  `chatMessage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `chatHeure` time NOT NULL,
  `fkIdUser` int NOT NULL,
  PRIMARY KEY (`idChat`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tblgameposts`
--

DROP TABLE IF EXISTS `tblgameposts`;
CREATE TABLE IF NOT EXISTS `tblgameposts` (
  `idGamePost` int NOT NULL AUTO_INCREMENT,
  `postContent` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `postGrade` int NOT NULL,
  `fkidUser` int NOT NULL,
  `fkidGame` int NOT NULL,
  PRIMARY KEY (`idGamePost`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tblgames`
--

DROP TABLE IF EXISTS `tblgames`;
CREATE TABLE IF NOT EXISTS `tblgames` (
  `idGame` int NOT NULL AUTO_INCREMENT,
  `gameName` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `gameDescription` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `gameGenre` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `gameAvis` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `gameClassification` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `gameMode` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `gameImg` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `gameTrailer` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `gameImgOther` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`idGame`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tblgamescs`
--

DROP TABLE IF EXISTS `tblgamescs`;
CREATE TABLE IF NOT EXISTS `tblgamescs` (
  `idGame` int NOT NULL,
  `gameCsSupport` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `gameCsDateSortie` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `gameCsPrix` float NOT NULL,
  `gameCsTaille` float NOT NULL,
  `gameCsModeleEco` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `gameName` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `gameDescription` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `gameGenre` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `gameAvis` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `gameClassification` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `gameMode` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `gameImg` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `gameTrailer` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `gameImgOther` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  KEY `idGame` (`idGame`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tblgamespc`
--

DROP TABLE IF EXISTS `tblgamespc`;
CREATE TABLE IF NOT EXISTS `tblgamespc` (
  `idGame` int NOT NULL,
  `gamePCDateSortie` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `gamePcModeleEco` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `gamePcPrix` float NOT NULL,
  `gamePcOs` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `gamePcProc` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `gamePcCg` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `gamePcTaille` float NOT NULL,
  `gameName` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `gameDescription` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `gameGenre` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `gameAvis` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `gameClassification` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `gameMode` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `gameImg` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `gameTrailer` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `gameImgOther` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  KEY `idGame` (`idGame`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tblgroups`
--

DROP TABLE IF EXISTS `tblgroups`;
CREATE TABLE IF NOT EXISTS `tblgroups` (
  `idGroupe` int NOT NULL AUTO_INCREMENT,
  `groupeName` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `groupeDescription` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `groupeFkIdUser` int NOT NULL,
  `groupePrivacy` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `groupeImg` longblob,
  `groupeTypeImg` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `groupeBanner` longblob,
  `groupeTypeBanner` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idGroupe`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

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
  `groupeName` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `groupeDescription` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `groupeFkIdUser` int NOT NULL,
  `groupePrivacy` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `groupeImg` longblob,
  `groupeTypeImg` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `groupeBanner` longblob,
  `groupeTypeBanner` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  KEY `idGroupe` (`idGroupe`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

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
  `groupeName` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `groupeDescription` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `groupeFkIdUser` int NOT NULL,
  `groupePrivacy` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `groupeImg` longblob,
  `groupeTypeImg` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `groupeBanner` longblob,
  `groupeTypeBanner` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  KEY `idGroupe` (`idGroupe`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tblgroupsuser`
--

DROP TABLE IF EXISTS `tblgroupsuser`;
CREATE TABLE IF NOT EXISTS `tblgroupsuser` (
  `idgroupsuser` int NOT NULL AUTO_INCREMENT,
  `idgroupe` int DEFAULT NULL,
  `iduser` int DEFAULT NULL,
  PRIMARY KEY (`idgroupsuser`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tblposts`
--

DROP TABLE IF EXISTS `tblposts`;
CREATE TABLE IF NOT EXISTS `tblposts` (
  `idPost` int NOT NULL AUTO_INCREMENT,
  `fkIdUser` int NOT NULL,
  `postContent` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `nblikes` int NOT NULL,
  `nbcommentaires` int NOT NULL,
  PRIMARY KEY (`idPost`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbltopics`
--

DROP TABLE IF EXISTS `tbltopics`;
CREATE TABLE IF NOT EXISTS `tbltopics` (
  `idsujet` int NOT NULL AUTO_INCREMENT,
  `idgroupe` int NOT NULL,
  `idauteur` int NOT NULL,
  `datesujet` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `titre` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbReponse` int NOT NULL,
  PRIMARY KEY (`idsujet`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbltopicsanswers`
--

DROP TABLE IF EXISTS `tbltopicsanswers`;
CREATE TABLE IF NOT EXISTS `tbltopicsanswers` (
  `idtopicsanswers` int NOT NULL AUTO_INCREMENT,
  `idgroupe` int NOT NULL,
  `idtopic` int NOT NULL,
  `idUserAnswer` int NOT NULL,
  `dateAnswers` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(10000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idtopicsanswers`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tblusers`
--

DROP TABLE IF EXISTS `tblusers`;
CREATE TABLE IF NOT EXISTS `tblusers` (
  `idUser` int NOT NULL AUTO_INCREMENT,
  `userNom` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `userPrenom` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `userAge` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `userBio` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `userNaissance` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `userLevel` int NOT NULL,
  `userPseudo` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `userMail` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `userPassword` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `userRole` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `userDateInscription` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `userImg` longblob,
  `userTypeImg` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `userBanner` longblob,
  `userTypeBanner` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `userXP` int NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tblusersadmin`
--

DROP TABLE IF EXISTS `tblusersadmin`;
CREATE TABLE IF NOT EXISTS `tblusersadmin` (
  `idUser` int NOT NULL,
  `userAdminGrade` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `userAdminFonction` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `userCanModify` int NOT NULL,
  `userNom` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `userPrenom` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `userAge` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `userBio` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `userNaissance` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `userLevel` int NOT NULL,
  `userPseudo` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `userMail` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `userPassword` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `userRole` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `userDateInscription` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `userAdminImg` longblob,
  `userAdminTypeImg` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `userAdminBanner` longblob,
  `userAdminTypeBanner` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbluserssimple`
--

DROP TABLE IF EXISTS `tbluserssimple`;
CREATE TABLE IF NOT EXISTS `tbluserssimple` (
  `idUser` int NOT NULL,
  `userSimplePlateforme` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `userSimpleCanModify` int NOT NULL,
  `userNom` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `userPrenom` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `userAge` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `userBio` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `userNaissance` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `userLevel` int NOT NULL,
  `userPseudo` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `userMail` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `userPassword` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `userRole` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `userDateInscription` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `userSimpleImg` longblob,
  `userSimpleTypeImg` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `userSimpleBanner` longblob,
  `userSimpleTypeBanner` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

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
