header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/DataBase.php';
include_once '../models/Topic.php';

if ($_SERVER['REQUEST_METHOD'] != 'PUT')
{
    http_response_code(405);
}

$database = new Database_c();
$db = $database->getConnection();
$topic = new Topic_c($db);
$input_data = json_decode(file_get_contents("php://input"));
$topic->id = $input_data->id;
$topic->title = $input_data->title;

if ($topic->update())
{
    http_response_code(200);
    echo json_encode(["message" => "L'objet a été modifié'"]);
}
else
{
    http_response_code(503);
    echo json_encode(["message" => "L'objet n'a pas pu etre modifié"]);
}