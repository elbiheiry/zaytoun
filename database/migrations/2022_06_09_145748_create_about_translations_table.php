<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

use function PHPSTORM_META\map;

class CreateAboutTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_translations', function (Blueprint $table) {
            $table->id();
            $table->string('title1');
            $table->text('description1');
            $table->string('title2');
            $table->text('description2');
            $table->text('mission');
            $table->text('vision');
            $table->text('message');
            $table->unsignedBigInteger('about_id');
            $table->string('locale')->index();
            $table->unique(['about_id', 'locale']);
            $table->foreign('about_id')->references('id')->on('abouts')->onDelete('cascade');
            $table->timestamps();
        });

        DB::table('about_translations')->insert([
            'title1' => 'ZAYTOUN DEVELOPMENTS',
            'description1' => 'Zaytoun Family are at your service since <span> 1970 </span> with robust infrastructure carrying the future . Because Zaytoun Family knows what a secured future means, they entered<span> 4 high-yield </span> and profitable industries,” Agriculture, Automotive, Real Estate,Pharmaceutical and medical”.',
            'title2' => 'We know what a <span>secured future</span> means.',
            'description2' => 'For 80 years, Zaytoun Family Established its Name as a haven for ambitious investors to venture into a safe and risk-free future, following the A to Z ideology for reliable investment opportunities with profitable investment returns.',
            'mission' => 'Make use of our 80 years of experience in developing differentiated projects for our clients and valued community to our employees.',
            'vision' => 'Flourishing the Egyptian economy by being clients` first-choice for sustained real estate investments to garland our year of experience with more.',
            'message' => 'MESSAGE FROM OUR CEO',
            'about_id' => 1,
            'locale' => 'en'
        ]);
        DB::table('about_translations')->insert([
            'title1' => 'ZAYTOUN DEVELOPMENTS',
            'description1' => 'Zaytoun Family are at your service since <span> 1970 </span> with robust infrastructure carrying the future . Because Zaytoun Family knows what a secured future means, they entered<span> 4 high-yield </span> and profitable industries,” Agriculture, Automotive, Real Estate,Pharmaceutical and medical”.',
            'title2' => 'We know what a <span>secured future</span> means.',
            'description2' => 'For 80 years, Zaytoun Family Established its Name as a haven for ambitious investors to venture into a safe and risk-free future, following the A to Z ideology for reliable investment opportunities with profitable investment returns.',
            'mission' => 'Make use of our 80 years of experience in developing differentiated projects for our clients and valued community to our employees.',
            'vision' => 'Flourishing the Egyptian economy by being clients` first-choice for sustained real estate investments to garland our year of experience with more.',
            'message' => 'MESSAGE FROM OUR CEO',
            'about_id' => 1,
            'locale' => 'ar'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_translations');
    }
}
