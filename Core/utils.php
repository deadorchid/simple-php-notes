<?php

use Core\Response;

function selectNavByURI($value)
{
    $uri = parse_url($_SERVER["REQUEST_URI"])["path"];

    if ($uri === $value) {
        return 'bg-gray-950/50 text-white';
    } else {
        return 'text-gray-300 hover:bg-white/5 hover:text-white';
    }
}

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path($path);
}

function abort($code = 404)
{
    http_response_code($code);
    require base_path("views/{$code}.view.php");
    die();
}
