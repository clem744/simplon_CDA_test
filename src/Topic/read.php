header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/DataBase.php';
include_once './Post.php';

if ($_SERVER['REQUEST_METHOD'] != 'GET')
{
    http_response_code(405);
}

$database = new Database_c;
$db = $database->getConnection();
$topic = new Topic_c($db);
$data = $topic->read();

if ($data->rowCount() > 0)
{
    $topic_tab = [];
    $topic_tab['Topic'] = [];
    while ($row = $data->fetch(PDO::FETCH_ASSOC))
    {
        extract($row);
        $topic = ["id" => $id, "title" => $title];
        $topic_tab['Topic'][] = $topic;
    }
    http_response_code(200);
    echo json_encode($topic_tab);
}