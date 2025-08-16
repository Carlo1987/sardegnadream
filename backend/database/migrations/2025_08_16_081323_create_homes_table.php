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
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('state');
            $table->string('province');
            $table->string('city');
            $table->string('address');
            $table->string('civ');
            $table->string('cap');
            $table->string('meters');
            $table->string('rooms');
            $table->string('bathrooms');
            $table->string('single_beds');
            $table->string('double_beds');
            $table->string('bunk_beds');
            $table->string('wall_beds');
            $table->string('sofa_beds');
            $table->string('avatar');
            $table->mediumText('images');
            $table->mediumText('videos');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homes');
    }
};
