<?php

namespace InetStudio\WidgetsPackage\Widgets\Console\Commands;

use Illuminate\Console\Command;

class CreateFoldersCommand extends Command
{
    protected $name = 'inetstudio:widgets-package:widgets:folders';

    protected $description = 'Create package folders';

    public function handle(): void
    {
        $folders = [
            'widgets',
        ];

        foreach ($folders as $folder) {
            if (config('filesystems.disks.'.$folder)) {
                $path = config('filesystems.disks.'.$folder.'.root');
                $this->createDir($path);
            }
        }
    }

    private function createDir(string $path): void
    {
        if (is_dir($path)) {
            $this->info($path.' Already created.');

            return;
        }

        mkdir($path, 0777, true);
        $this->info($path.' Has been created.');
    }
}
