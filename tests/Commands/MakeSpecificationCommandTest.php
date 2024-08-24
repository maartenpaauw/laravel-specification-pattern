<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications\Tests\Commands;

use Illuminate\Testing\PendingCommand;
use Maartenpaauw\Specifications\Commands\MakeSpecificationCommand;
use Maartenpaauw\Specifications\Tests\TestCase;
use Spatie\Snapshots\MatchesSnapshots;

/**
 * @internal
 *
 * @small
 */
final class MakeSpecificationCommandTest extends TestCase
{
    use MatchesSnapshots;

    public function test_it_should_be_possible_to_create_a_basic_specification_class(): void
    {
        // Arrange
        $command = $this->artisan(MakeSpecificationCommand::class, [
            'name' => 'MyBasicSpecification',
        ]);

        // Assert
        $this->assertInstanceOf(PendingCommand::class, $command);
        $command->assertSuccessful();

        // Act
        $command->execute();

        // Assert
        $this->assertSpecificationMatchesSnapshot('MyBasicSpecification');
    }

    public function test_it_should_be_possible_to_create_a_composite_specification_class(): void
    {
        // Arrange
        $command = $this->artisan(MakeSpecificationCommand::class, [
            'name' => 'MyCompositeSpecification',
            '--composite' => true,
        ]);

        // Assert
        $this->assertInstanceOf(PendingCommand::class, $command);
        $command->assertSuccessful();

        // Act
        $command->execute();

        // Assert
        $this->assertSpecificationMatchesSnapshot('MyCompositeSpecification');
    }

    public function test_it_should_be_possible_to_create_a_basic_specification_with_a_candidate_type(): void
    {
        // Arrange
        $command = $this->artisan(MakeSpecificationCommand::class, [
            'name' => 'MyStrictBasicSpecification',
            '--candidate' => 'string',
        ]);

        // Assert
        $this->assertInstanceOf(PendingCommand::class, $command);
        $command->assertSuccessful();

        // Act
        $command->execute();

        // Assert
        $this->assertSpecificationMatchesSnapshot('MyStrictBasicSpecification');
    }

    public function test_it_should_be_possible_to_create_a_composite_specification_with_a_candidate_type(): void
    {
        // Arrange
        $command = $this->artisan(MakeSpecificationCommand::class, [
            'name' => 'MyStrictCompositeSpecification',
            '--composite' => true,
            '--candidate' => 'string',
        ]);

        // Assert
        $this->assertInstanceOf(PendingCommand::class, $command);
        $command->assertSuccessful();

        // Act
        $command->execute();

        // Assert
        $this->assertSpecificationMatchesSnapshot('MyStrictCompositeSpecification');
    }

    protected function assertSpecificationMatchesSnapshot(string $name): void
    {
        $this->assertMatchesFileSnapshot(app_path("Specifications/{$name}.php"));
    }
}
