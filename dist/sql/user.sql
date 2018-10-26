CREATE TABLE `user` ( `email` VARCHAR(60) NOT NULL , `code` VARCHAR(60) NOT NULL , PRIMARY KEY (`email`));


INSERT INTO `user` (`email`, `code`) VALUES ('user1@example.com', ''), ('user2@example.com', '827ccb0eea8a706c4c34a16891f84e7b');