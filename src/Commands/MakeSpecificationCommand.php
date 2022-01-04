<?php

declare(strict_types=1);

namespace Maartenpaauw\Specifications\Commands;

use Illuminate\Console\Command;

class MakeSpecificationCommand extends Command
{
    public $signature = 'make:specification';

    public $description = 'Creates a specification';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
