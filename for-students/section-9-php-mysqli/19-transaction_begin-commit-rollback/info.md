# PHP MySQL Transaction (Begin,Commit,RollBack)

PHP MySQL Transaction (Begin, Commit, Rollback) This example will be writing a PHP program with MySQL, using Transaction to check the correctness before actually recording the data . The principle is that when Begin has been performed , under the command that is in the conditions Today it will be checked that it is working correctly. Or is there an error? If there are no errors, it will Commit . Or if there are errors, the program will Rollback , that is, cancel the data that was done in the first place. Syntax

//*** Start Transaction ***//
mysqli_query("BEGIN");

//*** Commit Transaction ***//
mysqli_query("COMMIT")

//*** RollBack Tranasction ***//
mysqli_query("ROLLBACK")



# In addition
, when using Transaction, the Table type must be set to InnoDB

InnoDB Syntax.
CREATE TABLE `customer` (
.
.
.
.
) ENGINE=InnoDB;


# In case of an error, MySQL said: Documentation
#1289 - The 'InnoDB' feature is disabled; you need MySQL built with 'InnoDB' to have it working



This example will add data. I have assumed the addition of duplicate data which has a Primary Key named CustomerID which can successfully add data in the first statement and the second statement cannot add data. And when RollBack occurs, the first Statement data that was already inserted will be canceled immediately. For using Transaction , it can be used both Insert/Update/Delete Record