SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `playlist` ;
CREATE SCHEMA IF NOT EXISTS `playlist` DEFAULT CHARACTER SET latin1 ;
USE `playlist` ;

-- -----------------------------------------------------
-- Table `playlist`.`estadoSeguimiento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `playlist`.`estadoSeguimiento` ;

CREATE  TABLE IF NOT EXISTS `playlist`.`estadoSeguimiento` (
  `code` INT(11) NOT NULL AUTO_INCREMENT ,
  `estado` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`code`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `playlist`.`genero`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `playlist`.`genero` ;

CREATE  TABLE IF NOT EXISTS `playlist`.`genero` (
  `code` INT(11) NOT NULL AUTO_INCREMENT ,
  `genero` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`code`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `playlist`.`musica`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `playlist`.`musica` ;

CREATE  TABLE IF NOT EXISTS `playlist`.`musica` (
  `code` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `cod_genero` INT(11) NOT NULL ,
  `artista` VARCHAR(45) NULL ,
  `path` VARCHAR(45) NOT NULL ,
  `album` VARCHAR(45) NULL ,
  PRIMARY KEY (`code`) ,
  INDEX `genero_idx` (`cod_genero` ASC) ,
  CONSTRAINT `genero`
    FOREIGN KEY (`cod_genero` )
    REFERENCES `playlist`.`genero` (`code` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `playlist`.`privacidad`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `playlist`.`privacidad` ;

CREATE  TABLE IF NOT EXISTS `playlist`.`privacidad` (
  `code` INT(11) NOT NULL AUTO_INCREMENT ,
  `privacidad` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`code`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `playlist`.`tipoUsuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `playlist`.`tipoUsuario` ;

CREATE  TABLE IF NOT EXISTS `playlist`.`tipoUsuario` (
  `code` INT(11) NOT NULL AUTO_INCREMENT ,
  `tipoUsuario` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`code`) )
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `playlist`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `playlist`.`usuario` ;

