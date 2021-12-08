<?php

namespace InetStudio\WidgetsPackage\Widgets\Contracts\Http\Resources\Back\Data;

use ArrayAccess;
use JsonSerializable;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\Routing\UrlRoutable;

interface IndexResourceContract extends ArrayAccess, JsonSerializable, Responsable, UrlRoutable
{
}
