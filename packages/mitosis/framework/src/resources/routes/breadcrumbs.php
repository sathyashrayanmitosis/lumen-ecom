<?php

Breadcrumbs::register('mitosis.product.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(__('Products'), route('mitosis.product.index'));
});

Breadcrumbs::register('mitosis.product.create', function ($breadcrumbs) {
    $breadcrumbs->parent('mitosis.product.index');
    $breadcrumbs->push(__('Create'));
});

Breadcrumbs::register('mitosis.product.show', function ($breadcrumbs, $product) {
    $breadcrumbs->parent('mitosis.product.index');
    $breadcrumbs->push($product->name, route('mitosis.product.show', $product));
});

Breadcrumbs::register('mitosis.product.edit', function ($breadcrumbs, $product) {
    $breadcrumbs->parent('mitosis.product.show', $product);
    $breadcrumbs->push(__('Edit'), route('mitosis.product.edit', $product));
});

Breadcrumbs::register('mitosis.taxonomy.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(__('Categorization'), route('mitosis.taxonomy.index'));
});

Breadcrumbs::register('mitosis.taxonomy.create', function ($breadcrumbs) {
    $breadcrumbs->parent('mitosis.taxonomy.index');
    $breadcrumbs->push(__('Create'));
});

Breadcrumbs::register('mitosis.taxonomy.show', function ($breadcrumbs, $taxonomy) {
    $breadcrumbs->parent('mitosis.taxonomy.index');
    $breadcrumbs->push($taxonomy->name, route('mitosis.taxonomy.show', $taxonomy));
});

Breadcrumbs::register('mitosis.taxonomy.edit', function ($breadcrumbs, $taxonomy) {
    $breadcrumbs->parent('mitosis.taxonomy.show', $taxonomy);
    $breadcrumbs->push(__('Edit'), route('mitosis.taxonomy.edit', $taxonomy));
});

Breadcrumbs::register('mitosis.taxon.create', function ($breadcrumbs, $taxonomy) {
    $breadcrumbs->parent('mitosis.taxonomy.show', $taxonomy);
    $breadcrumbs->push(__('Create'));
});

Breadcrumbs::register('mitosis.taxon.edit', function ($breadcrumbs, $taxonomy, $taxon) {
    $breadcrumbs->parent('mitosis.taxonomy.show', $taxonomy);
    $breadcrumbs->push($taxon->name);
});

Breadcrumbs::register('mitosis.order.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(__('Orders'), route('mitosis.order.index'));
});

Breadcrumbs::register('mitosis.order.show', function ($breadcrumbs, $order) {
    $breadcrumbs->parent('mitosis.order.index');
    $breadcrumbs->push($order->getNumber(), route('mitosis.order.show', $order));
});

Breadcrumbs::register('mitosis.property.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(__('Properties'), route('mitosis.property.index'));
});

Breadcrumbs::register('mitosis.property.create', function ($breadcrumbs) {
    $breadcrumbs->parent('mitosis.property.index');
    $breadcrumbs->push(__('Create'));
});

Breadcrumbs::register('mitosis.property.show', function ($breadcrumbs, $property) {
    $breadcrumbs->parent('mitosis.property.index');
    $breadcrumbs->push($property->name, route('mitosis.property.show', $property));
});

Breadcrumbs::register('mitosis.property.edit', function ($breadcrumbs, $property) {
    $breadcrumbs->parent('mitosis.property.show', $property);
    $breadcrumbs->push(__('Edit'), route('mitosis.property.edit', $property));
});

Breadcrumbs::register('mitosis.property_value.create', function ($breadcrumbs, $property) {
    $breadcrumbs->parent('mitosis.property.show', $property);
    $breadcrumbs->push(__('Create Value'));
});

Breadcrumbs::register('mitosis.property_value.edit', function ($breadcrumbs, $property, $propertyValue) {
    $breadcrumbs->parent('mitosis.property.show', $property);
    $breadcrumbs->push($propertyValue->title);
});

Breadcrumbs::register('mitosis.channel.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(__('Channels'), route('mitosis.channel.index'));
});

Breadcrumbs::register('mitosis.channel.create', function ($breadcrumbs) {
    $breadcrumbs->parent('mitosis.channel.index');
    $breadcrumbs->push(__('Create'));
});

Breadcrumbs::register('mitosis.channel.show', function ($breadcrumbs, $channel) {
    $breadcrumbs->parent('mitosis.channel.index');
    $breadcrumbs->push($channel->name, route('mitosis.channel.show', $channel));
});

Breadcrumbs::register('mitosis.channel.edit', function ($breadcrumbs, $channel) {
    $breadcrumbs->parent('mitosis.channel.show', $channel);
    $breadcrumbs->push(__('Edit'), route('mitosis.channel.edit', $channel));
});
