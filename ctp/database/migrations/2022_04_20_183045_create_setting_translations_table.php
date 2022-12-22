<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('setting_id')->unsigned();//  يعبر عن المقال الكتبنا
            $table->string('locale')->index();  // ar en fr tr مقالات حسب الغة
            $table->string('title')->nullable();// content كل مقال له تايتل و  
            $table->text('content')->nullable();
            $table->text('address')->nullable();
            $table->unique(['setting_id', 'locale']); // ان يكون ترجمة العربي واجة لاينفع ان تكون اكثر من واحدة
            $table->foreign('setting_id')->references('id')->on('settings')->onDelete('cascade');// عمليت الربط 
        });
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
};
