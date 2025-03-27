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
        Schema::create('volunteer_attachments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('volunteer_id');
            $table->string('file_name');
            $table->string('file_url');
            $table->enum('file_type', ['Resume', 'Certificate', 'Other']);
            $table->timestamps();

            $table->foreign('volunteer_id')->references('id')->on('volunteer_profiles')->onDelete('cascade');
    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteer_attachments');
    }
};
