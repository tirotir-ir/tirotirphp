<?php
declare(strict_types=1);

header("Content-Type: application/json; charset=utf-8");
// header("Access-Control-Allow-Origin: https://your-site.example"); // only if another site must call this API

function respond(mixed $data, int $status = 200): never
{
    http_response_code($status);
    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    exit;
}

// Demo data kept in memory. Replace with a database in a real project.
$items = [
    ["id" => 1, "title" => "First item"],
    ["id" => 2, "title" => "Second item"],
];

switch ($_SERVER["REQUEST_METHOD"]) {
    case "GET":
        if (isset($_GET["id"])) {
            foreach ($items as $item) {
                if ($item["id"] === (int) $_GET["id"]) {
                    respond($item);
                }
            }
            respond(["error" => "Not found"], 404);
        }
        respond($items);

    case "POST":
        $data = json_decode((string) file_get_contents("php://input"), true);
        if (!is_array($data) || trim((string) ($data["title"] ?? "")) === "") {
            respond(["error" => "title is required"], 422);
        }
        $new = ["id" => count($items) + 1, "title" => trim((string) $data["title"])];
        respond($new, 201);

    default:
        header("Allow: GET, POST");
        respond(["error" => "Method not allowed"], 405);
}

// Try it:
//   curl http://localhost:8000/api.php
//   curl -X POST -H "Content-Type: application/json" -d '{"title":"New"}' http://localhost:8000/api.php
