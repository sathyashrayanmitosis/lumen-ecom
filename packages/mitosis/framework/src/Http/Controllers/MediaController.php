<?php


namespace Mitosis\Framework\Http\Controllers;

use Illuminate\Support\Str;
use Konekt\AppShell\Http\Controllers\BaseController;
use Spatie\MediaLibrary\Models\Media;
use Mitosis\Framework\Contracts\Requests\CreateMedia;

class MediaController extends BaseController
{
    public function destroy(Media $medium)
    {
        try {
            $name  = $medium->name;
            $model = $medium->model;
            $medium->delete();

            flash()->warning(__('Media :name has been deleted', ['name' => $name]));
        } catch (\Exception $e) {
            flash()->error(__('Error: :msg', ['msg' => $e->getMessage()]));

            return redirect()->back();
        }

        // E.g. 'product'
        $modelName = Str::singular(shorten(get_class($model)));

        return redirect(route(
            sprintf('mitosis.%s.edit', $modelName),
            [$modelName => $model]
            )
        );
    }

    public function store(CreateMedia $request)
    {
        $model = $request->getFor();

        $model->addMultipleMediaFromRequest(['images'])->each(function ($fileAdder) {
            $fileAdder->toMediaCollection();
        });

        return back()->with('success', __('Images have been added successfully'));
    }
}
