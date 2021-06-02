# Outbox Multipart
Outbox Multipart table.

```sql
CREATE TABLE `outbox_multipart` (
  `Text` text,
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL default 'Default_No_Compression',
  `UDH` text,
  `Class` integer default '-1',
  `TextDecoded` text,
  `ID` integer unsigned NOT NULL default '0',
  `SequencePosition` integer NOT NULL default '1',
  `Status` enum('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error','Reserved') NOT NULL default 'Reserved',
  `StatusCode` integer NOT NULL default '-1',
  PRIMARY KEY (`ID`, `SequencePosition`)
);

CREATE INDEX outbox_date ON outbox(SendingDateTime, SendingTimeOut);
CREATE INDEX outbox_sender ON outbox(SenderID(250));
```