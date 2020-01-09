<?php

namespace InetStudio\Widgets\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

/**
 * Class SetupCommand.
 */
class SetupCommand extends Command
{
    /**
     * Имя команды.
     *
     * @var string
     */
    protected $name = 'inetstudio:widgets:setup';

    /**
     * Описание команды.
     *
     * @var string
     */
    protected $description = 'Setup widgets package';

    /**
     * Список дополнительных команд.
     *
     * @var array
     */
    protected $calls = [];

    /**
     * Запуск команды.
     */
    public function handle(): void
    {
        $this->initCommands();

        foreach ($this->calls as $info) {
            if (! isset($info['command'])) {
                continue;
            }

            $params = (isset($info['params'])) ? $info['params'] : [];

            $this->line(PHP_EOL.$info['description']);

            switch ($info['type']) {
                case 'artisan':
                    $this->call($info['command'], $params);
                    break;
                case 'cli':
                    $process = new Process($info['command']);
                    $process->run();
                    break;
            }
        }
    }

    /**
     * Инициализация команд.
     */
    private function initCommands(): void
    {
        $this->calls = [
            [
                'type' => 'artisan',
                'description' => 'Publish migrations',
                'command' => 'vendor:publish',
                'params' => [
                    '--provider' => 'InetStudio\Widgets\Providers\WidgetsServiceProvider',
                    '--tag' => 'migrations',
                ],
            ],
            [
                'type' => 'artisan',
                'description' => 'Migration',
                'command' => 'migrate',
            ],
        ];
    }
}
