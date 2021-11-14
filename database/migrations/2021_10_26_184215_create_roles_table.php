<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('roles')) {
            Schema::create('roles', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->timestamps();
            });
    
            // Common Roles for as website inclusion automatically
            DB::table('roles')->insert([
                ['name' => 'administrator', 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()],
                ['name' => 'editor', 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()],
                ['name' => 'author', 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()],
                ['name' => 'contributor', 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()],
                ['name' => 'subscriber', 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()],
            ]);
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
