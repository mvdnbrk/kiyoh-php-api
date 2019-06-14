<?php

namespace Mvdnbrk\Kiyoh\Console\Commands;

use Mvdnbrk\Kiyoh\Client;
use Illuminate\Support\Carbon;
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
                            {--limit=10 : The maximum number of reviews to fetch}';

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
        $this->feed = $client->feed;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->feed->limit($this->option('limit'));

        tap($this->feed->get()->reviews, function ($reviews) {
            $this->line('Importing KiyOh reviews');
            $this->output->newLine();

            $this->output->progressStart($reviews->count());

            $reviews->each(function ($review) {
                Review::updateOrCreate([
                    'review_id' => $review->uuid
                ], [
                    'rating' => $review->rating,
                    'payload' => $review->toArray(),
                    'created_at' => Carbon::parse($review->created_at),
                ]);

                $this->output->progressAdvance();
            });

            $this->output->progressFinish();
        });
    }
}
