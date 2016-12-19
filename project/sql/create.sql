CREATE TABLE IF NOT EXISTS `library` (
 
 `book_id` int(11) NOT NULL,
 
 `book_name` varchar(100) NOT NULL,
 
 `book_isbn` varchar(100) NOT NULL,
 
 `book_category` varchar(100) NOT NULL
 
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
 
INSERT INTO `library` (`book_id`, `book_name`, `book_isbn`, `book_category`) VALUES
 
(1, 'PHP', 'bk001', 'Server Side'),
 
(3, 'javascript', 'bk002', 'Client Side'),
 
(4, 'Python', 'bk003', 'Data Analysis');