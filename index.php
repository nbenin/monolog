<?php
require_once 'vendor/autoload.php';
use Monolog\Handler\BrowserConsoleHandler;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('infoLog');

$message = $_GET['message'];
// add records to the log
switch($_GET['type']) {
    case DEBUG:
        $log->pushHandler(new StreamHandler('logs/info.log'));
        $log->pushHandler(new BrowserConsoleHandler());
        $log->debug($message);
        break;
    case INFO:
        $log->pushHandler(new StreamHandler('logs/info.log'));
        $log->pushHandler(new BrowserConsoleHandler());
        $log->info($message);
        break;
    case NOTICE:
        $log->pushHandler(new StreamHandler('logs/info.log'));
        $log->pushHandler(new BrowserConsoleHandler());
        $log->notice($message);
        break;
    case WARNING:
        $log->pushHandler(new StreamHandler('logs/warning.log', Logger::WARNING));
        $log->warning($message);
        break;
    case ERROR:
        $log->pushHandler(new StreamHandler('logs/warning.log', Logger::ERROR));
        $log->error($message);
        break;
    case CRITICAL:
        $log->pushHandler(new StreamHandler('logs/warning.log', Logger::CRITICAL));
        $log->critical($message);
        break;
    case ALERT:
        $log->pushHandler(new StreamHandler('logs/warning.log', Logger::ALERT));
        $log->alert($message);
        break;
    case EMERGENCY:
        $log->pushHandler(new StreamHandler('logs/emergency.log', Logger::EMERGENCY));
        $log->emergency($message);
        break;
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logger</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css" rel="stylesheet"/>

    <style>
        button {
            display: block;
            margin: 12px 0px;
        }
    </style>
</head>
<body>
<form method="get">
    <h1>Using Monolog with Composer</h1>

    <input type="text" name="message" placeholder="My log message" class="form-control" required />

    <button type="submit" name="type" value="DEBUG" class="btn btn-info">DEBUG (100): Detailed debug information.</button>
    <button type="submit" name="type" value="INFO" class="btn btn-info">INFO (200): Interesting events. Examples: User logs in, SQL logs.
    </button>
    <button type="submit" name="type" value="NOTICE" class="btn btn-info">NOTICE (250): Normal but significant events.
    </button>
    <button type="submit" name="type" value="WARNING" class="btn btn-warning">WARNING (300): Exceptional occurrences that are not errors. Examples: Use of deprecated APIs, poor use of an API, undesirable things that are not necessarily wrong.
    </button>
    <button type="submit" name="type" value="ERROR" class="btn btn-danger">ERROR (400): Runtime errors that do not require immediate action but should typically be logged and monitored.
    </button>
    <button type="submit" name="type" value="CRITICAL" class="btn btn-danger">CRITICAL (500): Critical conditions. Example: Application component unavailable, unexpected exception.
    </button>
    <button type="submit" name="type" value="ALERT" class="btn btn-danger">ALERT (550): Action must be taken immediately. Example: Entire website down, database unavailable, etc. This should trigger the SMS alerts and wake you up.
    </button>
    <button type="submit" name="type" value="EMERGENCY" class="btn btn-dark">EMERGENCY (600): Emergency: system is unusable.
    </button>
</form>
</body>
</html>