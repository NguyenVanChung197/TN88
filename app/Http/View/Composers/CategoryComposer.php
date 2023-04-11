<?php


namespace App\Http\View\Composers;
use App\Models\Category;
use Illuminate\View\View;

class CategoryComposer
{

    public function compose(View $view)
    {
        // $categories = Category::select('id', 'name', 'parent_id')->where('active', 1)->get();
        $categories = Category::get();

        $view->with('categories', $categories);
    }
}
