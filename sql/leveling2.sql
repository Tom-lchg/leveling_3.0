-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 31 mars 2023 à 12:25
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

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
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteGroupePrivate` (IN `p_idGroupe` INT(3))  Begin
    delete from  tblgroupsprivate where idGroupe = p_idGroupe;
    delete from tblgroups where idGroupe = p_idGroupe;
End$$

DROP PROCEDURE IF EXISTS `deleteGroupePublic`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteGroupePublic` (IN `p_idGroupe` INT(3))  Begin
    delete from  tblgroupspublic where idGroupe = p_idGroupe;
    delete from tblgroups where idGroupe = p_idGroupe;
End$$

DROP PROCEDURE IF EXISTS `deleteJeuConsole`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteJeuConsole` (IN `p_idGame` INT(3))  Begin
    delete from  tblgamescs where idGame = p_idGame;
    delete from tblgames where idGame = p_idGame;
End$$

DROP PROCEDURE IF EXISTS `deleteJeuPc`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteJeuPc` (IN `p_idGame` INT(3))  Begin
    delete from  tblgamespc where idGame = p_idGame;
    delete from tblgames where idGame = p_idGame;
End$$

DROP PROCEDURE IF EXISTS `deleteUserAdmin`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteUserAdmin` (IN `p_idUser` INT(3))  Begin
    delete from  tblusersadmin where idUser = p_idUser;
    delete from tblusers where idUser = p_idUser;
End$$

DROP PROCEDURE IF EXISTS `deleteUserSimple`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteUserSimple` (IN `p_idUser` INT(3))  Begin
    delete from  tbluserssimple where idUser = p_idUser;
    delete from tblusers where idUser = p_idUser;
End$$

DROP PROCEDURE IF EXISTS `insertGroupePrivate`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertGroupePrivate` (IN `p_groupeMasquer` TINYINT(1), IN `p_groupePrivateNbUsers` INT(11), IN `p_groupePrivateidUser` INT(11), IN `p_groupeName` VARCHAR(50), IN `p_groupeDescription` VARCHAR(50), IN `p_groupeFkIdUser` INT(3), IN `p_groupePrivacy` VARCHAR(50), IN `p_groupeImg` LONGBLOB, IN `p_groupeTypeImg` VARCHAR(50), IN `p_groupeBanner` LONGBLOB, IN `p_groupeTypeBanner` VARCHAR(50))  Begin
        Declare p_idGroupe int(11);
        insert into tblgroups values(null,p_groupeName, p_groupeDescription, p_groupeFkIdUser, p_groupePrivacy,p_groupeImg, p_groupeTypeImg,p_groupeBanner, p_groupeTypeBanner);

        select idGroupe  into p_idGroupe from tblgroups
        where groupeName = p_groupeName and groupeDescription = p_groupeDescription and groupeFkIdUser = p_groupeFkIdUser and groupePrivacy = p_groupePrivacy;

        insert into tblgroupsprivate values (p_idGroupe, p_groupeMasquer, p_groupePrivateNbUsers,p_groupePrivateidUser, p_groupeName, p_groupeDescription,p_groupeFkIdUser, p_groupePrivacy,p_groupeImg, p_groupeTypeImg,p_groupeBanner, p_groupeTypeBanner);
    End$$

DROP PROCEDURE IF EXISTS `insertGroupePublic`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertGroupePublic` (IN `p_groupeMasquer` TINYINT(1), IN `p_groupePublicNbUsers` INT(11), IN `p_groupePublicidUser` INT(11), IN `p_groupeName` VARCHAR(50), IN `p_groupeDescription` VARCHAR(50), IN `p_groupeFkIdUser` INT(3), IN `p_groupePrivacy` VARCHAR(50), IN `p_groupeImg` LONGBLOB, IN `p_groupeTypeImg` VARCHAR(50), IN `p_groupeBanner` LONGBLOB, IN `p_groupeTypeBanner` VARCHAR(50))  Begin
        Declare p_idGroupe int(11);
        insert into tblgroups values(null,p_groupeName, p_groupeDescription, p_groupeFkIdUser, p_groupePrivacy,p_groupeImg, p_groupeTypeImg,p_groupeBanner, p_groupeTypeBanner);

        select idGroupe  into p_idGroupe from tblgroups
        where groupeName = p_groupeName and groupeDescription = p_groupeDescription and groupeFkIdUser = p_groupeFkIdUser and groupePrivacy = p_groupePrivacy;

        insert into tblgroupspublic values (p_idGroupe, p_groupeMasquer, p_groupePublicNbUsers,p_groupePublicidUser, p_groupeName, p_groupeDescription,p_groupeFkIdUser, p_groupePrivacy,p_groupeImg, p_groupeTypeImg,p_groupeBanner, p_groupeTypeBanner);
    End$$

