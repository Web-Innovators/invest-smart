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
        Schema::create('share_packages', function (Blueprint $table) {
            $table->id();
            $table->string('pkg_shares')->nullable();
            $table->string('pkg_price')->default(5);
            $table->string('pkg_monthly_roi')->nullable();
            $table->string('pkg_bonus_roi')->default('Surprise');
            $table->string('pkg_referral_bonus')->nullable();
            $table->string('pkg_daily_referral_roi')->nullable();
            $table->text('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('share_packages');
    }
};
