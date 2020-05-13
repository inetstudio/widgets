<?php

namespace InetStudio\WidgetsPackage\Widgets\Http\Responses\Back\Resource;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use InetStudio\WidgetsPackage\Widgets\Contracts\Services\Back\ItemsServiceContract;
use InetStudio\WidgetsPackage\Widgets\Contracts\Http\Responses\Back\Resource\StoreResponseContract;

/**
 * Class StoreResponse.
 */
class StoreResponse implements StoreResponseContract
{
    /**
     * @var ItemsServiceContract
     */
    protected ItemsServiceContract $resourceService;

    /**
     * StoreResponse constructor.
     *
     * @param  ItemsServiceContract  $resourceService
     */
    public function __construct(ItemsServiceContract $resourceService)
    {
        $this->resourceService = $resourceService;
    }

    /**
     * Возвращаем ответ при сохранении объекта.
     *
     * @param  Request  $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response|null
     *
     * @throws ValidationException
     */
    public function toResponse($request)
    {
        $data = $request->get('itemData');

        $item = $this->resourceService->save($data);

        if (! $item) {
            throw ValidationException::withMessages([
                'id' => 'При сохранении произошла ошибка',
            ]);
        }

        return response()->json($item->toArray());
    }
}
