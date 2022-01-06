<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications\Tests\Commands;

use Illuminate\Testing\PendingCommand;
use Maartenpaauw\Specifications\Commands\MakeSpecificationCommand;
use Maartenpaauw\Specifications\Tests\TestCase;
use Spatie\Snapshots\MatchesSnapshots;
use Symfony\Component\Console\Command\Command;

class MakeSpecificationCommandTest extends TestCase
{
    use MatchesSnapshots;

    /** @test */
    public function it_should_be_possible_to_create_a_basic_specification_class(): void
    {
        // Act
        /** @var PendingCommand $command */
        $command = $this->artisan(MakeSpecificationCommand::class, [
            'name' => 'MyBasicSpecification',
        ]);

        // Assert
        $command->assertExitCode(Command::SUCCESS);
        $this->assertSpecificationMatchesSnapshot('MyBasicSpecification');
    }

    /** @test */
    public function it_should_be_possible_to_create_a_composite_specification_class(): void
    {
        // Act
        /** @var PendingCommand $command */
        $command = $this->artisan(MakeSpecificationCommand::class, [
            'name' => 'MyCompositeSpecification',
            '--composite' => true,
        ]);

        // Assert
        $command->assertExitCode(Command::SUCCESS);
        $this->assertSpecificationMatchesSnapshot('MyCompositeSpecification');
    }

    /** @test */
    public function it_should_be_possible_to_create_a_basic_specification_with_a_candidate_type(): void
    {
        // Act
        /** @var PendingCommand $command */
        $command = $this->artisan(MakeSpecificationCommand::class, [
            'name' => 'MyStrictBasicSpecification',
            '--candidate' => 'string',
        ]);

        // Assert
        $command->assertExitCode(Command::SUCCESS);
        $this->assertSpecificationMatchesSnapshot('MyStrictBasicSpecification');
    }

    /** @test */
    public function it_should_be_possible_to_create_a_composite_specification_with_a_candidate_type(): void
    {
        // Act
        /** @var PendingCommand $command */
        $command = $this->artisan(MakeSpecificationCommand::class, [
            'name' => 'MyStrictCompositeSpecification',
            '--composite' => true,
            '--candidate' => 'string',
        ]);

        // Assert
        $command->assertExitCode(Command::SUCCESS);
        $this->assertSpecificationMatchesSnapshot('MyStrictCompositeSpecification');
    }

    protected function assertSpecificationMatchesSnapshot(string $name): void
    {
        $this->assertMatchesFileSnapshot(app_path(sprintf('Specifications/%s.php', $name)));
    }
}
