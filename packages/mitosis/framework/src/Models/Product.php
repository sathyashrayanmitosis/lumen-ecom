<?php


namespace Mitosis\Framework\Models;

use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Mitosis\Category\Traits\HasTaxons;
use Mitosis\Contracts\Buyable;
use Mitosis\Properties\Traits\HasPropertyValues;
use Mitosis\Support\Traits\BuyableImageSpatieV7;
use Mitosis\Support\Traits\BuyableModel;
use Mitosis\Product\Models\Product as BaseProduct;

class Product extends BaseProduct implements Buyable, HasMedia
{
    use BuyableModel, BuyableImageSpatieV7, HasMediaTrait, HasTaxons, HasPropertyValues;
    protected const DEFAULT_THUMBNAIL_WIDTH  = 250;
    protected const DEFAULT_THUMBNAIL_HEIGHT = 250;
    protected const DEFAULT_THUMBNAIL_FIT    = Manipulations::FIT_CROP;

    protected $dates = ['created_at', 'updated_at', 'last_sale_at'];

    public function registerMediaConversions(Media $media = null)
    {
        foreach (config('mitosis.framework.image.variants', []) as $name => $settings) {
            $conversion = $this->addMediaConversion($name)
                 ->fit(
                     $settings['fit'] ?? static::DEFAULT_THUMBNAIL_FIT,
                     $settings['width'] ?? static::DEFAULT_THUMBNAIL_WIDTH,
                     $settings['height'] ?? static::DEFAULT_THUMBNAIL_HEIGHT
                 );
            if (!($settings['queued'] ?? false)) {
                $conversion->nonQueued();
            }
        }
    }
}