DROP PROCEDURE IF EXISTS `insertJeuConsole`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertJeuConsole` (IN `p_gameCsSupport` VARCHAR(50), IN `p_gameCsDateSortie` VARCHAR(50), IN `p_gameCsPrix` FLOAT, IN `p_gameCsTaille` FLOAT, IN `p_gameCsModeleEco` VARCHAR(50), IN `p_gameName` VARCHAR(50), IN `p_gameDescription` VARCHAR(1000), IN `p_gameGenre` VARCHAR(100), IN `p_gameAvis` VARCHAR(100), IN `p_gameClassification` VARCHAR(100), IN `p_gameMode` VARCHAR(100), IN `p_gameImg` VARCHAR(100), IN `p_gameTrailer` VARCHAR(100), IN `p_gameImgOther` VARCHAR(100))  Begin
        Declare p_idGame int(11);
        insert into tblgames values(null,p_gameName, p_gameDescription, p_gameGenre, p_gameAvis, p_gameClassification, p_gameMode, p_gameImg, p_gameTrailer,p_gameImgOther);

        select idGame into p_idGame from tblgames
        where gameName = p_gameName and gameDescription = p_gameDescription and gameGenre = p_gameGenre and gameAvis = p_gameAvis and
        gameClassification = p_gameClassification and gameMode = p_gameMode;

        insert into tblgamescs values (p_idGame, p_gameCsSupport, p_gameCsDateSortie,p_gameCsPrix, p_gameCsTaille, p_gameCsModeleEco, p_gameName, p_gameDescription, p_gameGenre,
        p_gameAvis, p_gameClassification, p_gameMode, p_gameImg, p_gameTrailer,p_gameImgOther);
    End$$

DROP PROCEDURE IF EXISTS `insertJeuPc`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertJeuPc` (IN `p_gamePcModeleEco` VARCHAR(50), IN `p_gamePcPrix` FLOAT, IN `p_gamePcOs` VARCHAR(50), IN `p_gamePcProc` VARCHAR(50), IN `p_gamePcCg` VARCHAR(50), IN `p_gamePcTaille` FLOAT, IN `p_gameName` VARCHAR(50), IN `p_gameDescription` VARCHAR(1000), IN `p_gameGenre` VARCHAR(100), IN `p_gameAvis` VARCHAR(100), IN `p_gameClassification` VARCHAR(100), IN `p_gameMode` VARCHAR(100), IN `p_gameImg` VARCHAR(100), IN `p_gameTrailer` VARCHAR(100), IN `p_gameImgOther` VARCHAR(100))  Begin
        Declare p_idGame int(11);
        insert into tblgames values(null,p_gameName, p_gameDescription, p_gameGenre, p_gameAvis, p_gameClassification, p_gameMode, p_gameImg, p_gameTrailer,p_gameImgOther);

        select idGame into p_idGame from tblgames
        where gameName = p_gameName and gameDescription = p_gameDescription and gameGenre = p_gameGenre and gameAvis = p_gameAvis and
        gameClassification = p_gameClassification and gameMode = p_gameMode;

        insert into tblgamespc values (p_idGame, p_gamePcModeleEco, p_gamePcPrix,p_gamePcOs, p_gamePcProc, p_gamePcCg,p_gamePcTaille, p_gameName, p_gameDescription, p_gameGenre,
        p_gameAvis, p_gameClassification, p_gameMode, p_gameImg, p_gameTrailer,p_gameImgOther);
    End$$

DROP PROCEDURE IF EXISTS `insertUserAdmin`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertUserAdmin` (IN `p_userAdminGrade` VARCHAR(50), IN `p_userAdminFonction` VARCHAR(50), IN `p_userSimpleCanModify` INT(1), IN `p_userNom` VARCHAR(50), IN `p_userPrenom` VARCHAR(50), IN `p_userAge` VARCHAR(50), IN `p_userBio` VARCHAR(50), IN `p_userNaissance` VARCHAR(50), IN `p_userLevel` INT(11), IN `p_userPseudo` VARCHAR(50), IN `p_userMail` VARCHAR(50), IN `p_userPassword` VARCHAR(50), IN `p_userRole` VARCHAR(50), IN `p_userDateInscription` VARCHAR(50), IN `p_userImg` LONGBLOB, IN `p_userTypeImg` VARCHAR(50), IN `p_userBanner` LONGBLOB, IN `p_userTypeBanner` VARCHAR(50))  Begin
        Declare p_idUser int(11);
        insert into tblusers values(null,p_userNom, p_userPrenom, p_userAge, p_userBio,p_userNaissance,p_userLevel,p_userPseudo,p_userMail,p_userPassword,p_userRole,p_userDateInscription, p_userImg, p_userTypeImg, p_userBanner, p_userTypeBanner);

         select idUser into p_idUser from tblusers
        where userNom = p_userNom and userPrenom = p_userPrenom and userAge = p_userAge and userBio = p_userBio and userNaissance = p_userNaissance and userLevel =p_userLevel and userPseudo =p_userPseudo
        and userMail = p_userMail and userPassword = p_userPassword and userRole = p_userRole and userDateInscription =p_userDateInscription;

        insert into tblusersadmin values (p_idUser, p_userAdminGrade, p_userAdminFonction,p_userSimpleCanModify, p_userNom,p_userPrenom, p_userAge, p_userBio , p_userNaissance, p_userLevel, p_userPseudo, p_userMail, p_userPassword, p_userRole, p_userDateInscription,
        p_userImg, p_userTypeImg, p_userBanner, p_userTypeBanner);
    End$$

DROP PROCEDURE IF EXISTS `insertUserInGroupe`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertUserInGroupe` (IN `p_idGroupe` INT(4), IN `p_idUser` INT(4))  Begin
    insert into tblgroupsuser values(null,p_idGroupe, p_idUser);
End$$

