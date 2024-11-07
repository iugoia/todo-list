<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CreateEnum extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:enum {name : The name of the enum} {--values=* : Enum values}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new enum';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $enumName = $this->argument('name');

        $enumValuesString = is_array($this->option('values'))
            ? $this->option('values')[0]
            : $this->option('values');

        if (empty($enumValuesString)) {
            $this->error('Please provide at least one value for the enum using --values option, separated by commas.');
            return;
        }

        $enumValues = array_map('trim', explode(',', $enumValuesString));

        $enumPath = app_path('Enums/' . $enumName . '.php');

        if (file_exists($enumPath)) {
            $this->error("Enum {$enumName} already exists!");
            return;
        }

        if (!is_dir(app_path('Enums'))) {
            mkdir(app_path('Enums'));
        }

        $enumContent = $this->generateEnumContent($enumName, $enumValues);

        file_put_contents($enumPath, $enumContent);

        $this->info("Enum {$enumName} created successfully at app/Enums/$enumName");
    }

    private function generateEnumContent($enumName, $enumValues)
    {
        $enumValuesString = implode('", "', $enumValues);

        return <<<PHP
<?php

namespace App\Enums;

enum {$enumName}: string
{
    {$this->formatEnumValues($enumValues)}
}

PHP;
    }

    private function formatEnumValues($enumValues)
    {
        $formattedValues = [];
        foreach ($enumValues as $value) {
            $constantName = strtoupper(Str::snake($value, '_'));
            $formattedValues[] = "case {$constantName} = \"{$value}\";";
        }
        return implode("\n    ", $formattedValues);
    }
}
