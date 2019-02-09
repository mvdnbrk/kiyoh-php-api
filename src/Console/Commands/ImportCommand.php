<?php

namespace Mvdnbrk\Kiyoh\Console\Commands;

use Mvdnbrk\Kiyoh\Client;
use Illuminate\Console\Command;

class ImportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kiyoh:import {--limit=10 : The maximum number of reviews to fetch} {--all : Fetch all reviews}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import KiyOh reviews into the database';

    /**
     * @var \Mvdnbrk\Kiyoh\Client
     */
    protected $client;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Client $client)
    {
        parent::__construct();

        $this->client = $client;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->client->feed->limit($this->option('limit'));

        if ($this->option('all')) {
            $this->client->feed->all();
        }

        tap($this->client->feed->get()->reviews, function ($reviews) {
            $this->line('Importing KiyOh reviews');
            $this->output->newLine();

            $this->output->progressStart($reviews->count());

            $reviews->each(function ($review) {
                $this->output->progressAdvance();
            });

            $this->output->progressFinish();
        });
    }
}
