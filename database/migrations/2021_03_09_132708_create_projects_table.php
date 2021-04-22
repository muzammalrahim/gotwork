<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('assignee_id')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedInteger('project_type_id')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('currency_id')->nullable();
            /*
            $table->unsignedInteger('project_tag_id')->nullable();
            $table->unsignedInteger('project_file_id')->nullable();
            */
            $table->double('min_amount', 8, 2)->nullable();
            $table->double('max_amount', 8, 2)->nullable();
            $table->enum('status',['Active','Deleted','Completed','Assigned'])->default('Active');
            $table->dateTime('expires_at')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
