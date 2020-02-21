<?php

require_once ("config-pets.php");

class Database
{

    //PDO object
    private $_dbh;

    function __construct()
    {
        try {
            //Create a new PDO connection
            $this->_dbh =  new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            //echo "Connected!";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function getPets()
    {
        //Define the query
        $sql = "SELECT * FROM pets
                ORDER BY name";

        //Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //Bind the parameters

        //Execute the parameters
        $statement->execute();

        //Get the result
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}