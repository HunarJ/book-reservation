/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `books` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `num_of_reservations` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

CREATE TABLE `migration` (
  `version` varchar(180) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `apply_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `reservations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `book_id` int DEFAULT NULL,
  `reserved_from` date DEFAULT NULL,
  `reserved_to` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reservation_users` (`user_id`),
  KEY `fk_reservation_books` (`book_id`),
  CONSTRAINT `fk_reservation_books` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk_reservation_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `auth_key` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `access_token` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

INSERT INTO `books` (`id`, `name`, `description`, `num_of_reservations`) VALUES
(1, 'Harry Potter a Kámen mudrců - J.K.Rowlingová', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi leo mi, nonummy eget tristique non, rhoncus non leo. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asp', 2);
INSERT INTO `books` (`id`, `name`, `description`, `num_of_reservations`) VALUES
(3, 'Harry Potter a Tajemná komnata - J.K.Rowlingová', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi leo mi, nonummy eget tristique non, rhoncus non leo. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asp', 0);
INSERT INTO `books` (`id`, `name`, `description`, `num_of_reservations`) VALUES
(4, 'Harry Potter a Vězeň z Azkabanu - J.K.Rowlingová', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi leo mi, nonummy eget tristique non, rhoncus non leo. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asp', 0);
INSERT INTO `books` (`id`, `name`, `description`, `num_of_reservations`) VALUES
(5, 'Vyhlídka na věčnost - Jiří Kulhánek', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi leo mi, nonummy eget tristique non, rhoncus non leo. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asp', 0),
(6, 'Noční klub I - Jiří Kulhánek', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi leo mi, nonummy eget tristique non, rhoncus non leo. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asp', 1),
(7, 'Noční klub II - Jiří Kulhánek', '	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi leo mi, nonummy eget tristique non, rhoncus non leo. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus as', 0),
(8, 'Vládci strachu - Jiří Kulhánek', '	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi leo mi, nonummy eget tristique non, rhoncus non leo. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus as', 0);

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1690180496);
INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m230725_062138_create_books_table', 1690267020);


INSERT INTO `reservations` (`id`, `user_id`, `book_id`, `reserved_from`, `reserved_to`) VALUES
(1, 3, 1, '2023-07-25', '2023-08-08');
INSERT INTO `reservations` (`id`, `user_id`, `book_id`, `reserved_from`, `reserved_to`) VALUES
(2, 3, 1, '2023-07-25', '2023-08-31');
INSERT INTO `reservations` (`id`, `user_id`, `book_id`, `reserved_from`, `reserved_to`) VALUES
(3, 3, 6, '2023-07-25', '2023-08-25');

INSERT INTO `users` (`id`, `username`, `password`, `auth_key`, `access_token`) VALUES
(3, 'janh', '$2y$13$WZ/tiHqr4dTSxTh7BPbdgOsSNcadu/TKoBEtQctrse7AMu8Jv2DyK', 'NHkrr9IFtdxyH8PuGJcvG77OwxdfbMKz', 'xpO28nUuNaFYWjOabYLd7r51TPjNGexZ');
INSERT INTO `users` (`id`, `username`, `password`, `auth_key`, `access_token`) VALUES
(4, 'admin', '$2y$13$1ohv86WFXkWIfz7dgi99Qu5beHqc8GsOyzfDGuJAeszxRHaehLAkG', 'kIY32zMyrmSn5Kk2eTItnVqg6EXRpP_O', '5Z5O80cQL0W4gSSVa3SaXuzMdevCpmby');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;