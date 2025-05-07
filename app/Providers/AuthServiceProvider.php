<?php

namespace App\Providers;

use App\Policies\BlogPostPolicy;
use App\Policies\CommentPolicy;
use Firefly\FilamentBlog\Models\Comment;
use Firefly\FilamentBlog\Models\Post;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Post::class => BlogPostPolicy::class,
        Comment::class => CommentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Register policies
        $this->registerPolicies();

        // Define custom gates
        Gate::define('manage-users', function ($user) {
            return $user->is_admin;
        });

        Gate::define('moderate-comments', function ($user) {
            return $user->is_admin || $user->can_moderate;
        });

        Gate::define('create-posts', function ($user) {
            return $user->is_admin || $user->can_post;
        });

        Gate::define('edit-others-posts', function ($user) {
            return $user->is_admin || $user->can_edit_others;
        });
    }
}
