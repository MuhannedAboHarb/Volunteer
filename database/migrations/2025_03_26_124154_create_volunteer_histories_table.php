<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('volunteer_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('volunteer_id');
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('company_id');
            $table->string('title');
            $table->string('location');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->enum('status', ['Completed', 'In Progress', 'Cancelled']);
            $table->text('feedback')->nullable();
            $table->tinyInteger('rating')->nullable();
            $table->timestamps();

            $table->foreign('volunteer_id')->references('id')->on('volunteer_profiles')->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('company_profiles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteer_histories');
    }
};
