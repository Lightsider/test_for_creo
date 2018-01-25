
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- News
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `News`;

CREATE TABLE `News`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(100) NOT NULL,
    `short_desc` LONGTEXT NOT NULL,
    `news_date` DATE NOT NULL,
    `description` LONGTEXT NOT NULL,
    `active` TINYINT(1) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
