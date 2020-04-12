<?php


namespace Mitosis\Channel\Models;

use Illuminate\Database\Eloquent\Model;
use Mitosis\Channel\Contracts\Channel as ChannelContract;

class Channel extends Model implements ChannelContract
{
    protected $table = 'channels';

    protected $fillable = ['name', 'slug', 'configuration'];

    protected $casts = [
        'configuration' => 'array'
    ];
}
