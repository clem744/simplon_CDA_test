class Topic_c
{
    private $connection;
    private $table = "Post";
    private $id;
    private $title;

    public function __construct($db)
    {
        $this->connection = $db;
    }

    public function create()
    {
        $sql = "INSERT INTO " . $this->table . " SET id=:id, title=:title";
        $query = $ths->connection->prepare($sql);

        $query->bindParam(":id", $this->id);
        $query->bindParam(":title", $this->title);
        if ($query->execute())
        {
            return true;
        }
        return false;
    }

    public function read()
    {
        $sql = "SELECT t.id, t.title FROM " . $this->table . " t";
        $query = $this->connection->prepare($sql);

        $query->execute();
        return $query;
    }

    public function update()
    {
        $sql = "UPDATE " . $this->table . " SET title=:title WHERE id=:id"
        $query = $this->connection->prepare($sql);

        $query->bindParam(":tittle", $this->title);
        $query->bindParam(":id", $this->id);
        if ($query->execute())
        {
            return true;
        }
        return false;
    }

    public function delete()
    {
        $sql = "DELETE FROM " . $this->table . " WHERE id=?";
        $query = $this->connection->prepare($sql);

        $query->bindParam(1, $this->id);
        if ($query->execute())
        {
            return true;
        }
        return false;
    }
}