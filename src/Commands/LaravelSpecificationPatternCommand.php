<?php

namespace Maartenpaauw\LaravelSpecificationPattern\Commands;

use Illuminate\Console\Command;

class LaravelSpecificationPatternCommand extends Command
{
    public $signature = 'laravel-specification-pattern';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
