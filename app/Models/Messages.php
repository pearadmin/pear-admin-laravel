<?php

namespace App\Models;

use App\Model;

/**
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
