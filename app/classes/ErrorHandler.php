<?php
namespace App\Classes;

use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

class ErrorHandler
{
    public function __construct()
    {
        $whoops = new Run();
        $whoops->pushHandler(new PrettyPageHandler());
        $whoops->register();
    }

    // public function handleErrors($error_number, $error_message, $error_file, $error_line)
    // {
    //     echo "There is an error inside {$error_file} file, line at {$error_line}";
    //     $whoops = new Run();
    //     $whoops->pushHandler(new PrettyPageHandler());
    //     $whoops->register();
    // }
}
?>