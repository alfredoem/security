<?php namespace App\Ragnarok\SecApps;

use Illuminate\Database\Eloquent\Model;

class SecApp extends Model
{
    protected $table = 'SecApps';
    public $primaryKey = 'appId';
}