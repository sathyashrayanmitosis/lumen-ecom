<?php


namespace Mitosis\Framework\Http\Controllers;

use Illuminate\Support\Str;
use Konekt\AppShell\Http\Controllers\BaseController;
use Mitosis\Category\Contracts\Taxon;
use Mitosis\Category\Contracts\Taxonomy;
use Mitosis\Category\Models\TaxonProxy;
use Mitosis\Framework\Contracts\Requests\CreateTaxonForm;
use Mitosis\Framework\Contracts\Requests\CreateTaxon;
use Mitosis\Framework\Contracts\Requests\UpdateTaxon;

class TaxonController extends BaseController
{
    public function create(CreateTaxonForm $request, Taxonomy $taxonomy)
    {
        $taxon = app(Taxon::class);

        $taxon->taxonomy_id = $taxonomy->id;

        if ($defaultParent = $request->getDefaultParent()) {
            $taxon->parent_id = $defaultParent->id;
        }

        $taxon->priority = $request->getNextPriority($taxon);

        return view('mitosis::taxon.create', [
            'taxons'   => TaxonProxy::byTaxonomy($taxonomy)->get()->pluck('name', 'id'),
            'taxonomy' => $taxonomy,
            'taxon'    => $taxon
        ]);
    }

    public function store(Taxonomy $taxonomy, CreateTaxon $request)
    {
        try {
            $taxon = TaxonProxy::create(array_merge($request->all(),
                ['taxonomy_id' => $taxonomy->id]));
            flash()->success(__(':name :taxonomy has been created', [
                'name'     => $taxon->name,
                'taxonomy' => Str::singular($taxonomy->name)
            ]));
        } catch (\Exception $e) {
            flash()->error(__('Error: :msg', ['msg' => $e->getMessage()]));

            return redirect()->back()->withInput();
        }

        return redirect(route('mitosis.taxonomy.show', $taxonomy));
    }

    public function edit(Taxonomy $taxonomy, Taxon $taxon)
    {
        return view('mitosis::taxon.edit', [
            'taxons'   => TaxonProxy::byTaxonomy($taxonomy)->except($taxon)->get()->pluck('name', 'id'),
            'taxonomy' => $taxonomy,
            'taxon'    => $taxon
        ]);
    }

    public function update(Taxonomy $taxonomy, Taxon $taxon, UpdateTaxon $request)
    {
        try {
            $taxon->update($request->all());

            flash()->success(__(':name has been updated', ['name' => $taxon->name]));
        } catch (\Exception $e) {
            flash()->error(__('Error: :msg', ['msg' => $e->getMessage()]));

            return redirect()->back()->withInput();
        }

        return redirect(route('mitosis.taxonomy.show', $taxonomy));
    }

    public function destroy(Taxonomy $taxonomy, Taxon $taxon)
    {
        try {
            $name = $taxon->name;
            $taxon->delete();

            flash()->warning(__(':name has been deleted', ['name' => $name]));
        } catch (\Exception $e) {
            flash()->error(__('Error: :msg', ['msg' => $e->getMessage()]));

            return redirect()->back();
        }

        return redirect(route('mitosis.taxonomy.show', $taxonomy));
    }
}
