create table if not exists `users`(
    `id` int auto_increment primary key not null,
    `first_name` varchar(255) not null,
    `last_name` varchar(255) not null,
    `password_hash` varchar(255) not null,
    `credit_score` int not null,
    `email` varchar(255)
);

create table if not exists `sessions`(
    `id` int auto_increment primary key not null,
    `user_id` int not null,
    `ip` varchar(255) not null,
    `token` varchar(255) not null,
    `created_at` datetime not null,
    `expires_at` datetime not null,
    constraint `fk_session_owner`
        foreign key(`user_id`)
        references `users`(`id`)
);

create table if not exists `accounts`(
    `id` int auto_increment primary key not null,
    `account_number` int not null,
    `user_id` int not null,
    `balance` decimal default 0 not null,
    `name` varchar(255) not null,
    `daily_limit` decimal,
    constraint `fk_account_owner`
        foreign key(`user_id`)
        references `users`(`id`)
);

create table if not exists `cards`(
    `id` int auto_increment primary key not null,
    `card_number` varchar(255),
    `account_id` int not null,
    `daily_limit` decimal,
    constraint `fk_card_account`
        foreign key(`account_id`)
        references `accounts`(`id`)
);

create table if not exists `transactions`(
    `id` int auto_increment primary key not null,
    `amount` decimal not null,
    `session_id` int not null,
    `source_account_id` int not null,
    `destination_account_id` int not null,

    constraint `fk_transaction_source`
        foreign key(`source_account_id`)
        references `accounts`(`id`),
    constraint `fk_transaction_destination`
        foreign key(`destination_account_id`)
        references `accounts`(`id`)
);