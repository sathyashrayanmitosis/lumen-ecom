<?php

/**
 * Returns the price formatted
 *
 * @param float $price
 *
 * @return string
 */
function format_price($price)
{
    return sprintf(
        config('mitosis.framework.currency.format'),
        $price,
        config('mitosis.framework.currency.sign')
    );
}
