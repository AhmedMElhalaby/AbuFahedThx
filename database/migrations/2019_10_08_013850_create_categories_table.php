<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->string('signature')->nullable();
            $table->string('signature_name')->nullable();
            $table->string('stamp')->nullable();
            $table->boolean('show_identity')->default(true);
            $table->string('line_one')->nullable()->default('تشهد الإدارة العامة للتعليم بمنطقة حائل بأن');
            $table->string('line_two')->nullable()->default('هوية وطنية رقم /');
            $table->string('line_three_1')->nullable()->default('قد');
            $table->string('line_three_2')->nullable()->default('البرنامج التدريبي :');
            $table->string('line_three_3')->nullable()->default('المستوى /');
            $table->string('line_four')->nullable()->default('ضمن مبادرة صاحب السمو الملكي الأمير عبد العزيز بن سعد بن عبد العزيز');
            $table->string('line_five')->nullable()->default('لتدريب الطلاب والطالبات على اللغة الإنجليزية بالشراكة مع جامعة حائل وغرفة حائل');
            $table->string('line_six_1')->nullable()->default('ومجموع ساعات (');
            $table->string('line_six_2')->nullable()->default(') ساعة / ساعات تدريبية');
            $table->string('line_seven_1')->nullable()->default('خلال الفترة من');
            $table->string('line_seven_2')->nullable()->default('إلى');
            $table->string('line_eight_1')->nullable()->default('الختم');
            $table->string('line_eight_2')->nullable()->default('مدير عام التعليم بمنطقة حائل');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
