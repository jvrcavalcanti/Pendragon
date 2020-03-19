<?php

namespace App\Console;

require_once "./vendor/autoload.php";

use Composer\Script\Event;
use Composer\Installer\PackageEvent;

class Make
{
    public static function migration(Event $event)
    {
        $template = file_get_contents("app/console/templates/migration.template.php");
        $args = $event->getArguments();
        $f = fopen("./migration/" . $args[0] . ".php", "w");

        $template = str_replace("className", $args[0], $template);
        $template = str_replace("%name%", strtolower(explode("Table", $args[0])[0]) . "s", $template);

        fwrite($f, $template);

        $json = json_decode(file_get_contents("./config/migrations.json"));
        $json[] = "\\Migration\\" . $args[0];
        file_put_contents("./config/migrations.json", json_encode($json));
    }

    public static function model(Event $event)
    {
        $template = file_get_contents("app/console/templates/model.template.php");
        $args = $event->getArguments();
        $f = fopen("./app/model/" . $args[0] . ".php", "w");

        $template = str_replace("className", $args[0], $template);
        $template = str_replace("%name%", strtolower($args[0]) . "s", $template);

        fwrite($f, $template);
    }

    public static function controller(Event $event)
    {
        $template = file_get_contents("app/console/templates/controller.template.php");
        $args = $event->getArguments();
        $f = fopen("./app/controller/" . $args[0] . ".php", "w");

        $template = str_replace("className", $args[0], $template);

        fwrite($f, $template);
    }

    public static function middleware(Event $event)
    {
        $template = file_get_contents("app/console/templates/middleware.template.php");
        $args = $event->getArguments();
        $f = fopen("./app/middleware/" . $args[0] . ".php", "w");

        $template = str_replace("className", $args[0], $template);

        fwrite($f, $template);
    }

    public static function view(Event $event)
    {
        $args = $event->getArguments();
        mkdir("./resources/view/" . $args[0]);

        fopen("./resources/view/" . $args[0] . "/index.php", "w");
        fopen("./resources/view/" . $args[0] . "/main.js", "w");
        fopen("./resources/view/" . $args[0] . "/style.css", "w");
    }
}