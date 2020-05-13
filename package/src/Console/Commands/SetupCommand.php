<?php

namespace InetStudio\WidgetsPackage\Console\Commands;

use InetStudio\AdminPanel\Base\Console\Commands\BaseSetupCommand;

/**
 * Class SetupCommand.
 */
class SetupCommand extends BaseSetupCommand
{
    /**
     * Имя команды.
     *
     * @var string
     */
    protected $name = 'inetstudio:widgets-package:setup';

    /**
     * Описание команды.
     *
     * @var string
     */
    protected $description = 'Setup widgets package';

    /**
     * Инициализация команд.
     */
    protected function initCommands(): void
    {
        $this->calls = [
            [
                'type' => 'artisan',
                'description' => 'Widgets setup',
                'command' => 'inetstudio:widgets-package:widgets:setup',
            ],
        ];
    }
}
