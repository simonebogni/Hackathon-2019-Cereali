SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+02:00";

CREATE TABLE `configurations` (
  `item_key` varchar(255) NOT NULL,
  `item_value` varchar(255) NOT NULL DEFAULT '',
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `contracts` (
  `accountant_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `company_id` bigint(20) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `headquarters` (
  `id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `max_hours` tinyint(3) unsigned DEFAULT '8',
  `is_legal` tinyint(1) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `hours` (
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `headquarter_id` bigint(20) unsigned NOT NULL,
  `go_in` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `go_out` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `registers` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `requests` (
  `accountant_id` bigint(20) unsigned NOT NULL,
  `company_id` bigint(20) unsigned NOT NULL,
  `request_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `configurations`
  ADD PRIMARY KEY (`item_key`,`item_value`);

ALTER TABLE `contracts`
  ADD PRIMARY KEY (`accountant_id`,`company_id`),
  ADD KEY `company_key` (`company_id`);

ALTER TABLE `headquarters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_key` (`user_id`);

ALTER TABLE `hours`
  ADD PRIMARY KEY (`user_id`,`go_in`),
  ADD KEY `headquarter_key` (`headquarter_id`);

ALTER TABLE `registers`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `requests`
  ADD PRIMARY KEY (`accountant_id`,`company_id`),
  ADD KEY `company_key` (`company_id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`email`);


ALTER TABLE `headquarters`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
ALTER TABLE `users`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;

ALTER TABLE `contracts`
  ADD CONSTRAINT `contracts_ibfk_1` FOREIGN KEY (`accountant_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `contracts_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `users` (`id`);

ALTER TABLE `headquarters`
  ADD CONSTRAINT `headquarters_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `hours`
  ADD CONSTRAINT `hours_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `hours_ibfk_2` FOREIGN KEY (`headquarter_id`) REFERENCES `headquarters` (`id`);

ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`accountant_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `requests_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `users` (`id`);

INSERT INTO `configurations` (`item_key`, `item_value`, `note`) VALUES
('URL', 'localhost', 'Main site''s URL');