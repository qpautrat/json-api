<?php

namespace Evaneos;

use Neomerx\JsonApi\Schema\SchemaProvider;

class PageSchema extends SchemaProvider
{
    protected $resourceType = 'page';

    public function getId($page)
    {
        return $page->number;
    }

    public function getAttributes($page)
    {
        return [
            'number' => $page->number
        ];
    }
}