DROP PROCEDURE IF EXISTS `insertUserSimple`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertUserSimple` (IN `p_userSimplePlateforme` VARCHAR(50), `p_userSimpleCanModify` INT(1), IN `p_userNom` VARCHAR(50), IN `p_userPrenom` VARCHAR(50), IN `p_userAge` VARCHAR(50), IN `p_userBio` VARCHAR(50), IN `p_userNaissance` VARCHAR(50), IN `p_userLevel` INT(11), IN `p_userPseudo` VARCHAR(50), IN `p_userMail` VARCHAR(50), IN `p_userPassword` VARCHAR(50), IN `p_userRole` VARCHAR(50), IN `p_userDateInscription` VARCHAR(50), IN `p_userImg` LONGBLOB, IN `p_userTypeImg` VARCHAR(50), IN `p_userBanner` LONGBLOB, IN `p_userTypeBanner` VARCHAR(50))  Begin
        Declare p_idUser int(11);
        insert into tblusers values(null,p_userNom, p_userPrenom, p_userAge, p_userBio,p_userNaissance,p_userLevel,p_userPseudo,p_userMail,p_userPassword,p_userRole,p_userDateInscription, p_userImg, p_userTypeImg, p_userBanner, p_userTypeBanner);

        select idUser into p_idUser from tblusers
        where userNom = p_userNom and userPrenom = p_userPrenom and userAge = p_userAge and userBio = p_userBio and userNaissance = p_userNaissance and userLevel =p_userLevel and userPseudo =p_userPseudo
        and userMail = p_userMail and userPassword = p_userPassword and userRole = p_userRole and userDateInscription =p_userDateInscription;

        insert into tbluserssimple values (p_idUser, p_userSimplePlateforme, p_userSimpleCanModify, p_userNom,p_userPrenom, p_userAge, p_userBio , p_userNaissance, p_userLevel, p_userPseudo, p_userMail, p_userPassword, p_userRole, p_userDateInscription,
        p_userImg, p_userTypeImg,p_userBanner, p_userTypeBanner);
    End$$

DROP PROCEDURE IF EXISTS `updateGameConsole`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateGameConsole` (IN `p_idGame` INT(11), IN `p_gameCsSupport` VARCHAR(50), IN `p_gameCsDateSortie` VARCHAR(50), IN `p_gameCsPrix` FLOAT, IN `p_gameCsTaille` FLOAT, IN `p_gameCsModeleEco` VARCHAR(50), IN `p_gameName` VARCHAR(50), IN `p_gameDescription` VARCHAR(1000), IN `p_gameGenre` VARCHAR(100), IN `p_gameAvis` VARCHAR(100), IN `p_gameClassification` VARCHAR(100), IN `p_gameMode` VARCHAR(100), IN `p_gameImg` VARCHAR(100), IN `p_gameTrailer` VARCHAR(100), IN `p_gameImgOther` VARCHAR(100))  Begin
    update tblgamescs set gameCsSupport = p_gameCsSupport, gameCsDateSortie = p_gameCsDateSortie, gameCsPrix=p_gameCsPrix, gameCsTaille = p_gameCsTaille, gameCsModeleEco = p_gameCsModeleEco ,gameName = p_gameName, gameDescription = p_gameDescription,
    gameGenre = p_gameGenre ,gameAvis = p_gameAvis, gameClassification =p_gameClassification, gameMode =p_gameMode, gameImg =p_gameImg, gameTrailer = p_gameTrailer, gameImgOther = p_gameImgOther where idGame = p_idGame ; 

    update tblgames set gameName = p_gameName, gameDescription = p_gameDescription,gameGenre = p_gameGenre ,gameAvis = p_gameAvis, gameClassification =p_gameClassification, gameMode =p_gameMode, gameImg =p_gameImg, gameTrailer = p_gameTrailer, gameImgOther = p_gameImgOther 
    where idGame = p_idGame ;
End$$

DROP PROCEDURE IF EXISTS `updateGamePc`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateGamePc` (IN `p_idGame` INT(11), IN `p_gamePcModeleEco` VARCHAR(50), IN `p_gamePcPrix` FLOAT, IN `p_gamePcOs` VARCHAR(50), IN `p_gamePcProc` VARCHAR(50), IN `p_gamePcCg` VARCHAR(50), IN `p_gamePcTaille` FLOAT, IN `p_gameName` VARCHAR(50), IN `p_gameDescription` VARCHAR(1000), IN `p_gameGenre` VARCHAR(100), IN `p_gameAvis` VARCHAR(100), IN `p_gameClassification` VARCHAR(100), IN `p_gameMode` VARCHAR(100), IN `p_gameImg` VARCHAR(100), IN `p_gameTrailer` VARCHAR(100), IN `p_gameImgOther` VARCHAR(100))  Begin
    update tblgamespc set gamePcModeleEco = p_gamePcModeleEco, gamePcPrix = p_gamePcPrix, gamePcOs=p_gamePcOs, gamePcProc = p_gamePcProc, gamePcCg = p_gamePcCg , gamePcTaille = p_gamePcTaille, gameName = p_gameName, gameDescription = p_gameDescription,
    gameGenre = p_gameGenre ,gameAvis = p_gameAvis, gameClassification =p_gameClassification, gameMode =p_gameMode, gameImg =p_gameImg, gameTrailer = p_gameTrailer, gameImgOther = p_gameImgOther where idGame = p_idGame ; 

    update tblgames set gameName = p_gameName, gameDescription = p_gameDescription,gameGenre = p_gameGenre ,gameAvis = p_gameAvis, gameClassification =p_gameClassification, gameMode =p_gameMode, gameImg =p_gameImg, gameTrailer = p_gameTrailer, gameImgOther = p_gameImgOther 
    where idGame = p_idGame ;
End$$

DROP PROCEDURE IF EXISTS `updateGroupePrivate`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateGroupePrivate` (IN `p_idGroupe` INT(3), IN `p_groupeMasquer` TINYINT(1), IN `p_groupePrivateNbUsers` INT(11), IN `p_groupePrivateidUser` INT(11), IN `p_groupeName` VARCHAR(50), IN `p_groupeDescription` VARCHAR(50), IN `p_groupeFkIdUser` INT(11), IN `p_groupePrivacy` VARCHAR(50), IN `p_groupeImg` LONGBLOB, IN `p_groupeTypeImg` VARCHAR(50), IN `p_groupeBanner` LONGBLOB, IN `p_groupeTypeBanner` VARCHAR(50))  Begin
    update tblgroupsprivate set groupeMasquer = p_groupeMasquer, groupePrivateNbUsers = p_groupePrivateNbUsers, groupePrivateNbUsers = p_groupePrivateNbUsers, groupePrivateidUser = p_groupePrivateidUser, groupeName = p_groupeName, groupeDescription = p_groupeDescription,
     groupeFkIdUser = p_groupeFkIdUser , groupePrivacy = p_groupePrivacy, groupeImg = p_groupeImg, groupeTypeImg = p_groupeTypeImg, groupeBanner = p_groupeBanner, groupeTypeBanner = p_groupeTypeBanner
     where idGroupe = p_idGroupe ; 

    update tblgroups set  groupeName = p_groupeName, groupeDescription = p_groupeDescription, groupeFkIdUser = p_groupeFkIdUser , groupePrivacy = p_groupePrivacy, groupeImg = p_groupeImg, groupeTypeImg = p_groupeTypeImg, groupeBanner = p_groupeBanner,
     groupeTypeBanner = p_groupeTypeBanner where idGroupe = p_idGroupe ; 
