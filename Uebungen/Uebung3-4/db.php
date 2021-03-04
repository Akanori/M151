<?php
class DB
{
    protected static $instance;
    
    protected $pdo;

    protected $hasRunningTransaction = false;
    
    private function __construct()
    {
        $servername = "localhost";
        $username = "vmadmin";
        $password = "sml12345";
        $database = "northwind";

        $this->pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public static function get() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        
        return self::$instance;
    }

    public function startTransaction(){
        if($this->hasRunningTransaction){
            throw new Exception("Multiple Transactions are not supported");
        }
        $this->pdo->exec('START TRANSACTION');
        $this->hasRunningTransaction = true;
    }

    public function rollbackTransaction(){
        if(!$this->hasRunningTransaction){ throw new Exception("No Transaction running"); }
        $this->pdo->exec('ROLLBACK');
        $this->hasRunningTransaction = false;
    }

    public function commitTransaction(){
        if(!$this->hasRunningTransaction){ throw new Exception("No Transaction running"); }
        $this->pdo->exec('COMMIT');
        $this->hasRunningTransaction = false;
    }

    public function query($sql, $params){
        $statement = $this->pdo->prepare($sql);
        $statement->execute($params);
    }

    public function select($sql, $params){
        $statement = $this->pdo->prepare($sql);
        $statement->execute($params);

        return $statement->fetchAll();
    }

    public function __destruct()
    {
        $this->pdo->exec('COMMIT');
    }
}
?>