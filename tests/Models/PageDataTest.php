<?php

namespace Astrotomic\Stancy\Tests\Models;

use Astrotomic\Stancy\Tests\PageDatas\HomePageData;
use Astrotomic\Stancy\Tests\TestCase;
use Illuminate\Support\HtmlString;
use Spatie\DataTransferObject\DataTransferObjectError;

final class PageDataTest extends TestCase
{
    /** @test */
    public function it_throws_exception_if_data_is_missing(): void
    {
        static::expectException(DataTransferObjectError::class);

        HomePageData::make([]);
    }

    /** @test */
    public function it_throws_exception_if_data_type_does_not_match(): void
    {
        static::expectException(DataTransferObjectError::class);

        HomePageData::make([
            'contents' => 'hello world',
            'slug' => 'home',
        ]);
    }

    /** @test */
    public function it_returns_instance_if_data_is_valid(): void
    {
        $page = HomePageData::make([
            'contents' => new HtmlString('hello world'),
            'slug' => 'home',
        ]);

        static::assertInstanceOf(HomePageData::class, $page);
    }
}
