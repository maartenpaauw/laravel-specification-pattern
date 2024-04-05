<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications\Tests;

use Illuminate\Support\Collection;
use Workbench\App\UppercaseSpecification;

/**
 * @internal
 *
 * @small
 */
final class CollectionTest extends TestCase
{
    public function test_it_should_filter_the_collection_based_on_the_given_specification(): void
    {
        // Arrange
        $collection = new Collection([
            'hello world!',
            'Hello World!',
            'HELLO WORLD!',
        ]);

        // Act
        $result = $collection->matching(new UppercaseSpecification());

        // Assert
        $this->assertCount(1, $result);
    }
}
