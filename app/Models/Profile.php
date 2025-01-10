<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Profile
 * 
 * @property int $id
 * @property string $biodata
 * @property string $age
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Profile extends Model
{
	use HasFactory;

	protected $table = 'profiles';

	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'biodata',
		'age',
		'user_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
