<?php

namespace Modules\Administrator\Console;

use App\Http\Middleware\Student\Student;
use Illuminate\Console\Command;
use Modules\Student\Entities\StudentCourse;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class SemesterRegistration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'semester:registration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        StudentCourse::where('current_class', 'BSCE/SEP2023/J-FT')->orderBy('student_number', 'asc')->update(['status' => 0]);
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['example', InputArgument::REQUIRED, 'An example argument.'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
}
