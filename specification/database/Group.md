# Group
Group table.

```sql
CREATE TABLE `group` (
	`id` INT NOT NULL AUTO_INCREMENT,
    `group_code`VARCHAR(100) NOT NULL,
	`group_name` VARCHAR(255) NOT NULL,
    `description` TEXT NULL,
    `status` TINYINT NULL,
	PRIMARY KEY (`id`)
);
```