<?php
namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model;

class Package extends Model {
    protected $connection = 'mongodb';
    protected $collection = 'package_collection';
}
