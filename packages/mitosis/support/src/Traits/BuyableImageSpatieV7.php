<?php

namespace Mitosis\Support\Traits;

/**
 * Adds Buyable Image support using Spatie's Laravel Media Library V7
 */
trait BuyableImageSpatieV7
{
    /**
     * Returns whether the item has an image
     *
     * @return bool
     */
    public function hasImage()
    {
        return $this->getMedia()->isNotEmpty();
    }

    /**
     * Returns the URL of the item's thumbnail image, or null if there's no image
     *
     * @return string|null
     */
    public function getThumbnailUrl()
    {
        return $this->getFirstMediaUrl('default', 'thumbnail');
    }

    /**
     * Returns the URL of the item's (main) image, or null if there's no image
     *
     * @return string|null
     */
    public function getImageUrl()
    {
        return $this->getFirstMediaUrl();
    }
}
