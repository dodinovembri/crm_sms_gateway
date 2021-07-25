# Notification

```sql
CREATE TABLE `notification` (
	`id` INT NOT NULL AUTO_INCREMENT,
    `user_id` INT NULL,
    `inbox_id` INT NULL,
    `sender` VARCHAR(255) NULL,
    `is_read` TINYINT NULL,    
    `created_at` TIMESTAMP NULL,
	PRIMARY KEY (`id`)
);
```

