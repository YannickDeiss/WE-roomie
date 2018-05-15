<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once("config/Autoloader.php");

use controller\ErrorController;
use router\Router;

use http\HTTPException;
use http\HTTPHeader;
use http\HTTPStatusCode;

session_start();

Router::registerRoutes();

/*
 * Web site entry point
 */
try {

    HTTPHeader::setHeader("Access-Control-Allow-Origin: *");
    HTTPHeader::setHeader("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS, HEAD");
    HTTPHeader::setHeader("Access-Control-Allow-Headers: Authorization, Location, Origin, Content-Type, X-Requested-With");

    if ($_SERVER['REQUEST_METHOD'] == "OPTIONS") {
        HTTPHeader::setStatusHeader(HTTPStatusCode::HTTP_204_NO_CONTENT);
    } else {
        Router::call_route($_SERVER['REQUEST_METHOD'], $_SERVER['PATH_INFO']);
    }

} catch (HTTPException $exception) {
    $exception->getHeader();
    ErrorController::show404();
}