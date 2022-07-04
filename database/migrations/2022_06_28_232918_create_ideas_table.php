<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdeasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ideas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('file')->nullable();
            $table->string('source');
            $table->integer('views_count')->default(0);

            $table->foreignIdFor(\App\Models\User::class);
            $table->foreignIdFor(\App\Models\Category::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ideas');
    }
}
