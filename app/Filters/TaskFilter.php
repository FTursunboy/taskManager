<?php

namespace App\Filters;

use App\Enums\Statuses;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class TaskFilter extends QueryFilter
{
    public function status($value) : Builder
    {
        return $this->builder->where('status', $value);
    }


    public function date($value) : Builder
    {

        return $this->builder->where('date', $value);
    }
}
