# Outbox
Outbox table.

```sql
CREATE TABLE `outbox` (
  `UpdatedInDB` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `SendingDateTime` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `SendBefore` time NOT NULL DEFAULT '23:59:59',
  `SendAfter` time NOT NULL DEFAULT '00:00:00',
  `Text` text,
  `DestinationNumber` varchar(20) NOT NULL default '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL default 'Default_No_Compression',
  `UDH` text,
  `Class` integer default '-1',
  `TextDecoded` text NOT NULL,
  `ID` integer unsigned NOT NULL auto_increment,
  `MultiPart` enum('false','true') default 'false',
  `RelativeValidity` integer default '-1',
  `SenderID` varchar(255),
  `SendingTimeOut` timestamp NULL default CURRENT_TIMESTAMP,
  `DeliveryReport` enum('default','yes','no') default 'default',
  `CreatorID` text NOT NULL,
  `Retries` int(3) default 0,
  `Priority` integer default 0,
  `Status` enum('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error','Reserved') NOT NULL default 'Reserved',
  `StatusCode` integer NOT NULL default '-1',
  PRIMARY KEY `ID` (`ID`)
);

CREATE INDEX outbox_date ON outbox(SendingDateTime, SendingTimeOut);
CREATE INDEX outbox_sender ON outbox(SenderID(250));
```