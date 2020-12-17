class Database_c {
    private $host = "localhost";
    private $db_name = "ApiRest";
    private $username = "root";
    private $password = "";
    public $connexion;

    public function getConnection()
    {
        $this->connexion = null;
        try{
            $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->connection->exec("set names utf8");
        }
        catch($exception){
            echo "Erreur de connexion : " . $exception->getMessage();
        }
        return $this->connexion;
    }   
}
