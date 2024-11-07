<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class PhpDocGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'phpdoc:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Генерация phpdoc в моделях';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Artisan::call('ide-helper:models --write --smart-reset');
        return 0;
    }
}
