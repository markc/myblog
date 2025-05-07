<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Firefly\FilamentBlog\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Determine if the user can comment on blog posts.
     */
    public function canComment(): bool
    {
        return true; // Allow all authenticated users to comment by default
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_photo_path',
        'is_admin',
        'can_post',
        'can_edit_others',
        'can_moderate',
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
            'is_admin' => 'boolean',
            'can_post' => 'boolean',
            'can_edit_others' => 'boolean',
            'can_moderate' => 'boolean',
        ];
    }

    /**
     * Determine if the user can access the Filament panel.
     */
    public function canAccessPanel(Panel $panel): bool
    {
        // Allow admin users or users with specific blog permissions to access the panel
        return $this->is_admin || $this->can_post || $this->can_moderate || $this->can_edit_others;
    }

    /**
     * Get the posts authored by the user.
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, config('filamentblog.user.foreign_key'));
    }

    /**
     * Determine if the user can edit a specific post.
     */
    public function canEdit(Post $post): bool
    {
        // User can edit if they're the author, an admin, or have edit_others permission
        return $this->is_admin ||
               $this->can_edit_others ||
               $post->{config('filamentblog.user.foreign_key')} === $this->id;
    }

    /**
     * Determine if the user can create posts.
     */
    public function canCreatePosts(): bool
    {
        return $this->is_admin || $this->can_post;
    }

    /**
     * Determine if the user can moderate comments.
     */
    public function canModerateComments(): bool
    {
        return $this->is_admin || $this->can_moderate;
    }

    /**
     * Get the user's name.
     * 
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }
}
