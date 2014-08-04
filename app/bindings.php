<?php

/**
 * This file contains bindings for IoC container / View
 */

use Ciconia\Ciconia;
use Ciconia\Extension\Gfm;

App::singleton('Ciconia\Ciconia', function() {

    $markdown = new Ciconia();
    $markdown->addExtension(new Gfm\FencedCodeBlockExtension());
    $markdown->addExtension(new Gfm\TaskListExtension());
    $markdown->addExtension(new Gfm\InlineStyleExtension());
    $markdown->addExtension(new Gfm\WhiteSpaceExtension());
    $markdown->addExtension(new Gfm\TableExtension());
    $markdown->addExtension(new Gfm\UrlAutoLinkExtension());

    return $markdown;
});


View::share('categories', Config::get('site.postCategories'));
