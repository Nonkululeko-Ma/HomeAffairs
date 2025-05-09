<?php
class Database {
	private $dbHost = 'localhost';
	private $dbUsername = 'root';
	private $dbPassword = '';
	private $dbDatabase = 'details';

	private $dbConn;

    public function __construct()
    {
        $this->connect();
    }

    public function getDbHost() {
        return $this->dbHost;
    }

    public function setDbHost($dbHost) {
        $this->dbHost = $dbHost;
    }

    public function getDbUsername() {
        return $this->dbUsername;
    }

    public function setDbUsername($dbUsername) {
        $this->dbUsername = $dbUsername;
    }

    public function getDbPassword() {
        return $this->dbPassword;
    }

    public function setDbPassword($dbPassword) {
        $this->dbPassword = $dbPassword;
    }

    public function getDbDatabase() {
        return $this->dbDatabase;
    }

    public function setDbDatabase($dbDatabase) {
        $this->dbDatabase = $dbDatabase;
        $this->selectDb();
    }

    public function connect()
    {
        $this->dbConn = mysqli_connect($this->dbHost, $this->dbUsername, $this->dbPassword);
        $this->selectDb();
    }

    public function selectDb()
    {
        if($this->dbConn)
        {
            mysqli_select_db($this->dbConn, $this->dbDatabase);
        }
        else
        {
            die('<strong>Error: </strong> Could not connect to database1');
        }
    }

    public function getDbConn()
    {
        return $this->dbConn;
    }

    public function selectDb2($dbDatabase)
    {
        $this->setDbDatabase($dbDatabase);
        if($this->dbConn)
        {
            mysqli_select_db($this->dbConn, $this->dbDatabase);
        }
        else
        {
            die('<strong>Error: </strong> Could not connect to database2');
        }
    }

    public function doQuery($query)
    {
        return mysqli_query($this->dbConn, $query, MYSQLI_USE_RESULT);
    }

    public function getError() {
        return mysqli_error($this->dbConn);
    }

    public function getInsertId(){
        return mysqli_insert_id($this->dbConn);
    }
}