<?php 

class DB{
    private $con;
    private $host = "localhost";
    private $dbname = "strefa";
    private $user = "root";
    private $password = "";

    public function __construct(){
        $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;

        try{
            $this->con = new PDO($dsn, $this->user, $this->password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connection Succesful";
        }   catch(PDOExpection $e) {
            echo "connection failed: " . $e->getMessage();
        }
    }

    public function viewData(){
        $query = "SELECT TITLE FROM anime";
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function searchData($name){
        $query = "SELECT TITLE FROM anime WHERE TITLE LIKE :TITLE";
        $stmt = $this->con->prepare($query);
        $stmt->execute(["TITLE" => "%" . $name . "%"]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}
?>