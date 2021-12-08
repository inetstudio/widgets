<?php

namespace InetStudio\WidgetsPackage\Widgets\Http\Responses\Back\Resource;

use Yajra\DataTables\Html\Builder;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\Resource\IndexResponseContract;

class IndexResponse implements IndexResponseContract
{
    public function __construct(
        protected Builder $result
    ){}

    public function setResult(Builder $result): void
    {
        $this->result = $result;
    }

    public function toResponse($request)
    {
        $table = $this->result;

        return view('inetstudio.widgets-package.widgets::back.pages.index', compact('table'));
    }
}
