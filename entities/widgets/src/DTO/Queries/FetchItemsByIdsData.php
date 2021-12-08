<?php

namespace InetStudio\WidgetsPackage\Widgets\DTO\Queries;

use Spatie\DataTransferObject\DataTransferObject;
use InetStudio\WidgetsPackage\Widgets\Contracts\DTO\Queries\FetchItemsByIdsDataContract;

class FetchItemsByIdsData extends DataTransferObject implements FetchItemsByIdsDataContract
{
    public array $ids;
}
