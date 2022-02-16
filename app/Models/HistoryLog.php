<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class HistoryLog extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = ['task_id', 'changing_column', 'before', 'after'];

    protected $table = 'history_logs';
}
