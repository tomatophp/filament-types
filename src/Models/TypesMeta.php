<?php

namespace TomatoPHP\FilamentTypes\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $type_id
 * @property int $model_id
 * @property string $model_type
 * @property string $key
 * @property mixed $value
 * @property string $created_at
 * @property string $updated_at
 * @property Type $type
 */
class TypesMeta extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['type_id', 'model_id', 'model_type', 'key', 'value', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo('TomatoPHP\FilamentTypes\Models\Type');
    }
}
