<?php

//Require Files
require_once dirname(__FILE__) . '/vendor/autoload.php';
require_once  './Application/config.php';
require_once APP_FW_DIR . '/bootstrap.php';

$silex->register(
    new Knp\Provider\ConsoleServiceProvider(),
    array(
        'console.name' => 'TowelConsole',
        'console.version' => '1.0.0',
        'console.project_directory' => '.',
    )
);

$consoleApp = $silex['console'];
$apps = \Towel\Towel::getApps();

foreach ($apps as $app) {
    $commandsDir = $app['path'] . '/Command';
    $commands = glob($commandsDir.'/*.php');

    foreach ($commands as $command) {
        $commandFile = basename($command);
        $commandClass = str_replace('.php', '', $commandFile);

        if ($app['name'] == 'Towel') {
            $commandClass = '\\' . $app['name'] . '\Command\\' . $commandClass;
        } else {
            $commandClass = '\Application\\' . $app['name'] . '\Command\\' . $commandClass;
        }

        $consoleApp->add(new $commandClass());
    }
}


$consoleApp->run();
