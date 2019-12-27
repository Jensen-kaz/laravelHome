<?php

namespace App\Services\Grid\ColumnMakers;


use App\Models\Article;
use App\Services\Grid\ColumnMakerAbstract;

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
        ];

        return $columns;
    }
}
