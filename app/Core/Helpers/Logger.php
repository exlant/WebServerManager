<?php declare(strict_types=1);

namespace App\Core\Helpers;

use Illuminate\Support\Facades\Log;
use Throwable;

/**
 * Class Logger
 *
 * @package App\Core\Helpers
 */
class Logger
{
    /**
     * @param Throwable $e
     */
    public static function exception(Throwable $e): void
    {
        Log::debug(get_class($e) . ' has been thrown with message: "' . $e->getMessage() . '" in file: ' . $e->getFile()
            . ' at line: ' . $e->getLine() . '. Trace:' . $e->getTraceAsString());
    }

    /**
     * @param string $string
     */
    public static function log(string $string): void
    {
        Log::debug($string);
    }
}