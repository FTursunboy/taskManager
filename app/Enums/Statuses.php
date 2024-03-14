<?php

namespace App\Enums;

enum Statuses: string
{
    case Created = 'Создано';
    case InProgress = 'В процессе';
    case Finished = 'Готов';
}

