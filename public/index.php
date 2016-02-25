<?php

require '../vendor/autoload.php';

use Neomerx\JsonApi\Encoder\Encoder;
use Neomerx\JsonApi\Encoder\EncoderOptions;
use Neomerx\JsonApi\Schema\Link;
use Neomerx\JsonApi\Parameters\EncodingParameters;
use Evaneos\Author;
use Evaneos\AuthorSchema;
use Evaneos\Book;
use Evaneos\BookSchema;
use Evaneos\Page;
use Evaneos\PageSchema;


$encoder = Encoder::instance([
    Author::class => AuthorSchema::class,
    Book::class => BookSchema::class,
    Page::class => PageSchema::class,
], new EncoderOptions(JSON_PRETTY_PRINT, 'http://example.com/api/v1'));

$author = new Author(1, 'ipman', new Book(1, 'Youahhh hiii shwinngggg tsonzg dong !!!', [new Page(1), new Page(2)]));
$author2 = new Author(2, 'stallone', new Book(2, 'BAHHHHHHRGG'));

$encoder
    ->withRelationshipSelfLink($author, 'test')
    ->withRelationshipSelfLink($author2, 'test')
    ->withLinks(['hahaha' => new Link('http://example.com/custom/owned', null, true)])
;

// Imagine it comes from Query parameters
$options  = new EncodingParameters(
    [
        'book',
        'book.pages'
    ], // included
    [
        'book' => [
            'slug',
            'title'
        ]
    ]  // fields
);

echo $encoder->encodeData([$author, $author2], $options);