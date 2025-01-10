<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Book
 * 
 * @property int $id
 * @property string $title
 * @property string $summary
 * @property string $image
 * @property int $stock
 * @property int $category_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Category $category
 * @property Collection|Borrow[] $borrows
 *
 * @package App\Models
 */
class Book extends Model
{
	use HasFactory;

	protected $table = 'books';

	protected $casts = [
		'stock' => 'int',
		'category_id' => 'int'
	];

	protected $fillable = [
		'title',
		'summary',
		'image',
		'stock',
		'category_id'
	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function borrows()
	{
		return $this->hasMany(Borrow::class);
	}
}
