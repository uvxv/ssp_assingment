<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable,HasApiTokens, Billable;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
        'name',
    ];

    /**
     * Accessor for `name` to maintain compatibility with packages/tests
     * expecting a `name` attribute.
     */
    public function getNameAttribute(): string
    {
        $first = $this->attributes['first_name'] ?? '';
        $last = $this->attributes['last_name'] ?? '';

        return trim($first . ' ' . $last);
    }

    /**
     * Mutator for `name` so assigning `name` will populate
     * `first_name` and `last_name` database columns.
     */
    public function setNameAttribute($value): void
    {
        $parts = preg_split('/\\s+/', trim((string) $value), 2, PREG_SPLIT_NO_EMPTY);

        $this->attributes['first_name'] = $parts[0] ?? null;
        $this->attributes['last_name'] = $parts[1] ?? null;
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string,string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function prefer_sms()
    {
        return $this->phone !== null;
    }
}
