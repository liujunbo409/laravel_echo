<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 2018/2/26
 * Time: 13:35
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
	use SoftDeletes;    //使用软删除
	protected $connection = 'test2';   //慢病管理数据库名
	protected $table = 't_order_info';
	public $timestamps = true;
	protected $dates = ['deleted_at'];  //软删除
}