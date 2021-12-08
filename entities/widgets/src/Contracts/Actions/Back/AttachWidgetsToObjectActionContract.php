<?php

namespace InetStudio\WidgetsPackage\Widgets\Contracts\Actions\Back;

use Illuminate\Database\Eloquent\Model;
use InetStudio\WidgetsPackage\Widgets\Contracts\DTO\Actions\Back\AttachWidgetsToObjectDataContract;

interface AttachWidgetsToObjectActionContract
{
    public function execute(AttachWidgetsToObjectDataContract $data): Model;
}
