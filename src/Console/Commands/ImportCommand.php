<?php

namespace Mvdnbrk\Kiyoh\Console\Commands;

use Illuminate\Console\Command;

class ImportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kiyoh:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import KiyOh reviews into the database';

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
        //
    }
}
