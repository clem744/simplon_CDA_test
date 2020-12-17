header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../DataBase.php';
include_once './Post.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST')
{
    http_response_code(405);
}

$database = new Database_c();
$db = $database->getConnection();
$topic = new Topic_c($db);
$input_data = json_decode(file_get_contents("php://input"));
$topic->title = $input_data->title;
$topic->id = $input_data->id;

if ($topic->create())
{
    http_response_code(201);
    echo json_encode(["message" => "L'ajout a été fait avec succes"]);
}
else
{
    http_response_code(503);
    echo json_encode(["message" => "La tentative d'ajout a echoué"]);         
}