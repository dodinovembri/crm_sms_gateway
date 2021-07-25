# Notification

```sql
CREATE TRIGGER after_insert_inbox 
    AFTER INSERT ON inbox
    FOR EACH ROW 
BEGIN
    INSERT INTO notification
    set inbox_id = NEW.id,
    sender=NEW.sender,
    is_read=1,
    created_at = NOW(); 
END;

DELIMITER //

CREATE TRIGGER after_insert_inbox
AFTER INSERT
   ON inbox FOR EACH ROW

BEGIN

   DECLARE vUser varchar(50);

   -- Find username of person performing the INSERT into table
   SELECT USER() INTO inbox;
   SELECT USER() INTO users;

   -- Insert record into audit table
   INSERT INTO notification
   ( inbox_id,
     sender,
    is_read,
     created_at)
   VALUES
   ( NEW.id,
     SYSDATE(),
     vUser );

END; //

DELIMITER ;
```

