<?php


namespace Mitosis\Framework\Http\Controllers;

use Konekt\AppShell\Http\Controllers\BaseController;
use Mitosis\Category\Contracts\Taxonomy;
use Mitosis\Category\Models\TaxonomyProxy;
use Mitosis\Framework\Contracts\Requests\CreateTaxonomy;
use Mitosis\Framework\Contracts\Requests\SyncModelTaxons;
use Mitosis\Framework\Contracts\Requests\UpdateTaxonomy;

class TaxonomyController extends BaseController
{
    public function index()
    {
        return view('mitosis::taxonomy.index', [
            'taxonomies' => TaxonomyProxy::all()
        ]);
    }

    public function create()
    {
        return view('mitosis::taxonomy.create', [
            'taxonomy' => app(Taxonomy::class)
        ]);
    }

    public function store(CreateTaxonomy $request)
    {
        try {
            $taxonomy = TaxonomyProxy::create($request->except('images'));
            flash()->success(__(':name has been created', ['name' => $taxonomy->name]));
        } catch (\Exception $e) {
            flash()->error(__('Error: :msg', ['msg' => $e->getMessage()]));

            return redirect()->back()->withInput();
        }

        return redirect(route('mitosis.taxonomy.index'));
    }

    public function show(Taxonomy $taxonomy)
    {
        return view('mitosis::taxonomy.show', ['taxonomy' => $taxonomy]);
    }

    public function edit(Taxonomy $taxonomy)
    {
        return view('mitosis::taxonomy.edit', ['taxonomy' => $taxonomy]);
    }

    public function update(Taxonomy $taxonomy, UpdateTaxonomy $request)
    {
        try {
            $taxonomy->update($request->all());

            flash()->success(__(':name has been updated', ['name' => $taxonomy->name]));
        } catch (\Exception $e) {
            flash()->error(__('Error: :msg', ['msg' => $e->getMessage()]));

            return redirect()->back()->withInput();
        }

        return redirect(route('mitosis.taxonomy.index'));
    }

    public function destroy(Taxonomy $taxonomy)
    {
        try {
            $name = $taxonomy->name;
            $taxonomy->delete();

            flash()->warning(__(':name has been deleted', ['name' => $name]));
        } catch (\Exception $e) {
            flash()->error(__('Error: :msg', ['msg' => $e->getMessage()]));

            return redirect()->back();
        }

        return redirect(route('mitosis.taxonomy.index'));
    }

    public function sync(Taxonomy $taxonomy, SyncModelTaxons $request)
    {
        $taxonIds = $request->getTaxonIds();
        $model    = $request->getFor();

        foreach (TaxonomyProxy::where('id', '<>', $taxonomy->id)->get() as $foreignTaxonomy) {
            $taxonIds = array_merge(
                $taxonIds,
                $model->taxons()->byTaxonomy($foreignTaxonomy)->get(['id'])->pluck('id')->toArray()
            );
        }

        $model->taxons()->byTaxonomy($taxonomy)->sync($taxonIds);

        return redirect(route(sprintf('mitosis.%s.show', shorten(get_class($model))), $model));
    }
}
