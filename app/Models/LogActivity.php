<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $subject
 * @property string $url
 * @property string $method
 * @property string $ip
 * @property string $agent
 * @property int $user_id
 */
class LogActivity extends Model
{
    use HasFactory;

    /** @var string[] */
    protected $fillable = [
        'subject',
        'url',
        'method',
        'ip',
        'agent',
        'user_id'
    ];
}
