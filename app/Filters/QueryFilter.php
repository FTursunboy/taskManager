<?php

namespace App\Filters;

use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

abstract class QueryFilter
{
    protected Request $request;

    protected Builder $builder;

    public function __construct(Request $request )
    {
        $this->request = $request;
    }

    public function apply(Builder $builder) : Builder
    {
        $this->builder = $builder;

        foreach ($this->filters() as $name => $value) {
            if (method_exists($this, $name)) {
                call_user_func([$this, $name], array_filter([$value]));
            }
        }

        return $this->builder;
    }

    private function filters() :array
    {
        return $this->request->all();
    }
}