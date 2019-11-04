<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidEsales\GraphQL\Sample\Tests\Integration\Controller;

use OxidEsales\GraphQL\Base\Tests\Integration\TestCase;

class CategoryTest extends TestCase
{
    public function testGetSingleCategoryWithoutParam()
    {
        $this->execQuery('query { category }');
        $this->assertEquals(
            400,
            static::$queryResult['status']
        );
    }

    public function testGetSingleCategoryWithNonExistantCategoryId()
    {
        $this->execQuery('query { category (id: "does-not-exist"){id, name}}');
        $this->assertEquals(
            400,
            static::$queryResult['status']
        );
    }

    public function testGetCategorieListWithoutParams()
    {
        $this->execQuery('query { categories {id, name}}');
        $this->assertEquals(
            200,
            static::$queryResult['status']
        );
    }
}
