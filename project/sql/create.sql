CREATE TABLE IF NOT EXISTS `library` (
 
 `book_id` int(11) NOT NULL AUTO_INCREMENT,
 
 `book_name` varchar(100) NOT NULL,
 
 `book_isbn` varchar(100) NOT NULL,
 
 `book_category` varchar(100) NOT NULL,
 PRIMARY KEY (`book_id`)
 
);
 
INSERT INTO `library` (`book_id`, `book_name`, `book_isbn`, `book_category`) VALUES
 
(1, 'PHP', 'bk001', 'Server Side'),
 
(3, 'javascript', 'bk002', 'Client Side'),
 
(4, 'Python', 'bk003', 'Data Analysis');
