<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications\Tests\Laravel;

use Maartenpaauw\Specifications\Laravel\AccessResponseTransformer;
use Maartenpaauw\Specifications\Tests\TestCase;
use Maartenpaauw\Specifications\VerboseSpecification;
use Workbench\App\NegativeSpecification;
use Workbench\App\PositiveSpecification;

/**
 * @internal
 *
 * @small
 */
final class AccessResponseTransformerTest extends TestCase
{
    public function test_transform(): void
    {
        // Arrange
        $accessResponseTransformer = new AccessResponseTransformer();

        // Act
        $allowed = $accessResponseTransformer->transform(new PositiveSpecification(), null);
        $denied = $accessResponseTransformer->transform(new NegativeSpecification(), null);
        $verbose = $accessResponseTransformer->transform(
            new VerboseSpecification(new NegativeSpecification(), 'This is a message.', 10),
            null,
        );

        // Assert
        $this->assertTrue($allowed->allowed());
        $this->assertNull($allowed->message());
        $this->assertNull($allowed->code());

        $this->assertTrue($denied->denied());
        $this->assertNull($denied->message());
        $this->assertNull($denied->code());

        $this->assertTrue($verbose->denied());
        $this->assertIsString($verbose->message());
        $this->assertNotEmpty($verbose->message());
        $this->assertSame('This is a message.', $verbose->message());
        $this->assertIsInt($verbose->code());
        $this->assertSame(10, $verbose->code());
    }
}
