<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKiyohReviewsTable extends Migration
{
    /** @var string */
    protected $table_name;

    public function __construct()
    {
        $this->table_name = config('kiyoh.table_name');
    }

    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('review_id')->unique();
            $table->unsignedTinyInteger('rating');
            $table->boolean('recommendation')->default(true);
            $table->json('payload');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
}
