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
            $table->smallInteger('meters');
            $table->smallInteger('rooms');
            $table->smallInteger('bathrooms');
            $table->smallInteger('single_beds');
            $table->smallInteger('double_beds');
            $table->smallInteger('bunk_beds');
            $table->smallInteger('wall_beds');
            $table->smallInteger('sofa_beds');
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
