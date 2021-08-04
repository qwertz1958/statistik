<?php

namespace App;

/**
 * Class ErrorCodes, defined error codes
 *
 * @package App
 */

class ErrorCodes
{
    protected $errors = [
        'NOT_FOUND' => [1,404],
        'METHOD_NOT_ALLOWED' => [2,403],
        'ROUTE_NOT_FOUND' => [3,404],
        'ROUTE_METHOD_NOT_ALLOWED' => [4,403],
        'METHOD_NOT_FOUND' => [5,404],
        'DUMMY_ERROR' => [6,418],
        'MISSING_ARRAY_ITEM' => [7,420],
        'CRUD_METHOD_NOT_DEFINED' => [8,403],
        'MISSING_PARAMETER' => [9,420],
        'UNKNOWN_PARAMETER' => [10,420],
        'MISSING_SWAGGER_TYPE_FOR_PARAM' => [11,420],
        'UNKNOWN_PARAMETER_TYPE' => [12,420],
        'MISSING_HD_CORRELATION_ID' => [13,420],
        'UNKNOWN_PARAMETER_ENUM_VALUE' => [14,500],
        'NO_FTP_CONNECTION' => [15,500],
        'FTP_DOWNLOAD_FAILURE' => [16,500],
        'FTP_WRONG_USER_DATA' => [17,420],
        'FILE_NOT_REMOVED' => [18,500],
        'NO_PDF_FILE_FOUND' => [19,504],
        'FTP_ERROR_CREATE_DIRECTORY' => [20,500],
        'FTP_UPLOAD_ERROR' => [21,500],
        'UNKNOWN_MONOLOG_HANDLER' => [22,500],
        'WRONG_AUTH' => [23,401],
        'DIRECTORY_NOT_FOUND' => [24,404],
        'FILE_NOT_FOUND' => [25,404],
        'NO_CONTENT' => [26,404],
        'FORBIDDEN_ROUTE' => [27,403],
        'NO_ACCESS_TO_BASIS_DIRECTORY' => [28,500],
        'NO_FILES_IN_DIRECTORY' => [29,404],
        'FILE_ALREDY_EXIST' => [30,409],
        'NO_ROUTE_EXIST' => [31,400],

        'IS_NOT_A_INTEGER' => [50,500],
        'IS_NOT_A_STRING' => [51,500],
        'IS_NOT_A_FLOAT' => [52,500],
        'IS_NOT_A_DOUBLE' => [53,500],
        'IS_NOT_BOOLEAN' => [54,500],
        'IS_NOT_LESS_THAN_EQUAL' => [55,500],
        'IS_NOT_GREATHER_THAN_EQUAL' => [56,500],
        'WRONG_DOCUMENT_TYPE' => [57,500],
        'IS_NOT_A_FILE' => [58,500],
        'WRONG_FILE_TYPE' => [59,500],
        'NO_SWAGGER_VALIDATION_CONTENT_FOUND' => [60,500]
    ];

    protected static $_instance = null;

    /**
     * get static Error Code
     *
     * @param  $errorCodeName
     * @return int
     * @throws \Throwable
     */
    public static function getErrorCodeStatic($errorCodeName)
    {
        if (null === self::$_instance) {
            self::$_instance = new self;
        }

        return self::$_instance->getErrorCode($errorCodeName);
    }

    /**
     * @param  $errorName
     * @return int
     * @throws \Throwable
     */
    public function getErrorCode($errorName)
    {
        try{
            if(array_key_exists($errorName, $this->errors)) {
                $errorCode =  $this->errors[$errorName][0];
            } else {
                throw new \Exception('missing array item', $this->errors['MISSING_ARRAY_ITEM']);
            }

            return $errorCode;
        }
        catch (\Throwable $e){
            throw $e;
        }
    }

    /**
     * extract the intern error code
     *
     * @return array
     */
    protected function extractErrorCode() :array
    {
        $errorCodes = [];

        foreach ( $this->errors as $key => $error) {
            $errorCodes[$key] = $error[0];
        }

        return $errorCodes;
    }

    /**
     * get all defined errors
     *
     * @return array
     */
    public function getAllErrorCodes() : array
    {
        $errors = $this->extractErrorCode();

        return $errors;
    }

    /**
     * get all errors as json
     *
     * @return false|string
     */
    public function getAllErrorCodeAsJson()
    {
        $errors = $this->extractErrorCode();

        return json_encode($errors);
    }

    /**
     * get the Http Staus Code from a system error
     *
     * @param  int $internErrorCode
     * @return int
     */
    public function findStatusCodeForInternError(int $internErrorCode) : int
    {
        $httpStatusCode = 500;

        foreach($this->errors as $key => $errorArray){
            if($errorArray[0] == $internErrorCode) {
                $httpStatusCode = $errorArray[1];

                break;
            }
        }

        return $httpStatusCode;
    }
}
