# Auto Repply
Auto Reply table.

```sql
CREATE TABLE `autoreply` (
	`id` INT NOT NULL AUTO_INCREMENT,
    `code` VARCHAR(100) NULL,
	`description` VARCHAR(50) NULL,
    `status` TINYINT NULL,
	PRIMARY KEY (`id`)
);
```