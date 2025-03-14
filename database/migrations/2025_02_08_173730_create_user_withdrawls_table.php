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
        Schema::create('user_withdrawls', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->default(0);
            $table->string('share_selling_request')->default(0);
            $table->string('share_withdrawl_requested')->default(0);
            $table->text('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_withdrawls');
    }
};
