<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class MakeSpecificationCommand extends GeneratorCommand
{
    public $name = 'make:specification';

    public $description = 'Create a new specification class';

    protected $type = 'Specification';

    protected function getStub(): string
    {
        if ($this->option('composite')) {
            return __DIR__ . '/../../stubs/specification-composite.stub';
        }

        return __DIR__ . '/../../stubs/specification.stub';
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return sprintf('%s\Specifications', $rootNamespace);
    }

    protected function buildClass($name): string
    {
        $replacements = [
            '{{ candidate }}' => $this->option('candidate'),
        ];

        return str_replace(
            array_keys($replacements),
            array_values($replacements),
            parent::buildClass($name),
        );
    }

    protected function getOptions(): array
    {
        $composite = new InputOption(
            'composite',
            null,
            InputOption::VALUE_NONE,
            'Indicates the specification should be composite',
        );

        $candidate = new InputOption(
            'candidate',
            'c',
            InputOption::VALUE_OPTIONAL,
            'Specify the candidate type to use',
            'mixed',
        );

        return [
            $composite,
            $candidate,
        ];
    }
}
