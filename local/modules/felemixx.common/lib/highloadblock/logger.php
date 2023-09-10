<?php

namespace Felemixx\Common\Highloadblock;

class Logger
{
    protected const ENTITY_NAME = 'Logger';

    public static function getHlbName(): string
    {
        return static::ENTITY_NAME;
    }


    public static function addLog(\Throwable $exception): bool
    {
        $hlb = new HlbWrap(static::getHlbName());

        $data = "{$exception->getMessage()}\n{$exception->getFile()}:{$exception->getLine()}";
        $trace = debug_backtrace();

        $insertData = [
            'UF_TRACE_STRING' => $trace,
            'UF_ERROR_DATA' => $data,
        ];

        try {
            echo '<script>console.log(' . \CUtil::PhpToJsObject($insertData) . ');</script>'; //TODO: DELETE IV_LOGGING
            $hlb->add($insertData);

            return true;
        } catch (\Throwable) {
            return false;
        }
    }

}
