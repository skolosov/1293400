<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Request;
use App\Models\LogActivity as LogActivityModel;

class LogActivity
{
    public const SUBJECTS = [
        'create' => 'Пользователь создал новую запись',
        'update' => 'Пользователь обновил запись',
        'delete' => 'Пользователь удалил запись',
    ];

    /**
     * @param string $action
     * @return void
     */
    public static function addToLog(string $action)
    {
        $log = [
            'subject' => static::SUBJECTS[$action],
            'url' => Request::fullUrl(),
            'method' => Request::method(),
            'ip' => Request::ip(),
            'agent' => Request::header('user-agent'),
            'user_id' => null,
        ];
        LogActivityModel::query()->create($log);
    }

    /**
     * @return Builder[]|Collection
     */
    public static function logActivityLists()
    {
        return LogActivityModel::query()->latest()->get();
    }
}
