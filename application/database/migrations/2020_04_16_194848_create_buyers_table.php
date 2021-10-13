<?php

class CreateBuyersTable extends Illuminate\Database\Migrations\Migration
{
    public function up()
    {
        Illuminate\Support\Facades\Schema::create("buyers", function (Illuminate\Database\Schema\Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("code");
            $table->string("domain");
            $table->integer("status");
            $table->timestamps();
        });
    }
    public function down()
    {
        Illuminate\Support\Facades\Schema::dropIfExists("buyers");
    }
}

?>