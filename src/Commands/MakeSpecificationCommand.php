<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications\Commands;

use Illuminate\Console\GeneratorCommand;
use Override;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputOption;

#[AsCommand(
    'make:specification',
    'Create a new specification class',
)]
final class MakeSpecificationCommand extends GeneratorCommand
{
    protected $type = 'Specification';

    #[Override]
    protected function getStub(): string
    {
        if ($this->option('composite')) {
            return $this->resolveStubPath(
                '/stubs/specification-composite.stub',
            );
        }

        return $this->resolveStubPath(
            '/stubs/specification.stub',
        );
    }

    /**
     * @inheritDoc
     */
    #[Override]
    protected function getDefaultNamespace(mixed $rootNamespace): string
    {
        return \sprintf('%s\Specifications', $rootNamespace);
    }

    /**
     * @inheritDoc
     */
    #[Override]
    protected function buildClass(mixed $name): string
    {
        /** @var array<string, string> $replacements */
        $replacements = [
            '{{ candidate }}' => $this->option('candidate'),
        ];

        return str_replace(
            array_keys($replacements),
            array_values($replacements),
            parent::buildClass($name),
        );
    }

    /**
     * @return array<int, InputOption>
     */
    #[Override]
    protected function getOptions(): array
    {
        return [
            new InputOption(
                'composite',
                null,
                InputOption::VALUE_NONE,
                'Indicates the specification should be composite',
            ),
            new InputOption(
                'candidate',
                'c',
                InputOption::VALUE_OPTIONAL,
                'Specify the candidate type to use',
                'mixed',
            ),
        ];
    }

    protected function resolveStubPath(string $stub): string
    {
        $custom = $this->laravel->basePath(trim($stub, '/'));
        $default = __DIR__.$stub;

        return file_exists($custom) ? $custom : $default;
    }
}
