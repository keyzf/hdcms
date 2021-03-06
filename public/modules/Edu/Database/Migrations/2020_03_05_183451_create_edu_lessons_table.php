<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduLessonsTable extends Migration
{
  /**
   * 课程
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('edu_lessons', function (Blueprint $table) {
      $table->bigIncrements('id');
      table_foreign($table, 'sites', 'site_id');
      table_foreign($table, 'users', 'user_id');
      $table->string('title');
      $table->string('description')->nullable()->comment('课程介绍');
      $table->string('thumb')->nullable()->comment('预览图片');
      $table->char('type', 20)->default('project')->index()->comment('类型:system系统，project实战项目');
      $table->tinyInteger('status')->default(1)->comment('1:上架 0:下架');
      $table->tinyInteger('free_num')->default(0)->index()->comment('免费观看数量');
      $table->decimal('price')->nullable()->comment('售价');
      $table->tinyInteger('is_commend')->nullable()->index()->comment('推荐');
      $table->string('video_num')->default(0)->comment('视频数量');
      $table->string('download_address')->nullable()->comment('下载地址');
      $table->unsignedBigInteger('read_num')->default(0)->comment('查看次数');
      $table->unsignedBigInteger('zan_num')->default(0)->comment('点赞数');
      $table->unsignedBigInteger('favorite_num')->default(0)->comment('收藏数');
      $table->unsignedBigInteger('comment_num')->default(0)->comment('评论数');

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
    Schema::dropIfExists('edu_lessons');
  }
}
