<?php


namespace Mitosis\Framework\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Konekt\Address\Contracts\Address as AddressContract;
use Konekt\AppShell\Breadcrumbs\HasBreadcrumbs;
use Konekt\Concord\BaseBoxServiceProvider;
use Konekt\Customer\Contracts\Customer as CustomerContract;
use Mitosis\Category\Contracts\Taxon as TaxonContract;
use Mitosis\Framework\Http\Requests\CreateChannel;
use Mitosis\Framework\Http\Requests\CreateMedia;
use Mitosis\Framework\Http\Requests\CreateProperty;
use Mitosis\Framework\Http\Requests\CreatePropertyValue;
use Mitosis\Framework\Http\Requests\CreatePropertyValueForm;
use Mitosis\Framework\Http\Requests\CreateTaxon;
use Mitosis\Framework\Http\Requests\CreateTaxonForm;
use Mitosis\Framework\Http\Requests\SyncModelPropertyValues;
use Mitosis\Framework\Http\Requests\SyncModelTaxons;
use Mitosis\Framework\Http\Requests\UpdateChannel;
use Mitosis\Framework\Http\Requests\UpdateProperty;
use Mitosis\Framework\Http\Requests\UpdatePropertyValue;
use Mitosis\Framework\Http\Requests\UpdateTaxon;
use Mitosis\Framework\Models\Address;
use Mitosis\Checkout\Contracts\CheckoutDataFactory as CheckoutDataFactoryContract;
use Mitosis\Framework\Factories\CheckoutDataFactory;
use Mitosis\Framework\Factories\OrderFactory;
use Mitosis\Framework\Http\Requests\CreateProduct;
use Mitosis\Framework\Http\Requests\CreateTaxonomy;
use Mitosis\Framework\Http\Requests\UpdateOrder;
use Mitosis\Framework\Http\Requests\UpdateProduct;
use Mitosis\Framework\Http\Requests\UpdateTaxonomy;
use Menu;
use Mitosis\Framework\Models\Customer;
use Mitosis\Framework\Models\Product;
use Mitosis\Framework\Models\Taxon;
use Mitosis\Order\Contracts\OrderFactory as OrderFactoryContract;
use Mitosis\Product\Contracts\Product as ProductContract;
use Mitosis\Product\Models\ProductProxy;

class ModuleServiceProvider extends BaseBoxServiceProvider
{
    use HasBreadcrumbs;

    protected $requests = [
        CreateProduct::class,
        UpdateProduct::class,
        UpdateOrder::class,
        CreateTaxonomy::class,
        UpdateTaxonomy::class,
        CreateTaxon::class,
        UpdateTaxon::class,
        CreateTaxonForm::class,
        SyncModelTaxons::class,
        CreateMedia::class,
        CreateProperty::class,
        UpdateProperty::class,
        CreatePropertyValueForm::class,
        CreatePropertyValue::class,
        UpdatePropertyValue::class,
        SyncModelPropertyValues::class,
        CreateChannel::class,
        UpdateChannel::class
    ];

    public function register()
    {
        parent::register();

        $this->app->bind(CheckoutDataFactoryContract::class, CheckoutDataFactory::class);
    }

    public function boot()
    {
        parent::boot();

        // Use the frameworks's extended model classes
        $this->concord->registerModel(ProductContract::class, Product::class);
        $this->concord->registerModel(AddressContract::class, Address::class);
        $this->concord->registerModel(CustomerContract::class, Customer::class);
        $this->concord->registerModel(TaxonContract::class, Taxon::class);

        // This is ugly, but it does the job for v0.1
        Relation::morphMap([
            app(ProductContract::class)->morphTypeName() => ProductProxy::modelClass()
        ]);

        // Use the framework's extended order factory
        $this->app->bind(OrderFactoryContract::class, OrderFactory::class);

        $this->loadBreadcrumbs();
        $this->addMenuItems();
    }

    protected function addMenuItems()
    {
        if ($menu = Menu::get('appshell')) {
            $shop = $menu->addItem('shop', __('Shop'));
            $shop->addSubItem('products', __('Products'), ['route' => 'mitosis.product.index'])->data('icon', 'layers');
            $shop->addSubItem('product_properties', __('Product Properties'), ['route' => 'mitosis.property.index'])->data('icon', 'format-list-bulleted');
            $shop->addSubItem('categories', __('Categorization'), ['route' => 'mitosis.taxonomy.index'])->data('icon', 'folder');
            $shop->addSubItem('orders', __('Orders'), ['route' => 'mitosis.order.index'])->data('icon', 'mall');

            $settings = $menu->getItem('settings_group');
            $settings->addSubItem('channels', __('Channels'), ['route' => 'mitosis.channel.index'])->data('icon', 'portable-wifi');
        }
    }
}
