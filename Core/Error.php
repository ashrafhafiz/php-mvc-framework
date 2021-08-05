<?php

namespace Core;

/**
 * Error and exception handler
 *
 * PHP version 7.4.20
 *
 * @category Core class
 * @package  PHP-MVC-Framework
 * @author   Ashraf Hafiz <ashraf.hafiz@yahoo.com>
 * @license  MIT License - http://NA
 * @link     NA
 */

class Error
{

    /**
     * Error handler. Converting all errors to exceptions by throwing an ErrorException
     *
     * @param int $level        The severity level of the exception.
     * @param string $message   The Exception message to throw.
     * @param string $file      The filename where the exception is thrown.
     * @param string $line      The line number where the exception is thrown.
     *
     * @return void
     */
    public static function errorHandler($level, $message, $file, $line)
    {
        if (error_reporting() !== 0) {
            throw new \ErrorException($message, 0, $level,$file, $line);
            
        }
    }


    /**
     * Exception handler
     * 
     * @param Exception $exception      The Exception
     * 
     * @return void
     */
    public static function exceptionHandler($exception)
    {
        $code = $exception->getCode();
        if ($code != 404) {
            $code = 500;
        }
        http_response_code($code);

        if (\App\Config::SHOW_ERROR) {
            echo "<h1>Fatal error</h1>";
            echo "<p>Uncaught exception: '" . get_class($exception) . "'</p>";
            echo "<p>Message: '" . $exception->getMessage() . "'</p>";
            echo "<p>Stack trace:<pre>" . $exception->getTraceAsString() . "</pre></p>";
            echo "<p>Thrown in '" . $exception->getFile() . "' on line: " . $exception->getLine() . "</p>";
        } else {
            $log = dirname(__DIR__) . '/logs/' . date('Y-m-d') . '.txt';
            ini_set('error_log', $log);

            $message = "Uncaught exception: '" . get_class($exception) . "'";
            $message .= " with message: '" . $exception->getMessage() . "'";
            $message .= "\nStack trace: " . $exception->getTraceAsString();
            $message .= "\nThrown in: " . $exception->getFile() . "' on line: " . $exception->getLine();
            error_log($message);
            // echo "<h1>An Error Occurred</h1>";
            // if ($code == 404) {
            //     echo "<h1>Page Not Found</h1>";
            // } else {
            //     echo "<h1>An Error Occurred</h1>";
            // }
            View::renderTemplate("$code.html.twig");
        }
    }
}


// @param string $message — [optional] The Exception message to throw.
// @param int $code — [optional] The Exception code.
// @param int $severity — [optional] The severity level of the exception.
// @param string $filename — [optional] The filename where the exception is thrown.
// @param int $line — [optional] The line number where the exception is thrown.