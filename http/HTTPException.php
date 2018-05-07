<?php
/**
 * Created by PhpStorm.
 * User: Hermann Grieder
 * Date: 5/7/2018
 * Time: 2:39 PM
 */

namespace http;

use \Exception;

class HTTPException extends Exception implements HTTPStatusCode
{
    use HTTPStatusHeader;

    protected $header;
    protected $statusCode;
    protected $body;

    public function __construct($statusCode = HTTPStatusCode::HTTP_400_BAD_REQUEST, $statusPhrase = null, $body = null)
    {
        $this->statusCode = $statusCode;
        $this->header = self::createHeader($statusCode, $statusPhrase);
        $this->body = $body;
    }

    public function getHeader($replaceHeader = true){
        self::setHeader($this->header, $this->statusCode, $replaceHeader);
        return $this->header;
    }

    public function getBody()
    {
        return $this->body;
    }
}