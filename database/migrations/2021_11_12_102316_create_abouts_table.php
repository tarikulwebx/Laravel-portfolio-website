<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('profession');
            $table->string('phone');
            $table->string('email');
            $table->string('facebook')->nullable();
            $table->string('github')->nullable();
            $table->string('twitter')->nullable();
            $table->string('address');
            $table->string('cv_link')->nullable();
            $table->text('short_description')->nullable();
            $table->text('more_description')->nullable();
            $table->string('cover_photo')->nullable();
            $table->timestamps();
        });

        DB::table('abouts')->insert([
            'name' => 'Tarikul',
            'profession' => 'Full Stack Web Developer',
            'phone' => '+8801717678426',
            'email' => 'tarikulwebx@gmail.com',
            'facebook' => null,
            'github' => null,
            'twitter' => null,
            'address' => 'Rangpur sadar, Rangpur, Bangladesh',
            'cv_link' => null,
            'short_description' => null,
            'more_description' => null,
            'cover_photo' => null,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abouts');
    }
}
