<?php

namespace App\Library\Services\Grid\ColumnMakers;


use App\Models\Article;
use App\Library\Services\Grid\ColumnMakerAbstract;

class Articles extends ColumnMakerAbstract
{
    public function getColumnParams()
    {
        $columns = [
            [
                'name' => 'id',
                'title' => 'ID',
            ],
            [
                'name' => 'name',
                'title' => 'Name',

            ],
            [
                'name' => 'title',
                'title' => 'Title',
            ],
            [
                'name' => 'action',
                'title' => 'Действия',
                'formatFunction' => function ($row) {
                    return '<div class="dropdown profile-element">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">Выбрать</a>
                                <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                    <li><a href="'. route('admin-articles-edit', ['id' => $row->id]) .'">Редактировать</a></li>
                                    <li><a href="'. route('admin-articles-remove', ['id' => $row->id]) .'">Удалить</a></li>
                                </ul>
                            </div>';
                },
            ],
        ];

        return $columns;
    }
}
