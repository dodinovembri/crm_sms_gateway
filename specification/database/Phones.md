# Outbox
Outbox table.

```sql
CREATE TABLE `phones` (
  `ID` text NOT NULL,
  `UpdatedInDB` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `TimeOut` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `Send` enum('yes','no') NOT NULL default 'no',
  `Receive` enum('yes','no') NOT NULL default 'no',
  `IMEI` varchar(35) NOT NULL,
  `IMSI` varchar(35) NOT NULL,
  `NetCode` varchar(10) default 'ERROR',
  `NetName` varchar(35) default 'ERROR',
  `Client` text NOT NULL,
  `Battery` integer NOT NULL DEFAULT -1,
  `Signal` integer NOT NULL DEFAULT -1,
  `Sent` int NOT NULL DEFAULT 0,
  `Received` int NOT NULL DEFAULT 0,
  PRIMARY KEY (`IMEI`)
);

CREATE INDEX outbox_date ON outbox(SendingDateTime, SendingTimeOut);
CREATE INDEX outbox_sender ON outbox(SenderID(250));
```