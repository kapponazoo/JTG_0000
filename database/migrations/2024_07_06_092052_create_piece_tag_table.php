<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePieceTagTable extends Migration
{
    public function up()
    {
        Schema::create('piece_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('piece_id')->constrained()->onDelete('cascade');
            $table->foreignId('tag_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('piece_tag');
    }
}
