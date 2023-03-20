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
        Schema::table('books', function (Blueprint $table) {
            $table->foreign(['author_id'], 'books_ibfk_1')->references(['author_id'])->on('authors');
            $table->foreign(['category_id'], 'books_ibfk_2')->references(['category_id'])->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign('books_ibfk_1');
            $table->dropForeign('books_ibfk_2');
        });
    }
};
