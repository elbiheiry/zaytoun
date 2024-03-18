<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSettingTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_translations', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->text('about');
            $table->string('hours');
            $table->unsignedBigInteger('setting_id');
            $table->string('locale')->index();
            $table->unique(['setting_id', 'locale']);
            $table->foreign('setting_id')->references('id')->on('settings')->onDelete('cascade');
            $table->timestamps();
        });

        DB::table('setting_translations')->insert([
            'address' => 'building 340, 1st floor, south 90th street, 5th settlement, new cairo',
            'about' => 'Zaytoun Family are at your service since 1970 with robust infrastructure carrying the future .',
            'hours' => '09:00 am - 06:00 pm',
            'setting_id' => 1,
            'locale' => 'en'
        ]);

        DB::table('setting_translations')->insert([
            'address' => 'مبنى 340 ، الدور الأول ، شارع التسعين الجنوبي ، التجمع الخامس ، القاهرة',
            'about' => 'عائلة زيتون في خدمتكم منذ 1970 مع بنية تحتية قوية تحمل المستقبل .',
            'hours' => '09:00 صباحا - 06.00 مساءا',
            'setting_id' => 1,
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
        Schema::dropIfExists('setting_translations');
    }
}
