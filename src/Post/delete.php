header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/Database.php';
include_once '../models/Produits.php';

if ($_SERVER['REQUEST_METHOD'] != 'DELETE')
{
    http_response_code(405);
}

$database = new Database_c();
$db = $database->getConnection();
$post = new Post_c($db);
$input_data = json_decode(file_get_contents("php://input"));
$post->id = $input_data->id;

if ($post->delete())
{
    http_response_code(200);
    echo json_encode(["message" => "L'objet a bien été suprimé'"]);
}
else
{
    http_response_code(503);
    echo json_encode(["message" => "L'objet n'as pas pu etre suprimé"]);
}