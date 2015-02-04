
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- brand
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `brand`;

CREATE TABLE `brand`
(
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- clothes
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `clothes`;

CREATE TABLE `clothes`
(
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- clothes_brand
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `clothes_brand`;

CREATE TABLE `clothes_brand`
(
    `clothes_id` int(10) unsigned NOT NULL,
    `brand_id` int(10) unsigned NOT NULL,
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (`id`),
    INDEX `fk_clothes_has_brand_brand1_idx` (`brand_id`),
    INDEX `fk_clothes_has_brand_clothes_idx` (`clothes_id`),
    CONSTRAINT `fk_clothes_has_brand_brand1`
        FOREIGN KEY (`brand_id`)
        REFERENCES `brand` (`id`)
        ON UPDATE CASCADE,
    CONSTRAINT `fk_clothes_has_brand_clothes`
        FOREIGN KEY (`clothes_id`)
        REFERENCES `clothes` (`id`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
