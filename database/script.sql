alter table penalty_gk add id int primary key AUTO_INCREMENT;
CREATE TABLE `player_mast` (
  `player_id` int NOT NULL,
  `team_id` int NOT NULL,
  `jersey_no` int NOT NULL,
  `player_name` varchar(40) NOT NULL,
  `posi_to_play` varchar(2) NOT NULL,
  `dt_of_bir` date NOT NULL,
  `age` int NOT NULL,
  `playing_club` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`player_id`),
  KEY `fk_player_mast_playing_position_idx` (`posi_to_play`),
  KEY `fk_player_mast_soccer_country1_idx` (`team_id`),
  CONSTRAINT `fk_player_mast_playing_position` FOREIGN KEY (`posi_to_play`) REFERENCES `playing_position` (`position_id`),
  CONSTRAINT `fk_player_mast_soccer_country1` FOREIGN KEY (`team_id`) REFERENCES `soccer_country` (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;