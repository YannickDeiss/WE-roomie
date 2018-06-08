<?php

/**
 * Created by PhpStorm.
 * User: Tobias
 * Date: 07.05.2018
 * Time: 12:44
 */

namespace router;

use controller\EmailController;
use controller\HomepageController;
use controller\ListingController;
use controller\RegisterController;
use controller\AuthController;
use controller\ErrorController;
use controller\PasswordResetController;
use controller\PDFController;
use controller\SearchController;
use controller\UserController;
use http\Exception;
use http\HTTPException;
use http\HTTPStatusCode;
use http\HTTPHeader;

class Router
{
    protected static $routes = [];

    public static function init() {
        $protocol = isset($_SERVER['HTTPS']) || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === "https") ? 'https' : 'http';
        $_SERVER['SERVER_PORT'] === "80" ? $serverPort = "" : $serverPort = ":" . $_SERVER['SERVER_PORT'];
        $GLOBALS["ROOT_URL"] = $protocol . "://" . $_SERVER['SERVER_NAME'] . $serverPort . strstr($_SERVER['PHP_SELF'], $_SERVER['ORIGINAL_PATH'], true);
        if (!empty($_SERVER['REDIRECT_ORIGINAL_PATH'])) {
            $_SERVER['PATH_INFO'] = $_SERVER['REDIRECT_ORIGINAL_PATH'];
        } else {
            $_SERVER['PATH_INFO'] = "/";
        }
    }

    public static function route($method, $path, $routeFunction) {
        self::route_auth($method, $path, null, $routeFunction);
    }

    public static function route_auth($method, $path, $authFunction, $routeFunction) {
        if (empty(self::$routes))
            self::init();
        $path = trim($path, '/');
        preg_match_all("/{(.*?)}/", $path, $matches);
        foreach ($matches[1] as $match_key => $match_value) {
            $match_pos = strpos($path, $match_value);
            if ($match_pos) {
                $path = substr_replace($path, "{parameter" . $match_key . "}", $match_pos - 1, strlen($match_value) + 2);
            }
        }
        self::$routes[$method][$path] = array("authFunction" => $authFunction, "routeFunction" => $routeFunction);
    }

    public static function call_route($method, $path) {
        $path = trim(parse_url($path, PHP_URL_PATH), '/');
        $path_pieces = explode('/', $path);
        $parameters = [];
        $parameter_number = 0;
        foreach ($path_pieces as $path_value) {
            if (is_numeric($path_value)) {
                $parameters[$parameter_number] = $path_value;
                $path = str_replace("/" . $path_value, "/" . "{parameter" . $parameter_number++ . "}", $path);
            }
        }
        if (!array_key_exists($method, self::$routes) || !array_key_exists($path, self::$routes[$method])) {
            throw new HTTPException(HTTPStatusCode::HTTP_404_NOT_FOUND);
        }
        $route = self::$routes[$method][$path];
        if (isset($route["authFunction"])) {
            if (!$route["authFunction"]()) {
                return;
            }
        }
        $route["routeFunction"](...$parameters);
    }

    public static function errorHeader() {
        HTTPHeader::setStatusHeader(HTTPStatusCode::HTTP_404_NOT_FOUND);
    }

    public static function redirect($redirect_path) {
        HTTPHeader::redirect($redirect_path);
    }

    public static function registerRoutes() {
        $authFunction = function () {
            if (AuthController::authenticate())
                return true;
            self::redirect("/");
            return false;
        };

// Home path
        self::route("GET", "/", function () {
            HomepageController::show();
        });

// Search path

        self::route("GET", "/search", function () {
            SearchController::show();
        });

        self::route("POST", "/search", function () {
            SearchController::readAll();
        });

        self::route("GET", "/search/{id}", function ($id) {
            SearchController::getListingById($id);
        });

// Login path

        self::route("POST", "/login", function () {
            AuthController::login();
            self::redirect("/user");
        });

// Register path

        self::route("POST", "/signUpValidator", function () {
            $response = RegisterController::validateUserEntry();
            echo json_encode($response);
        });

        self::route("POST", "/register", function () {
            if (RegisterController::registerUser()) {
                AuthController::login();
                self::redirect("/user");
            }
        });

        self::route_auth("GET", "/user/edit", $authFunction, function () {
            RegisterController::editView();
        });

        self::route_auth("POST", "/user/edit", $authFunction, function () {
            if (RegisterController::update())
                self::redirect("/user");
        });

// Logout path
        self::route("GET", "/logout", function () {
            AuthController::logout();
            self::redirect("/");
        });


// Password Request and Reset
        self::route("GET", "/password/reset", function () {
            PasswordResetController::resetView();
        });

        self::route("POST", "/password/reset", function () {
            PasswordResetController::resetEmail();
            self::redirect("/password/checkMail");
        });

        self::route("GET", "/password/checkMail", function () {
            PasswordResetController::checkEmailView();
        });

        self::route("GET", "/password/request", function () {
            PasswordResetController::requestView();
        });

        self::route("POST", "/password/request", function () {
            PasswordResetController::updatePassword();
            self::redirect("/");
        });


// user paths
        self::route_auth("GET", '/user', $authFunction, function () {
            ListingController::readAll();
        });

        self::route_auth("GET", '/user/emailListings', $authFunction, function () {
            EmailController::sendMeMyCustomers();
            Router::redirect("/user/");
        });

// Listing CRUD


        self::route_auth("GET", "/listing/create", $authFunction, function () {
            ListingController::create();
        });

        self::route_auth("GET", "/listing/edit", $authFunction, function () {
            ListingController::edit();
        });

        self::route_auth("POST", "/listing/edit", $authFunction, function () {
            if (ListingController::update())
                self::redirect("/user");
        });

        self::route_auth("GET", "/listing/delete", $authFunction, function () {
            ListingController::delete();
            self::redirect("/user");
        });

        self::route_auth("POST", "/listing/update", $authFunction, function () {
            if (ListingController::update())
                self::redirect("/user");
        });

        self::route("GET", "/pdf/{id}", function ($id) {
            PDFController::generateDetailPDF($id);
        });
    }


}