<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use HTML;
use Nayjest\Grids\EloquentDataProvider;
use Nayjest\Grids\FieldConfig;
use Nayjest\Grids\FilterConfig;
use Nayjest\Grids\Grid;
use Nayjest\Grids\GridConfig;


class ArticlesAdminController extends Controller
{
    public function index() {
        $grid = new Grid(
            (new GridConfig)
                ->setDataProvider(
                    new EloquentDataProvider(Article::query())
                )
                ->setName('example_grid4')
                ->setPageSize(15)
                ->setColumns([
                    (new FieldConfig)
                        ->setName('id')
                        ->setLabel('ID')
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('name')
                        ->setLabel('Name')
                        ->addFilter(
                            (new FilterConfig)
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )
                    ,
                    (new FieldConfig)
                        ->setName('title')
                        ->setLabel('Title')
                        ->setSortable(true)
                        ->setCallback(function ($val) {
                            return
                                '<small>'
                                . HTML::link("$val", $val)
                                . '</small>';
                        })
                        ->addFilter(
                            (new FilterConfig)
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )
                    ,
                ])
        );
        $grid = $grid->render();
        return view('articles-admin.index', compact('grid'));
    }
}
