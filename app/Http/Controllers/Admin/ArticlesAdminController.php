<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Extensions\Grid\Grid;
use App\Services\Grid\ColumnMakerAbstract;
use App\Services\Grid\ColumnMakers\Articles;
use App\Models\Article;
//use HTML;
//use Nayjest\Grids\EloquentDataProvider;
//use Nayjest\Grids\FieldConfig;
//use Nayjest\Grids\FilterConfig;
//use Nayjest\Grids\Grid;
//use Nayjest\Grids\GridConfig;


class ArticlesAdminController extends Controller
{

    protected $columnMaker = Articles::class;

    public function index() {

        $article = new Article();
        $grid = $this->makeGrid($article);
        $grid = $grid->render();
        return view('articles-admin.index', compact('grid'));
    }

    protected function makeGrid($model)
    {
        $columns = $this->getColumns();
        $grid = new Grid($model, $columns);
        return $grid;
    }

    protected function getColumns()
    {
        $columnMaker = $this->columnMaker;
        $columnMaker = new $columnMaker();
        $colArr = $columnMaker->getColumnParams();
        return $columnMaker->makeColumns($colArr);
    }

}
