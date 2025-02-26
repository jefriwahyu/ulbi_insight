<?php

use Illuminate\Database\Migrations\Migration;  
use Illuminate\Database\Schema\Blueprint;  
use Illuminate\Support\Facades\Schema;  
  
class AddViewsToPostsTable extends Migration  
{  
    /**  
     * Run the migrations.  
     *  
     * @return void  
     */  
    public function up()  
    {  
        Schema::table('posts', function (Blueprint $table) {  
            $table->integer('views')->default(0)->after('body'); // Adjust the position as needed  
        });  
    }  
  
    /**  
     * Reverse the migrations.  
     *  
     * @return void  
     */  
    public function down()  
    {  
        Schema::table('posts', function (Blueprint $table) {  
            $table->dropColumn('views');  
        });  
    }  
}  