CREATE  TABLE IF NOT EXISTS `playlist`.`usuario` (
  `code` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `apellido` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `pass` VARCHAR(45) NOT NULL ,
  `alias` VARCHAR(45) NOT NULL ,
  `cod_tipoUsuario` INT(11) NOT NULL ,
  `fua` DATETIME NULL ,
  PRIMARY KEY (`code`) ,
  INDEX `tipoDeUsuario_idx` (`cod_tipoUsuario` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) ,
  CONSTRAINT `tipoDeUsuario`
    FOREIGN KEY (`cod_tipoUsuario` )
    REFERENCES `playlist`.`tipoUsuario` (`code` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `playlist`.`playlist`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `playlist`.`playlist` ;

CREATE  TABLE IF NOT EXISTS `playlist`.`playlist` (
  `code` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `categoria` VARCHAR(45) NOT NULL ,
  `cod_privacidad` INT(11) NOT NULL ,
  `cod_usuario` INT(11) NOT NULL ,
  `fechaCreacion` DATETIME NOT NULL ,
  `fechaModificacion` DATETIME NOT NULL ,
  `cantidadReproducciones` INT(11) NOT NULL DEFAULT '0' ,
  PRIMARY KEY (`code`) ,
  INDEX `estadoPrivacidad_idx` (`cod_privacidad` ASC) ,
  INDEX `usuarioPlaylist_idx` (`cod_usuario` ASC) ,
  CONSTRAINT `estadoPrivacidad`
    FOREIGN KEY (`cod_privacidad` )
    REFERENCES `playlist`.`privacidad` (`code` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `usuarioPlaylist`
    FOREIGN KEY (`cod_usuario` )
    REFERENCES `playlist`.`usuario` (`code` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `playlist`.`musicaPlaylist`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `playlist`.`musicaPlaylist` ;

CREATE  TABLE IF NOT EXISTS `playlist`.`musicaPlaylist` (
  `cod_musica` INT(11) NOT NULL ,
  `cod_playlist` INT(11) NOT NULL ,
  PRIMARY KEY (`cod_musica`, `cod_playlist`) ,
  INDEX `musica_idx` (`cod_musica` ASC) ,
  INDEX `playList_idx` (`cod_playlist` ASC) ,
  CONSTRAINT `musica`
    FOREIGN KEY (`cod_musica` )
    REFERENCES `playlist`.`musica` (`code` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `playList`
    FOREIGN KEY (`cod_playlist` )
    REFERENCES `playlist`.`playlist` (`code` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `playlist`.`tipoNotificaciones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `playlist`.`tipoNotificaciones` ;

CREATE  TABLE IF NOT EXISTS `playlist`.`tipoNotificaciones` (
  `code` INT(11) NOT NULL AUTO_INCREMENT ,
  `tipoNotificacion` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`code`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `playlist`.`notificaciones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `playlist`.`notificaciones` ;

CREATE  TABLE IF NOT EXISTS `playlist`.`notificaciones` (
  `code` INT(11) NOT NULL ,
  `cod_usuario` INT(11) NOT NULL ,
  `cod_tipo` INT(11) NOT NULL ,
  `cod_playList` INT(11) NULL DEFAULT NULL ,
  `fecha` DATETIME NOT NULL ,
  PRIMARY KEY (`code`, `cod_usuario`) ,
  INDEX `usuario_idx` (`cod_usuario` ASC) ,
  INDEX `tipoNotificacion_idx` (`cod_tipo` ASC) ,
  INDEX `playList_idx` (`cod_playList` ASC) ,
  CONSTRAINT `listPlay`
    FOREIGN KEY (`cod_playList` )
    REFERENCES `playlist`.`playlist` (`code` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `tipoNotificacion`
    FOREIGN KEY (`cod_tipo` )
    REFERENCES `playlist`.`tipoNotificaciones` (`code` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `usuario`
    FOREIGN KEY (`cod_usuario` )
    REFERENCES `playlist`.`usuario` (`code` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `playlist`.`rankingPlaylist`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `playlist`.`rankingPlaylist` ;

CREATE  TABLE IF NOT EXISTS `playlist`.`rankingPlaylist` (
  `code_usuario` INT(11) NOT NULL ,
  `cod_playList` INT(11) NOT NULL ,
  `meGusta` INT(11) NULL DEFAULT NULL ,
  `noMeGusta` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`code_usuario`, `cod_playList`) ,
  INDEX `usuarioSeguimiento_idx` (`code_usuario` ASC) ,
  INDEX `playListSeguimiento_idx` (`cod_playList` ASC) ,
  CONSTRAINT `playListSeguimiento`
    FOREIGN KEY (`cod_playList` )
    REFERENCES `playlist`.`playlist` (`code` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `usuarioSeguimiento`
    FOREIGN KEY (`code_usuario` )
    REFERENCES `playlist`.`usuario` (`code` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `playlist`.`seguimientoUsuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `playlist`.`seguimientoUsuario` ;

CREATE  TABLE IF NOT EXISTS `playlist`.`seguimientoUsuario` (
  `cod_usuario` INT(11) NOT NULL ,
  `cod_usuarioAseguir` INT(11) NOT NULL ,
  `cod_estadoSeguimiento` INT(11) NOT NULL ,
  PRIMARY KEY (`cod_usuario`, `cod_usuarioAseguir`) ,
  INDEX `usuarioSeguimiento_idx` (`cod_usuario` ASC) ,
  INDEX `usuarioSeguir_idx` (`cod_usuarioAseguir` ASC) ,
  INDEX `estadoDeSeguimiento_idx` (`cod_estadoSeguimiento` ASC) ,
  CONSTRAINT `estadoDeSeguimiento`
    FOREIGN KEY (`cod_estadoSeguimiento` )
    REFERENCES `playlist`.`estadoSeguimiento` (`code` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `usuarioActual`
    FOREIGN KEY (`cod_usuario` )
    REFERENCES `playlist`.`usuario` (`code` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `usuarioSeguir`
    FOREIGN KEY (`cod_usuarioAseguir` )
    REFERENCES `playlist`.`usuario` (`code` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

USE `playlist` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
