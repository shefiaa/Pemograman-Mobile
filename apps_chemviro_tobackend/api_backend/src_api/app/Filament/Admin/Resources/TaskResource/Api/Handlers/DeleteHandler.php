<?php

namespace App\Filament\Admin\Resources\TaskResource\Api\Handlers;

use App\Filament\Admin\Resources\TaskResource;
use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;

class DeleteHandler extends Handlers
{
    public static ?string $uri = '/{id}';

    public static ?string $resource = TaskResource::class;

    public static function getMethod()
    {
        return Handlers::DELETE;
    }

    public static function getModel()
    {
        return static::$resource::getModel();
    }

    public function handler(Request $request)
    {
        $id = $request->route('id');

        $model = static::getModel()::find($id);

        if (!$model) {
            return static::sendNotFoundResponse();
        }

        $model->delete();

        return static::sendSuccessResponse($model, 'Successfully Delete Task');
    }
}
