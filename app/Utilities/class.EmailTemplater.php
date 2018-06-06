<?php

namespace DDWeekend\Utilities;

class EmailTemplater
{
    public static function parse($path, ...$args)
    {
        // var_dump($args);die();
        $path = str_replace("%firstname%", $args[0], $path);
        $path = str_replace("%lastname%", $args[1], $path);
        $path = str_replace("%email%", $args[2], $path);
        $path = str_replace("%phone%", $args[3], $path);

        return $path;
    }
}