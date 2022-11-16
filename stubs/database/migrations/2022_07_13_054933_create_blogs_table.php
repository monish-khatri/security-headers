<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique()->nullable();
            $table->string('title');
            $table->string('image')->nullable();
            $table->text('description');
            $table->boolean('is_published')->default(false);
            $table->date('published_at')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->enum('status', ['draft', 'pending', 'approved', 'rejected'])->default('draft');
            $table->foreignId('action_by')->nullable()->constrained('users');
            $table->string('reject_reason', 500)->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('blogs');
    }
};
