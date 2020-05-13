<?php

namespace InetStudio\WidgetsPackage\Widgets\DTO;

use Spatie\DataTransferObject\FlexibleDataTransferObject;
use InetStudio\WidgetsPackage\Widgets\Contracts\DTO\ItemDataContract;

/**
 * Class ItemData.
 */
class ItemData extends FlexibleDataTransferObject implements ItemDataContract
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
