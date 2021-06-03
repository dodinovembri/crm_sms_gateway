# Contact
Contact table.

```sql
CREATE TABLE `contact_group` (
	`id` INT NOT NULL AUTO_INCREMENT,
    `contact_id`INT NULL,
	`group_id` INT NULL,
    `status` TINYINT NULL,
	PRIMARY KEY (`id`)
);
```