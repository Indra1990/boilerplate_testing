<?php

Breadcrumbs::register('admin.dashboard', function ($breadcrumbs) {
    $breadcrumbs->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});

Breadcrumbs::register('admin.item', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('item'), route('admin.item'));
});

Breadcrumbs::register('admin.item.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.item');
    $breadcrumbs->push(__('edit'), route('admin.item.edit',$id));

});

//index quote admin
Breadcrumbs::register('admin.quotes', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('Quote'), route('admin.quotes'));
});

//create quote admin
Breadcrumbs::register('admin.quotes.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.quotes');
    $breadcrumbs->push(__('Create'), route('admin.quotes.create'));
});

//show quote admin
Breadcrumbs::register('admin.quotes.show', function ($breadcrumbs,$title) {
    $breadcrumbs->parent('admin.quotes');
    $breadcrumbs->push(__('Show'), route('admin.quotes.show',$title));
});

//edit quote admin
Breadcrumbs::register('admin.quotes.edit', function ($breadcrumbs,$title) {
    $breadcrumbs->parent('admin.quotes');
    $breadcrumbs->push(__('Edit '), route('admin.quotes.edit',$title));
});

require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';
