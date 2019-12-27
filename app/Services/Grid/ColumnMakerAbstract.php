<?php

namespace App\Services\Grid;


use Estaticzz\AdminGrid\Column;

abstract class ColumnMakerAbstract
{
    protected $columns = [];

    public function __construct()
    {
        $this->columns = $this->getColumnParams();
    }

    public function makeColumns($colArr)
    {
        $columns = collect();


        $colArr = array_sort($colArr, function($item) {
            return $item['order'] ?? 100;
        });
        foreach ($colArr as $columnData) {
            $column = with(new Column($columnData['name'], $columnData['title']));
            if(!empty($columnData['formatFunction'])) {
                $column->setFormatFunction($columnData['formatFunction']);
            }

            if(!empty($columnData['sortFunction'])) {
                $column->setSortFunction($columnData['sortFunction']);
            }

            if(!empty($columnData['class'])) {
                $column->setClass($columnData['class']);
            }

            if(!empty($columnData['disableSort'])) {
                $column->setSortable(false);
            }

            $columns->push($column);
        }

        return $columns;
    }


    abstract protected function getColumnParams();
}
