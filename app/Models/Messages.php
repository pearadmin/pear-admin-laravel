<?php

namespace App\Models;

use App\Model;

/**
 * App\Models\Messages
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $album
 * @property string $subject
 * @property string $context
 * @property int $status
 * @property int $flag
 * @property string $created_at
 * @property string $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Messages newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Messages newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Messages query()
 * @method static \Illuminate\Database\Eloquent\Builder|Messages whereAlbum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messages whereContext($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messages whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messages whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messages whereFlag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messages whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messages whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messages wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messages whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messages whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messages whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Messages extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'email', 'phone', 'album', 'subject', 'context', 'status', 'flag', 'created_at', 'updated_at'];

}
