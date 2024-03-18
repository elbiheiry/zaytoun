<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('phone');
            $table->text('map');
            $table->timestamps();
        });

        DB::table('settings')->insert([
            'email' => 'info@zaytoundevelopments.com',
            'phone' => '15569',
            'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3454.3840471545313!2d31.48039805092223!3d30.0258380818002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458410b2a6ce1a5%3A0xeb4ba3efe22e22da!2sHometown%20Developments!5e0!3m2!1sen!2seg!4v1654443043824!5m2!1sen!2seg'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
