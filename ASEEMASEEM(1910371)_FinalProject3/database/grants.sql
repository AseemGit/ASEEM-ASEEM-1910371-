--
-- Database: `database1910371`
--
-- --------------------------------------------------------
--
-- Create User & password
--

CREATE USER 'database1910371'@'localhost' IDENTIFIED BY 'database1910371';

-- --------------------------------------------------------

--
-- Privileges on
--

GRANT ALL PRIVILEGES ON database1910371.* TO 'database1910371'@'localhost' WITH GRANT OPTION;