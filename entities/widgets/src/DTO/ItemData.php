<?php

namespace InetStudio\WidgetsPackage\Widgets\DTO;

use Spatie\DataTransferObject\DataTransferObject;
use InetStudio\WidgetsPackage\Widgets\Contracts\DTO\ItemDataContract;

/**
 * Class ItemData.
 */
class ItemData extends DataTransferObject implements ItemDataContract
{
    /**
     * @var int
     */
    public int $id;

    /**
     * @var string
     */
    public string $view;

    /**
     * @var array
     */
    public array $params;

    /**
     * @var array
     */
    public array $additional_info;
}
