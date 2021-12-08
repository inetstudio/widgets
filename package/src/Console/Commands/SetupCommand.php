<?php

namespace InetStudio\WidgetsPackage\Console\Commands;

use InetStudio\AdminPanel\Base\Console\Commands\BaseSetupCommand;

class SetupCommand extends BaseSetupCommand
{
    protected $name = 'inetstudio:widgets-package:setup';

    protected $description = 'Setup widgets package';

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
