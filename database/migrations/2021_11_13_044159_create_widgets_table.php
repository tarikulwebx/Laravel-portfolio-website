<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateWidgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('widgets', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('body')->nullable();
            $table->string('location');
            $table->timestamps();
        });

        DB::table('widgets')->insert([
            ['location' => 'footer_col_1', 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()],
            ['location' => 'footer_col_2', 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()],
            ['location' => 'footer_col_3', 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()],
            ['location' => 'footer_col_4', 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('widgets');
    }
}
