<?php

namespace Mvdnbrk\Kiyoh\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Mvdnbrk\Kiyoh\Client;
use Mvdnbrk\Kiyoh\Models\Review;

class ImportCommand extends Command
{
    /** @var string */
    protected $signature = 'kiyoh:import
                            {--limit=10 : The maximum number of reviews to fetch}
                            {--with-migrated : Include migrated reviews in the feed}';

    /** @var string */
    protected $description = 'Import KiyOh reviews into the database';

    /** @var \Mvdnbrk\Kiyoh\Feed */
    protected $feed;

    public function __construct(Client $client)
    {
        $this->feed = $client->feed;

        parent::__construct();
    }

    public function handle(): int
    {
        $this->feed->withMigrated($this->option('with-migrated'))->limit($this->option('limit'));

        tap($this->feed->get()->reviews, function ($reviews) {
            $this->line('Importing KiyOh reviews');
            $this->output->newLine();

            $this->output->progressStart($reviews->count());

            $reviews->sortBy('created_at')->each(function ($review) {
                Review::updateOrCreate([
                    'review_id' => $review->uuid,
                ], [
                    'rating' => $review->rating,
                    'recommendation' => $review->recommendation,
                    'payload' => $this->preparePayload($review),
                    'created_at' => Carbon::parse($review->created_at),
                    'updated_at' => Carbon::parse($review->updated_at),
                ]);

                $this->output->progressAdvance();
            });

            $this->output->progressFinish();
        });

        return 0;
    }

    /**
     * Prepare the review payload.
     *
     * @param  \Mvdnbrk\Kiyoh\Resources\Review  $review
     * @return array
     */
    protected function preparePayload($review)
    {
        return collect($review->toArray())->forget([
            'uuid',
            'rating',
            'recommendation',
            'created_at',
            'updated_at',
        ]);
    }
}
