# Contact
Contact table.

```sql
CREATE TABLE `contact` (
	`id` INT NOT NULL AUTO_INCREMENT,
    `participants_number` VARCHAR(100) NULL,
    `name` VARCHAR(100) NULL,
    `phone_number` VARCHAR(40) NULL,
    `major` VARCHAR(255) NULL,
	`email` VARCHAR(50) NULL,
    `status` TINYINT NULL,
	PRIMARY KEY (`id`)
);
```