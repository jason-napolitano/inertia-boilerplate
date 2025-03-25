<?php

namespace App\Models {

    use Illuminate\Database\Eloquent\Relations\BelongsToMany;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Concerns\HasUuids;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Illuminate\Notifications\Notifiable;
    use Spatie\Permission\Traits\HasRoles;
    use Illuminate\Support\Collection;

    /**
     * @method static create(array|Collection $data)
     */
    class User extends Authenticatable
    {
        // traits
        use SoftDeletes;
        use HasFactory;
        use Notifiable;
        use HasRoles;
        use HasUuids;

        /** @inheritdoc */
        protected $fillable = [
            'state_province',
            'profile_image',
            'salary_type',
            'password',
            'address',
            'country',
            'salary',
            'phone',
            'email',
            'name',
        ];

        /** @inheritdoc */
        protected $hidden = [
            'password',
            'remember_token',
        ];

        /**
         * Get the attributes that should be cast.
         *
         * @return array<string, string>
         */
        protected function casts(): array
        {
            return [
                'email_verified_at' => 'datetime',
                'password'          => 'hashed',
            ];
        }

        public function properties(): BelongsToMany
        {
            return $this->belongsToMany(Property::class)->withTimestamps();
        }
    }
}
