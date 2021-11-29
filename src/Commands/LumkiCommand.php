<?php

namespace Lumki\Lumki\Commands;

use Illuminate\Console\Command;

class LumkiCommand extends Command
{
    public $signature = 'lumki';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
