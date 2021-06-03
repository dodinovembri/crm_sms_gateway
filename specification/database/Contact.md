# Contact
Contact table.

```sql
CREATE TABLE contact (
	`id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NULL,
	`email` VARCHAR(50) NULL,
    `phone_number` VARCHAR(20) NULL,
    `status` TINYINT NULL,
	PRIMARY KEY (`id`)
);
```