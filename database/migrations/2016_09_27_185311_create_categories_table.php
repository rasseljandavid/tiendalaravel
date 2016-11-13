<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Ecommerce\Category;

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
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->integer('rank')->default(0);
            $table->string('bannerImage')->nullable();
            $table->integer('parent_id')->default(0);
            $table->timestamps();
        });

        $megaventory = new \Megaventory();
        $categories = $megaventory->getCategories();

        foreach($categories as $category) {
            if($category->ProductCategoryDescription >= 0) {
                $newCategories = new Category();
                $newCategories->id = $category->ProductCategoryID;
                $newCategories->title = $category->ProductCategoryName;
                $newCategories->rank = $category->ProductCategoryDescription;
                $newCategories->slug = $category->ProductCategoryName;
                $newCategories->save();
            }
        }
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
