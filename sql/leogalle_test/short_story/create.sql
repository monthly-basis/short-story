CREATE TABLE `short_story` (
    `short_story_id` int(10) unsigned auto_increment,
    `user_id` int(10) unsigned not null,
    `title` varchar(255) not null,
    `body` text,
    PRIMARY KEY (`short_story_id`)
) charset=utf8;
