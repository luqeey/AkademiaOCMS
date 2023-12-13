<?php namespace App\SecondLog\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateLogsTable extends Migration
{
    public function up()
    {
        Schema::create('app_secondlog_logs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('arrival_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('app_secondlog_logs');
    }
}
