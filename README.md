# php_crud_generator
This is a simplest PHP program to automatically fetch table details from your mysql database and create all necessary CRUD functions in a php file.

The details of the files are as follows:

#dao_code_generator.php
This is the actual code file that needs to be executed to generate a PHP file with crud methods
NOTE: please open the file and update the database details and the class name  of the PHP file to be generated

  define('MYSQL_SERVER', 'localhost');
	define('MYSQL_DATABASE_NAME', 'kistyle');
	define('MYSQL_USERNAME', 'root');
	define('MYSQL_PASSWORD', 'password');
  define('CLASS_NAME', 'saloonDAO');

#saloonDAO.php
This is the file created as a result of executing the code generator PHP

#queriesHelper.php
Just a PHP file with some utility methods to assist in proper formation of the queries and execution

#Controller.php
PHP file with database connection details to be used later for executing the generated PHP file

#sql.php
Utility PHP file with code to connect to mysql database using PDO
