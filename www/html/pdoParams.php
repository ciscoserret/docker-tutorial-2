
<?php

function pdoParams() {
    $database   = "ubersmith";
    $user = "ciscoserret";
    $password = "halibut";
    $host       = "mysql";
    return array( "pdoStr" => "mysql:host={$host};dbname={$database};charset=utf8", 
                  "pdoUser" => $user, 
                  "pdoPw" => $password ); 
}



/*
fetch_style
Controls how the next row will be returned to the caller. This value must be one of the PDO::FETCH_* constants, 
defaulting to value of PDO::ATTR_DEFAULT_FETCH_MODE (which defaults to PDO::FETCH_BOTH).
PDO::FETCH_ASSOC: returns an array indexed by column name as returned in your result set
PDO::FETCH_BOTH (default): returns an array indexed by both column name and 0-indexed column number as returned in your result set
PDO::FETCH_BOUND: returns TRUE and assigns the values of the columns in your result set to the PHP variables to which they were bound with the PDOStatement::bindColumn() method
PDO::FETCH_CLASS: returns a new instance of the requested class, mapping the columns of the result set to named properties in the class, and calling the constructor afterwards, unless PDO::FETCH_PROPS_LATE is also given. If fetch_style includes PDO::FETCH_CLASSTYPE (e.g. PDO::FETCH_CLASS | PDO::FETCH_CLASSTYPE) then the name of the class is determined from a value of the first column.
PDO::FETCH_INTO: updates an existing instance of the requested class, mapping the columns of the result set to named properties in the class
PDO::FETCH_LAZY: combines PDO::FETCH_BOTH and PDO::FETCH_OBJ, creating the object variable names as they are accessed
PDO::FETCH_NAMED: returns an array with the same form as PDO::FETCH_ASSOC, except that if there are multiple columns with the same name, the value referred to by that key will be an array of all the values in the row that had that column name
PDO::FETCH_NUM: returns an array indexed by column number as returned in your result set, starting at column 0
PDO::FETCH_OBJ: returns an anonymous object with property names that correspond to the column names returned in your result set
PDO::FETCH_PROPS_LATE: when used with PDO::FETCH_CLASS, the constructor of the class is called before the properties are assigned from the respective column values.
*/
?>