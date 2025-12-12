<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use phpDocumentor\Reflection\Types\ClassString;

class Check extends Model
{
    use HasFactory;
    use HasUlids;

    /** @var array <int, string> */
    protected $fillable = [
        'name',
        'service_id',
        'path',
        'body',
        'parameters',
        'headers',
        'credential_id',
    ];

    /** @return BelongsTo<Credential> */
    public function credential(): BelongsTo
    {
        return $this->belongsTo(Credential::class);
    }

    /** @return BelongsTo<Service> */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    /** @return array<string, ClassString|string>  */
    protected function casts(): array
    {
        return [
            'body'=> 'json',
            'headers'=> AsCollection::class,
            'parameters'=> AsCollection::class,
        ];
    }
}
