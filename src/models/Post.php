class Post_c
{
    private $connection;
    private $table = "Post";
    private $id;
    private $content;
    private $author:
    private $date;

    public function __construct($db)
    {
        $this->connection = $db;
    }

    public function create()
    {
        $sql = "INSERT INTO " . $this->table . " SET id=:id, content=:content, author=:author, date=:date";
        $query = $ths->connection->prepare($sql);

        $query->bindParam(":id", $this->id);
        $query->bindParam(":content", $this->content);
        $query->bindParam(":author", $this->author);
        $query->bindParam(":date", $this->date);
        if ($query->execute())
        {
            return true;
        }
        return false;
    }

    public function read()
    {
        $sql = "SELECT p.id, p.content, p.author, p.date FROM " . $this->table . " p";
        $query = $this->connection->prepare($sql);

        $query->execute();
        return $query;
    }

    public function update()
    {
        $sql = "UPDATE " . $this->table . " SET content=:content,author=:author,date=:date WHERE id=:id"
        $query = $this->connection->prepare($sql);

        $query->bindParam(":content", $this->content);
        $query->bindParam(":author", $this->author);
        $query->bindParam(":date", $this->date);
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