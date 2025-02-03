<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('mark_up_histories', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->decimal('mark_up_rate', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mark_up_histories');
    }
};

