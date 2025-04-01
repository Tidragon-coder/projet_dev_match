<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Swipe;
use App\Models\UserMatch;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'pseudo',
        'email',
        'password',
        'speciality',
        'sexe',
        'age',
        'projet_id',
        'biography',
        'year_experience',
        'profile_picture',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
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
            'password' => 'hashed',
        ];
    }

        // Swipes que l'utilisateur a faits
    public function swipesGiven()
    {
        return $this->hasMany(Swipe::class, 'swiper_user_id');
    }

    // Swipes que l'utilisateur a reçus (à ne pas exposer à l'utilisateur !)
    public function swipesReceived()
    {
        return $this->hasMany(Swipe::class, 'swiped_user_id');
    }

    // Matchs où l'utilisateur est user1
    public function matchesAsUser1()
    {
        return $this->hasMany(UserMatch::class, 'user1_id');
    }

    // Matchs où l'utilisateur est user2
    public function matchesAsUser2()
    {
        return $this->hasMany(UserMatch::class, 'user2_id');
    }

    // Tous les matchs (fusion des deux relations)
    public function matches()
    {
        return $this->matchesAsUser1->merge($this->matchesAsUser2);
    }
}

