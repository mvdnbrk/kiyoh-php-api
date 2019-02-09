<?php

namespace Mvdnbrk\Kiyoh\Console\Commands;

use Mvdnbrk\Kiyoh\Client;
use Illuminate\Console\Command;
use Mvdnbrk\Kiyoh\Models\Review;

class ImportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kiyoh:import
                            {--limit=10 : The maximum number of reviews to fetch}
                            {--all : Fetch all reviews}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import KiyOh reviews into the database';

    /**
     * @var \Mvdnbrk\Kiyoh\Feed
     */
    protected $feed;

    /**
     * Create a new command instance.
     *
     * @param  \Mvdnbrk\Kiyoh\Client  $client
     * @return void
     */
    public function __construct(Client $client)
    {
        parent::__construct();

        $this->feed = $client->feed;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->feed->limit($this->option('limit'));

        if ($this->option('all')) {
            $this->feed->all();
        }

        tap($this->feed->get()->reviews, function ($reviews) {
            $this->line('Importing KiyOh reviews');
            $this->output->newLine();

            $this->output->progressStart($reviews->count());

            $reviews->each(function ($review) {
                Review::updateOrCreate([
                    'company_id' => config('kiyoh.id'),
                    'review_id' => $review->id
                ], [
                    'company_id' => config('kiyoh.id'),
                    'review_id' => $review->id,
                    'rating' => $review->rating,
                    'payload' => $review->toArray(),
                ]);

                $this->output->progressAdvance();
            });

            $this->output->progressFinish();
        });
    }
}
