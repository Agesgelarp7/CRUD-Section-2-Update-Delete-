<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Borrow
 * 
 * @property int $id
 * @property Carbon $load_date
 * @property Carbon $borrow_date
 * @property int $book_id
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Book $book
 * @property User $user
 *
 * @package App\Models
 */
class Borrow extends Model
{
	use HasFactory;

	protected $table = 'borrows';

	protected $casts = [
		'load_date' => 'datetime',
		'borrow_date' => 'datetime',
		'book_id' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'load_date',
		'borrow_date',
		'book_id',
		'user_id'
	];

	public function book()
	{
		return $this->belongsTo(Book::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
