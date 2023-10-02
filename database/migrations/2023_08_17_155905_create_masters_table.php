<?php

use App\Models\District;
use App\Models\Province;
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
        Schema::create('masterprovince', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('masterdistrict', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Province::class, 'province_id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('mastersubdistrict', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(District::class, 'district_id');
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('masterprovince');
        Schema::dropIfExists('masterdistrict');
        Schema::dropIfExists('mastersubdistrict');
    }
};