End$$

DROP PROCEDURE IF EXISTS `updateGroupePublic`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateGroupePublic` (IN `p_idGroupe` INT(3), IN `p_groupeMasquer` TINYINT(1), IN `p_groupePublicNbUsers` INT(11), IN `p_groupePublicidUser` INT(11), IN `p_groupeName` VARCHAR(50), IN `p_groupeDescription` VARCHAR(50), IN `p_groupeFkIdUser` INT(11), IN `p_groupePrivacy` VARCHAR(50), IN `p_groupeImg` LONGBLOB, IN `p_groupeTypeImg` VARCHAR(50), IN `p_groupeBanner` LONGBLOB, IN `p_groupeTypeBanner` VARCHAR(50))  Begin
    update tblgroupspublic set groupeMasquer = p_groupeMasquer, groupePublicNbUsers = p_groupePublicNbUsers, groupePublicNbUsers = p_groupePublicNbUsers, groupePublicidUser = p_groupePublicidUser, groupeName = p_groupeName, groupeDescription = p_groupeDescription,
     groupeFkIdUser = p_groupeFkIdUser , groupePrivacy = p_groupePrivacy, groupeImg = p_groupeImg, groupeTypeImg = p_groupeTypeImg, groupeBanner = p_groupeBanner, groupeTypeBanner = p_groupeTypeBanner
     where idGroupe = p_idGroupe ; 

    update tblgroups set  groupeName = p_groupeName, groupeDescription = p_groupeDescription, groupeFkIdUser = p_groupeFkIdUser , groupePrivacy = p_groupePrivacy, groupeImg = p_groupeImg, groupeTypeImg = p_groupeTypeImg, groupeBanner = p_groupeBanner,
     groupeTypeBanner = p_groupeTypeBanner where idGroupe = p_idGroupe ; 
End$$

DROP PROCEDURE IF EXISTS `updateUserAdmin`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateUserAdmin` (IN `p_idUser` INT(11), IN `p_userAdminGrade` VARCHAR(50), IN `p_userAdminFonction` VARCHAR(50), IN `p_userCanModify` INT(1), IN `p_userNom` VARCHAR(50), IN `p_userPrenom` VARCHAR(50), IN `p_userAge` VARCHAR(50), IN `p_userBio` VARCHAR(50), IN `p_userNaissance` VARCHAR(50), IN `p_userLevel` INT(11), IN `p_userPseudo` VARCHAR(50), IN `p_userMail` VARCHAR(50), IN `p_userPassword` VARCHAR(50), IN `p_userRole` VARCHAR(50), IN `p_userDateInscription` VARCHAR(50), IN `p_userAdminImg` LONGBLOB, IN `p_userAdminTypeImg` VARCHAR(50), IN `p_userAdminBanner` LONGBLOB, IN `p_userAdminTypeBanner` VARCHAR(50))  Begin
    update tblusersadmin set userAdminGrade = p_userAdminGrade, userAdminFonction = p_userAdminFonction, userCanModify = p_userCanModify, userNom =p_userNom, userPrenom = p_userPrenom, userAge = p_userAge , userBio = p_userBio, userNaissance = p_userNaissance,
    userLevel = p_userLevel, userPseudo = p_userPseudo ,userMail = p_userMail, userPassword =p_userPassword, userRole =p_userRole, userDateInscription =p_userDateInscription, userAdminImg = p_userAdminImg, userAdminTypeImg = p_userAdminTypeImg,
    userAdminBanner = p_userAdminBanner, userAdminTypeBanner = p_userAdminTypeBanner where idUser = p_idUser ; 

    update tblusers set  userNom =p_userNom, userPrenom = p_userPrenom, userAge = p_userAge , userBio = p_userBio, userNaissance = p_userNaissance,userLevel = p_userLevel, userPseudo = p_userPseudo ,userMail = p_userMail, userPassword =p_userPassword,
     userRole =p_userRole, userDateInscription =p_userDateInscription, userImg = p_userAdminImg, userTypeImg = p_userAdminTypeImg, userBanner = p_userAdminBanner, userTypeBanner = p_userAdminTypeBanner where idUser = p_idUser ; 
End$$

DROP PROCEDURE IF EXISTS `updateUserSimple`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateUserSimple` (IN `p_idUser` INT(11), IN `p_userSimplePlateforme` VARCHAR(50), IN `p_userSimpleCanModify` INT(1), IN `p_userNom` VARCHAR(50), IN `p_userPrenom` VARCHAR(50), IN `p_userAge` VARCHAR(50), IN `p_userBio` VARCHAR(50), IN `p_userNaissance` VARCHAR(50), IN `p_userLevel` INT(11), IN `p_userPseudo` VARCHAR(50), IN `p_userMail` VARCHAR(50), IN `p_userPassword` VARCHAR(50), IN `p_userRole` VARCHAR(50), IN `p_userDateInscription` VARCHAR(50), IN `p_userSimpleImg` LONGBLOB, IN `p_userSimpleTypeImg` VARCHAR(50), IN `p_userSimpleBanner` LONGBLOB, IN `p_userSimpleTypeBanner` VARCHAR(50))  Begin
    update tbluserssimple set userSimplePlateforme = p_userSimplePlateforme, userSimpleCanModify = p_userSimpleCanModify, userNom =p_userNom, userPrenom = p_userPrenom, userAge = p_userAge , userBio = p_userBio, userNaissance = p_userNaissance,
    userLevel = p_userLevel, userPseudo = p_userPseudo ,userMail = p_userMail, userPassword =p_userPassword, userRole =p_userRole, userDateInscription =p_userDateInscription, userSimpleImg = p_userSimpleImg, userSimpleTypeImg = p_userSimpleTypeImg,
    userSimpleBanner = p_userSimpleBanner, userSimpleTypeBanner = p_userSimpleTypeBanner where idUser = p_idUser ; 

    update tblusers set  userNom =p_userNom, userPrenom = p_userPrenom, userAge = p_userAge , userBio = p_userBio, userNaissance = p_userNaissance,userLevel = p_userLevel, userPseudo = p_userPseudo ,userMail = p_userMail, userPassword =p_userPassword,
     userRole =p_userRole, userDateInscription =p_userDateInscription, userImg = p_userSimpleImg, userTypeImg = p_userSimpleTypeImg, userBanner = p_userSimpleBanner, userTypeBanner = p_userSimpleTypeBanner where idUser = p_idUser ; 
End$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `tblgames`
--

DROP TABLE IF EXISTS `tblgames`;
CREATE TABLE IF NOT EXISTS `tblgames` (
  `idGame` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblgames`
