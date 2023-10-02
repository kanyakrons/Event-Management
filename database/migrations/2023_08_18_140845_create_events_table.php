<?php

use App\Models\Certificate;
use App\Models\District;
use App\Models\Organizer;
use App\Models\Province;
use App\Models\Subdistrict;
use App\Models\User;
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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Organizer::class, 'organizer_id');
            $table->string('name');
            $table->string('detail')->nullable();
            $table->string('address');
            $table->foreignIdFor(Province::class, 'province_id');
            $table->foreignIdFor(District::class, 'district_id');
            $table->foreignIdFor(Subdistrict::class, 'subdistrict_id');
            $table->dateTime('date');
            $table->string('image_path')->nullable();
            $table->string('location_detail')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
