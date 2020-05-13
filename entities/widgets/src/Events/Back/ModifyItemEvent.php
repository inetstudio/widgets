<?php

namespace InetStudio\WidgetsPackage\Widgets\Events\Back;

use Illuminate\Queue\SerializesModels;
use InetStudio\WidgetsPackage\Widgets\Contracts\Models\WidgetModelContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Events\Back\ModifyItemEventContract;

class ModifyItemEvent implements ModifyItemEventContract
{
    use SerializesModels;

    public WidgetModelContract $item;

    public function __construct(WidgetModelContract $item)
    {
        $this->item = $item;
    }
}