--

INSERT INTO `tblgames` (`idGame`, `gameName`, `gameDescription`, `gameGenre`, `gameAvis`, `gameClassification`, `gameMode`, `gameImg`, `gameTrailer`, `gameImgOther`) VALUES
(21, 'Assassin s Creed : Valhalla', 'Assassins Creed Valhalla est un RPG en monde ouvert se déroulant pendant l âge des vikings. Vous incarnez Eivor, un viking du sexe de votre choix qui a quitté la Norvège pour trouver la fortune et la gloire en Angleterre.', 'Open World | Action RPG | Infiltration', '18', '18', 'Jouable en solo', 'AppJeuPc', 'AppJeuPc', 'AppJeuPc'),
(22, 'Far Cry 5', 'Far Cry 5 est un jeu d action / aventure jouable en solo. Bienvenue Ã  Hope County dans le Montana, terre de libertÃ© et de bravoure qui abrite un culte fanatique prÃªchant la fin du monde : Edenâ€™s Gate.', 'Infiltration | Action | FPS', '14', '18', 'Jouable en solo | Multi en ligne', 'AppJeuPc', 'AppJeuPc', 'AppJeuPc'),
(23, 'Far Cry 6', 'Far Cry 6 est un FPS qui se déroule sur l île tropicale fictive de Yara. Vous incarnez Dani Rojas, un membre de la guérilla locale qui lutte contre le régime oppressif du dictateur du pays.', 'Open World | FPS', '16', '18', 'Jouable en solo | Multi en ligne', 'AppJeuPc', 'AppJeuPc', 'AppJeuPc'),
(24, 'FOR HONOR', 'For Honor est un TPS à l ère médiévale, où les joueurs peuvent incarner un chevalier, un viking ou un samouraï et affronter leurs adversaires dans un mode solo ou un multijoueur compétitif. ', 'Action', '15', '18', 'Jouable en solo | Multi en ligne | Multi en coopÃ©ratif | Multi en compÃ©titif', 'AppJeuConsole', 'AppJeuConsole', 'AppJeuConsole'),
(25, 'Ghost Recon : Wildlands', 'Ghost Recon Wildlands, sur PC, PS4 et One est un jeu d action Ã  la troisiÃ¨me personne, jouable en solo ou en multi. Le joueur y incarne diffÃ©rents membres d une Ã©quipe de soldats avec comme objectif d exÃ©cuter plusieurs missions concernant le trafic de drogue et dÃ©manteler le cartel de Santa Blanca en Bolivie.', 'TPS | Infiltration', '17', '18', 'Jouable en solo | Multi en local | Multi en ligne | Multi en coopÃ©ratif | Multi en compÃ©titif', 'AppJeuConsole', 'AppJeuConsole', 'AppJeuConsole'),
(26, 'Just Dance 2022', 'Le nouvel opus de la licence rythmée d Ubisoft propose pas moins de 40 nouveaux titres, parmi lesquels on retrouve notamment, Todrick Hall, avec son nouveau titre Nails, Hair, Hips, Heels, Imagine Dragons ou encore Ciara.', 'Danse ', '15', '12', 'Jouable en solo | Multi en ligne', 'AppJeuConsole', 'AppJeuConsole', 'AppJeuConsole'),
(27, 'Riders Republic', 'Nouveau jeu du studio du jeu de sports extrêmes Steep, Riders Republic nous embarque dans un univers déjanté où les biens nommés Riders règnent en maître.', 'Compilation | Sport', '14', '3', 'Multi en ligne | Multi en compétitif', 'AppJeuConsole', 'AppJeuConsole', 'AppJeuConsole'),
(28, 'Rayman Mini', 'Rayman Mini exÃ©cute Ã  la lettre prÃ¨s les mÃ©caniques de jeu de Rayman Jungle Run, cependant, ici, votre personnage est de taille rÃ©duite. Bien Ã©videmment, votre objectif est toujours de courir de gauche Ã  droite pour Ã©viter les nombreux obstacles qui se dressent sur votre chemin.', 'Runner | Plate-Forme', '16', '3', 'Jouable en solo', 'AppJeuConsole', 'AppJeuConsole', 'AppJeuConsole'),
(29, 'Tom Clancys Rainbow Six Siege', 'Tom Clancys Rainbow Six Siege est un jeu d action tactique appartenant à la fameuse série du même nom. Cet épisode est principalement axé sur le multijoueur et l importance du jeu en équipe, avec des environnements facilement destructibles.', 'Action | FPS | Tactique | Shooter', '19', '18', 'Jouable en solo | Multi en ligne | Multi en coopératif', 'AppJeuPc', 'AppJeuPc', 'AppJeuPc'),
(30, 'Tom Clancys The Division 2', 'Tom Clancys The Division est un jeu d action en ligne où le joueur est au cœur d un univers post-apocalyptique. Ce dernier doit jongler entre coopération, stratégie et technologie pour survivre dans un environnement hostile. Partez en compagnie de la Division pour sauver Washington D.C. de l effondrement.', 'Action | TPS | MMO', '15', '18', 'Jouable en solo | Multi en ligne', 'AppJeuPc', 'AppJeuPc', 'AppJeuPc'),
(31, 'Trackmania', 'Trackmania Nations Remake est un jeu particulièrement populaire en ligne, notamment de par son aspect sandbox et compétitif. Dans ce nouvel opus on pourra compter sur un remaniement graphique et encore plus de libertés sur la création de circuits personnalisés avec de nouveaux éléments de décors et de piste.', 'Course', '17', '8', 'Jouable en solo | Multi en ligne', 'AppJeuPc', 'AppJeuPc', 'AppJeuPc'),
(32, 'Watch Dogs 2', 'Watch Dogs 2 est un jeu d aventure en monde ouvert faisant suite aux événements du premier épisode. Ce nouvel opus de la franchise nous entraîne au cœur de la ville de San Francisco dans la peau du nouveau héros Marcus Holloway, un jeune hacker surdoué victime des algorithmes prédictifs du ctOS 2.0 qui l’accusent d’un crime qu’il n’a pas commis.', 'Aventure | Infiltration | Action', '17', '18', 'Jouable en solo', 'AppJeuPc', 'AppJeuPc', 'AppJeuPc');

