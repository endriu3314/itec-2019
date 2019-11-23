<?php
namespace App\Handlers;

use Illuminate\Http\Response;

class ErrorHandler {

    /**
     * Large array containing different kind of error codes
     *
     * Starting with:
     * 1 = User error
     *
     * @var array
     */

    private static $errors = [
        "101" => [
            "message" => "User could not be found",
            "httpStatusCode"  => 400
        ],
        "102" => [
            "message" => "User could not be updated",
            "httpStatusCode"  => 400
        ],
        "103" => [
            "message" => "Product could not be added",
            "httpStatusCode" => 400
        ]
    ];

    /**
     * Returns error data in a response
     *
     * @param $errorCode
     *
     * @return Response
     */

    public static function getErrorResponse($errorCode) : Response {
        return new Response([
            "success"   => false,
            "message"   => ErrorHandler::$errors[$errorCode]["message"],
            "errorCode" => $errorCode
        ], ErrorHandler::$errors[$errorCode]["httpStatusCode"]);
    }

    /**
     * Retrieve a REST formatted error message
     *
     * @param $errorCode
     *
     * @return array
     */

    public static function getRestFormattedError($errorCode) : array {
        return [
            "success"   => false,
            "message"   => ErrorHandler::$errors[$errorCode]["message"],
            "errorCode" => $errorCode,
            "httpStatusCode" => ErrorHandler::$errors[$errorCode]["httpStatusCode"]
        ];
    }

    /**
     * Get an error
     *
     * @param $errorCode
     *
     * @return array
     */

    public static function getError($errorCode) : array {
        return [
            ErrorHandler::$errors[$errorCode]
        ];
    }
}
