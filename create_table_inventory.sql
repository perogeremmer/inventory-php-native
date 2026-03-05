CREATE TABLE `inventory`.`category` (`id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(260) NOT NULL , `description` TEXT NOT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `inventory`.`inventory` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(260) NOT NULL,
    `stock` INT NOT NULL DEFAULT 0,
    `expired_at` DATE NULL,
    `category_id` INT NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `deleted_at` TIMESTAMP NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`category_id`) REFERENCES `category`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB;

INSERT INTO `category` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES (NULL, 'Peralatan Mandi', 'Peralatan Mandi', current_timestamp(), current_timestamp()), (NULL, 'Makanan', 'Makanan', current_timestamp(), current_timestamp());