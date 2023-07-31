<?php
/**
 * Connect to db and execute query
 * @var $db_connection pass the path to pdo instance
 */
class Database
{
    /** 
     * connection to db
     */
    public $connection;

    public function __construct($config, $username = 'root', $password = '')
    {   
        $dsn = 'mysql:' . http_build_query($config,'',';');
        
        // pdo is class from php for dsn to db
        $this->connection = new PDO($dsn,$username,$password,
        [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    /**
     * @return query result
     */
    public function query($query)
    {
        // prepare query
        $statement = $this->connection->prepare($query);

        // and execute it
        $statement->execute();
        return $statement;
    }
}