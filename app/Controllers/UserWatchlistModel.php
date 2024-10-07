<?php

namespace App\Models;

use CodeIgniter\Model;

class UserWatchlistModel extends Model
{
    protected $table = 'user_watchlist';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'tmdb_id', 'added_at'];
}
