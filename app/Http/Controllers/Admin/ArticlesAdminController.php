<?php

namespace App\Http\Controllers\Admin;

use App\Library\Services\Grid\ColumnMakers\Articles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Extensions\Grid\Grid;
use App\Library\Services\Grid\ColumnMakerAbstract;
use App\Models\Article;
//use HTML;
//use Nayjest\Grids\EloquentDataProvider;
//use Nayjest\Grids\FieldConfig;
//use Nayjest\Grids\FilterConfig;
//use Nayjest\Grids\Grid;
//use Nayjest\Grids\GridConfig;


class ArticlesAdminController extends Controller
{


    public function index() {

        $article = new Article();
        $grid = $this->makeGrid($article);
        $grid = $grid->render();
        return view('articles-admin.index', compact('grid'));
    }

    public function remove($id) {
        $article = new Article();
        $article->remove($id);
        return redirect()->back();
    }

    public function edit($id) {
        $article = Article::find($id);
        return view('articles-admin.edit')->with('article', $article);
    }

    protected function makeGrid($model)
    {
        $columnMaker = new Articles();
        $columns = $this->getColumns($columnMaker);
        $grid = new Grid($model, $columns);
        return $grid;
    }

    protected function getColumns(ColumnMakerAbstract $columnMaker)
    {
        $colArr = $columnMaker->getColumnParams();
        return $columnMaker->makeColumns($colArr);
    }

}
