<?php


namespace Mitosis\Framework\Http\Controllers;

use Konekt\AppShell\Http\Controllers\BaseController;
use Mitosis\Framework\Contracts\Requests\CreateProperty;
use Mitosis\Framework\Contracts\Requests\UpdateProperty;
use Mitosis\Properties\Contracts\Property;
use Mitosis\Properties\Models\PropertyProxy;
use Mitosis\Properties\PropertyTypes;

class PropertyController extends BaseController
{
    public function index()
    {
        return view('mitosis::property.index', [
            'properties' => PropertyProxy::paginate(100)
        ]);
    }

    public function create()
    {
        return view('mitosis::property.create', [
            'property' => app(Property::class),
            'types'    => PropertyTypes::choices()
        ]);
    }

    public function store(CreateProperty $request)
    {
        try {
            $property = PropertyProxy::create($request->all());
            flash()->success(__(':name has been created', ['name' => $property->name]));
        } catch (\Exception $e) {
            flash()->error(__('Error: :msg', ['msg' => $e->getMessage()]));

            return redirect()->back()->withInput();
        }

        return redirect(route('mitosis.property.index'));
    }

    public function show(Property $property)
    {
        return view('mitosis::property.show', ['property' => $property]);
    }

    public function edit(Property $property)
    {
        return view('mitosis::property.edit', [
            'property' => $property,
            'types'    => PropertyTypes::choices()
        ]);
    }

    public function update(Property $property, UpdateProperty $request)
    {
        try {
            $property->update($request->all());

            flash()->success(__(':name has been updated', ['name' => $property->name]));
        } catch (\Exception $e) {
            flash()->error(__('Error: :msg', ['msg' => $e->getMessage()]));

            return redirect()->back()->withInput();
        }

        return redirect(route('mitosis.property.index'));
    }

    public function destroy(Property $property)
    {
        try {
            $name = $property->name;
            $property->delete();

            flash()->warning(__(':name has been deleted', ['name' => $name]));
        } catch (\Exception $e) {
            flash()->error(__('Error: :msg', ['msg' => $e->getMessage()]));

            return redirect()->back();
        }

        return redirect(route('mitosis.property.index'));
    }
}