-- --------------------------------------------------------

--
-- Structure de la table `tblgamescs`
--

DROP TABLE IF EXISTS `tblgamescs`;
CREATE TABLE IF NOT EXISTS `tblgamescs` (
  `idGame` int(11) NOT NULL,
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
(24, 'PS4 / XBOX', '14/02/17', 8, 20, 'Payant à l aquisition', 'FOR HONOR', 'For Honor est un TPS à l ère médiévale, où les joueurs peuvent incarner un chevalier, un viking ou un samouraï et affronter leurs adversaires dans un mode solo ou un multijoueur compétitif. ', 'Action', '15', '18', 'Jouable en solo | Multi en ligne | Multi en coopÃ©ratif | Multi en compÃ©titif', 'AppJeuConsole', 'AppJeuConsole', 'AppJeuConsole'),
(25, 'PS4/XBOX', '29/04/16', 17, 45, 'Payant à l aquisition', 'Ghost Recon : Wildlands', 'Ghost Recon Wildlands, sur PC, PS4 et One est un jeu d action Ã  la troisiÃ¨me personne, jouable en solo ou en multi. Le joueur y incarne diffÃ©rents membres d une Ã©quipe de soldats avec comme objectif d exÃ©cuter plusieurs missions concernant le trafic de drogue et dÃ©manteler le cartel de Santa Blanca en Bolivie.', 'TPS | Infiltration', '17', '18', 'Jouable en solo | Multi en local | Multi en ligne | Multi en coopÃ©ratif | Multi en compÃ©titif', 'AppJeuConsole', 'AppJeuConsole', 'AppJeuConsole'),
(26, 'PS4 / XBOX / SWITCH', '04/11/21', 25, 15, 'Payant à l aquisition', 'Just Dance 2022', 'Le nouvel opus de la licence rythmée d Ubisoft propose pas moins de 40 nouveaux titres, parmi lesquels on retrouve notamment, Todrick Hall, avec son nouveau titre Nails, Hair, Hips, Heels, Imagine Dragons ou encore Ciara.', 'Danse ', '15', '12', 'Jouable en solo | Multi en ligne', 'AppJeuConsole', 'AppJeuConsole', 'AppJeuConsole'),
(27, 'PS4 / XBOX', '12/05/14', 9, 13, 'Payant à l aquisition', 'Riders Republic', 'Nouveau jeu du studio du jeu de sports extrêmes Steep, Riders Republic nous embarque dans un univers déjanté où les biens nommés Riders règnent en maître.', 'Compilation | Sport', '14', '3', 'Multi en ligne | Multi en compétitif', 'AppJeuConsole', 'AppJeuConsole', 'AppJeuConsole'),
(28, 'SWITCH', '05/11/18', 14, 21, 'Payant à l aquistion', 'Rayman Mini', 'Rayman Mini exÃ©cute Ã  la lettre prÃ¨s les mÃ©caniques de jeu de Rayman Jungle Run, cependant, ici, votre personnage est de taille rÃ©duite. Bien Ã©videmment, votre objectif est toujours de courir de gauche Ã  droite pour Ã©viter les nombreux obstacles qui se dressent sur votre chemin.', 'Runner | Plate-Forme', '16', '3', 'Jouable en solo', 'AppJeuConsole', 'AppJeuConsole', 'AppJeuConsole');

-- --------------------------------------------------------

--
-- Structure de la table `tblgamespc`
--

DROP TABLE IF EXISTS `tblgamespc`;
CREATE TABLE IF NOT EXISTS `tblgamespc` (
  `idGame` int(11) NOT NULL,
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
(21, 'Payant à l aquisition', 40, 'Windows', 'INTEL I5', '2090', 34, 'Assassin s Creed : Valhalla', 'Assassins Creed Valhalla est un RPG en monde ouvert se déroulant pendant l âge des vikings. Vous incarnez Eivor, un viking du sexe de votre choix qui a quitté la Norvège pour trouver la fortune et la gloire en Angleterre.', 'Open World | Action RPG | Infiltration', '18', '18', 'Jouable en solo', 'AppJeuPc', 'AppJeuPc', 'AppJeuPc'),
(22, 'Payant à l aquisition', 35, 'WINDOW', 'AMD 5300', '2070', 23, 'Far Cry 5', 'Far Cry 5 est un jeu d action / aventure jouable en solo. Bienvenue Ã  Hope County dans le Montana, terre de libertÃ© et de bravoure qui abrite un culte fanatique prÃªchant la fin du monde : Edenâ€™s Gate.', 'Infiltration | Action | FPS', '14', '18', 'Jouable en solo | Multi en ligne', 'AppJeuPc', 'AppJeuPc', 'AppJeuPc'),
(23, 'Payant à l aquisition', 48, 'Windows / Linux', 'INTEL I7', '2090', 37, 'Far Cry 6', 'Far Cry 6 est un FPS qui se déroule sur l île tropicale fictive de Yara. Vous incarnez Dani Rojas, un membre de la guérilla locale qui lutte contre le régime oppressif du dictateur du pays.', 'Open World | FPS', '16', '18', 'Jouable en solo | Multi en ligne', 'AppJeuPc', 'AppJeuPc', 'AppJeuPc'),
(29, 'Payant à l aquisition', 40, 'Windows', 'AMD 3900', '1070', 35, 'Tom Clancys Rainbow Six Siege', 'Tom Clancys Rainbow Six Siege est un jeu d action tactique appartenant à la fameuse série du même nom. Cet épisode est principalement axé sur le multijoueur et l importance du jeu en équipe, avec des environnements facilement destructibles.', 'Action | FPS | Tactique | Shooter', '19', '18', 'Jouable en solo | Multi en ligne | Multi en coopératif', 'AppJeuPc', 'AppJeuPc', 'AppJeuPc'),
(30, 'Payant à l aquisition', 20, 'Windows', 'INTEL I7', '3060', 42, 'Tom Clancys The Division 2', 'Tom Clancys The Division est un jeu d action en ligne où le joueur est au cœur d un univers post-apocalyptique. Ce dernier doit jongler entre coopération, stratégie et technologie pour survivre dans un environnement hostile. Partez en compagnie de la Division pour sauver Washington D.C. de l effondrement.', 'Action | TPS | MMO', '15', '18', 'Jouable en solo | Multi en ligne', 'AppJeuPc', 'AppJeuPc', 'AppJeuPc'),
(31, 'Payant à l aquisition', 16, 'Windows', 'INTEL I5', '1070', 10, 'Trackmania', 'Trackmania Nations Remake est un jeu particulièrement populaire en ligne, notamment de par son aspect sandbox et compétitif. Dans ce nouvel opus on pourra compter sur un remaniement graphique et encore plus de libertés sur la création de circuits personnalisés avec de nouveaux éléments de décors et de piste.', 'Course', '17', '8', 'Jouable en solo | Multi en ligne', 'AppJeuPc', 'AppJeuPc', 'AppJeuPc'),
(32, 'Payant à l aquisition', 50, 'Windows', 'INTEL I7', '4070', 47, 'Watch Dogs 2', 'Watch Dogs 2 est un jeu d aventure en monde ouvert faisant suite aux événements du premier épisode. Ce nouvel opus de la franchise nous entraîne au cœur de la ville de San Francisco dans la peau du nouveau héros Marcus Holloway, un jeune hacker surdoué victime des algorithmes prédictifs du ctOS 2.0 qui l’accusent d’un crime qu’il n’a pas commis.', 'Aventure | Infiltration | Action', '17', '18', 'Jouable en solo', 'AppJeuPc', 'AppJeuPc', 'AppJeuPc');

-- --------------------------------------------------------

--
-- Structure de la table `tblgroups`
--

DROP TABLE IF EXISTS `tblgroups`;
CREATE TABLE IF NOT EXISTS `tblgroups` (
  `idGroupe` int(11) NOT NULL AUTO_INCREMENT,
  `groupeName` varchar(50) NOT NULL,
  `groupeDescription` varchar(50) NOT NULL,
  `groupeFkIdUser` int(11) NOT NULL,
  `groupePrivacy` varchar(50) NOT NULL,
  `groupeImg` longblob,
  `groupeTypeImg` varchar(50) DEFAULT NULL,
  `groupeBanner` longblob,
  `groupeTypeBanner` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idGroupe`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblgroups`
--

INSERT INTO `tblgroups` (`idGroupe`, `groupeName`, `groupeDescription`, `groupeFkIdUser`, `groupePrivacy`, `groupeImg`, `groupeTypeImg`, `groupeBanner`, `groupeTypeBanner`) VALUES
(44, 'PARISEE', 'PARIS EST MAGIQUE', 12, 'public', 0x4a415641496d67, NULL, 0x4a415641496d67, NULL),
(42, 'Cest LES PRIVATES', 'LES PRIVATES', 12, 'privE', NULL, 'JAVAImg', NULL, 'JAVAImg'),
(34, 'Joueur de Warzone', 'Joueur Actif SVP', 0, 'public', 0x4a415641496d67, NULL, 0x4a415641496d67, NULL),
(36, 'Joueur Fifa très bon', '+22 ans', 12, 'privé', NULL, 'JAVAImg', NULL, 'JAVAImg'),
(48, '', '', 0, '', NULL, 'JAVAImg', NULL, 'JAVAImg'),
(46, '', '', 0, '', 0x4a415641496d67, NULL, 0x4a415641496d67, NULL),
(47, '', '', 0, '', 0x4a415641496d67, NULL, 0x4a415641496d67, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tblgroupsprivate`
--

DROP TABLE IF EXISTS `tblgroupsprivate`;
CREATE TABLE IF NOT EXISTS `tblgroupsprivate` (
  `idGroupe` int(3) NOT NULL,
  `groupeMasquer` int(1) NOT NULL,
  `groupePrivateNbUsers` int(11) NOT NULL,
  `groupePrivateIdUser` int(11) NOT NULL,
  `groupeName` varchar(50) NOT NULL,
  `groupeDescription` varchar(50) NOT NULL,
  `groupeFkIdUser` int(11) NOT NULL,
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
(42, 1, 54, 21, 'Cest LES PRIVATES', 'LES PRIVATES', 12, 'privE', NULL, 'JAVAImg', NULL, 'JAVAImg');

-- --------------------------------------------------------

--
-- Structure de la table `tblgroupspublic`
--

DROP TABLE IF EXISTS `tblgroupspublic`;
CREATE TABLE IF NOT EXISTS `tblgroupspublic` (
  `idGroupe` int(3) NOT NULL,
  `groupeMasquer` int(1) NOT NULL,
  `groupePublicNbUsers` int(11) NOT NULL,
  `groupePublicidUser` int(11) NOT NULL,
  `groupeName` varchar(50) NOT NULL,
  `groupeDescription` varchar(50) NOT NULL,
  `groupeFkIdUser` int(11) NOT NULL,
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
(44, 0, 34, 12, 'PARISEE', 'PARIS EST MAGIQUE', 12, 'public', 0x4a415641496d67, NULL, 0x4a415641496d67, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tblgroupsuser`
--

DROP TABLE IF EXISTS `tblgroupsuser`;
CREATE TABLE IF NOT EXISTS `tblgroupsuser` (
  `idgroupsuser` int(3) NOT NULL AUTO_INCREMENT,
  `idgroupe` int(4) DEFAULT NULL,
  `iduser` int(4) DEFAULT NULL,
  PRIMARY KEY (`idgroupsuser`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblgroupsuser`
--

INSERT INTO `tblgroupsuser` (`idgroupsuser`, `idgroupe`, `iduser`) VALUES
(20, 44, 19),
(21, 44, 22),
(19, 42, 19),
(18, 41, 21),
(22, 44, 22);

-- --------------------------------------------------------

--
-- Structure de la table `tblposts`
--

DROP TABLE IF EXISTS `tblposts`;
CREATE TABLE IF NOT EXISTS `tblposts` (
  `idPost` int(11) NOT NULL AUTO_INCREMENT,
  `fkIdUser` int(11) NOT NULL,
  `postContent` varchar(255) NOT NULL,
  `nblikes` int(11) NOT NULL,
  `nbcommentaires` int(11) NOT NULL,
  PRIMARY KEY (`idPost`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tblusers`
--

DROP TABLE IF EXISTS `tblusers`;
CREATE TABLE IF NOT EXISTS `tblusers` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `userNom` varchar(50) NOT NULL,
  `userPrenom` varchar(50) NOT NULL,
  `userAge` varchar(50) NOT NULL,
  `userBio` varchar(50) NOT NULL,
  `userNaissance` varchar(50) NOT NULL,
  `userLevel` int(11) NOT NULL,
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
(14, 'DUPONT', 'Alexis', '23', 'Meilleur joueur all time', '12/03/2022', 3, 'SERMAX', 'td@gmail.com', '456', 'Admin ', '27/02/2023', 0x4a415641496d67, NULL, 0x4a41564142616e6e6572, NULL),
(19, 'LEVY', 'DanAAAA', '21', 'Fort à tous les jeux', 'Kase', 1, '21/12/2000', 'dlevy@gmail.com', '123', 'user', '11/02/2023', 0x4a415641496d67, NULL, 0x4a41564142616e6e6572, NULL),
(20, 'DUGIMONT', 'THOMASS', '19', 'je sais pas quoi mettre', '07/03/2004', 1, 'GARANCE', 'gdugimont@gmail.com', '124', 'admin', '11/02/2023', 0x4a415641496d67, NULL, 0x4a41564142616e6e6572, NULL),
(21, 'KARIA', 'OUI', '19', 'Valorant player kda', '12/43/23', 1, 'CLARA', 'kc@gmail.com', '123', 'user', '19/02/2023', 0x4a415641496d67, NULL, 0x4a41564142616e6e6572, NULL),
(22, 'Abdiche', 'Shanna', '23', 'ooeoeoe', '21/04/2000', 1, 'Shanna', 'a@gmail.com', '456', 'user', '19/03/2023', 0x4a415641496d67, NULL, 0x4a41564142616e6e6572, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tblusersadmin`
--

DROP TABLE IF EXISTS `tblusersadmin`;
CREATE TABLE IF NOT EXISTS `tblusersadmin` (
  `idUser` int(11) NOT NULL,
  `userAdminGrade` varchar(50) NOT NULL,
  `userAdminFonction` varchar(50) NOT NULL,
  `userCanModify` int(1) NOT NULL,
  `userNom` varchar(50) NOT NULL,
  `userPrenom` varchar(50) NOT NULL,
  `userAge` varchar(50) NOT NULL,
  `userBio` varchar(50) NOT NULL,
  `userNaissance` varchar(50) NOT NULL,
  `userLevel` int(11) NOT NULL,
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
(14, 'Manager', 'Technicien', 1, 'DUPONT', 'Alexis', '23', 'Meilleur joueur all time', '12/03/2022', 3, 'SERMAX', 'td@gmail.com', '456', 'Admin ', '27/02/2023', 0x4a415641496d67, NULL, 0x4a41564142616e6e6572, NULL),
(20, 'Technicien support', 'Alternant', 1, 'DUGIMONT', 'THOMASS', '19', 'je sais pas quoi mettre', '07/03/2004', 1, 'GARANCE', 'gdugimont@gmail.com', '124', 'admin', '11/02/2023', 0x4a415641496d67, NULL, 0x4a41564142616e6e6572, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tbluserssimple`
--

DROP TABLE IF EXISTS `tbluserssimple`;
CREATE TABLE IF NOT EXISTS `tbluserssimple` (
  `idUser` int(11) NOT NULL,
  `userSimplePlateforme` varchar(50) NOT NULL,
  `userSimpleCanModify` int(1) NOT NULL,
  `userNom` varchar(50) NOT NULL,
  `userPrenom` varchar(50) NOT NULL,
  `userAge` varchar(50) NOT NULL,
  `userBio` varchar(50) NOT NULL,
  `userNaissance` varchar(50) NOT NULL,
  `userLevel` int(11) NOT NULL,
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
(19, 'Application', 0, 'LEVY', 'DanAAAA', '21', 'Fort à tous les jeux', 'Kase', 1, '21/12/2000', 'dlevy@gmail.com', '123', 'user', '11/02/2023', 0x4a415641496d67, NULL, 0x4a41564142616e6e6572, NULL),
(21, 'Pc', 0, 'KARIA', 'OUI', '19', 'Valorant player kda', '12/43/23', 1, 'CLARA', 'kc@gmail.com', '123', 'user', '19/02/2023', 0x4a415641496d67, NULL, 0x4a41564142616e6e6572, NULL),
(22, 'Application', 0, 'Abdiche', 'Shanna', '23', 'ooeoeoe', '21/04/2000', 1, 'Shanna', 'a@gmail.com', '456', 'user', '19/03/2023', 0x4a415641496d67, NULL, 0x4a41564142616e6e6572, NULL);

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
