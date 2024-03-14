<?php

namespace App\Enums;

enum Statuses: string
{
    case Pending = 'В ожидании';
    case Accepted = 'Принят';
    case Finished = 'Готов';
}

