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

    public $statement;

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
    public function query($query, $params = [])
    {
        // prepare query
        $this->statement = $this->connection->prepare($query);

        // and execute it
        $this->statement->execute($params);
        return $this;
    }

    /**
     * Get can be used for get more results from query
     */
    public function get()
    {
        return $this->statement->fetchAll();
    }

    /**
     * Find can be used for get only one element from query
     */
    public function find()
    {
        return $this->statement->fetch();
    }

    /**
     * FindOrFail can be used for find the element, or get error 404 if it doesn't exists in db
     */
    public function findOrFail()
    {
        $result = $this->find(); 
        if (! $result) {
            abort();
        }
        return $result;
    }
}