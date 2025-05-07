<?php

namespace App\Policies;

use App\Models\User;
use Firefly\FilamentBlog\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Users can view the post list if they can manage posts in any way
        return $user->is_admin || $user->can_post || $user->can_edit_others || $user->can_moderate;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Post $post): bool
    {
        // Anyone with admin access or post permissions can view posts
        return $user->is_admin || $user->can_post || $user->can_edit_others || $user->can_moderate;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // User can create if they're an admin or have can_post permission
        return $user->is_admin || $user->can_post;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): bool
    {
        // User can edit if they're the author, an admin, or have edit_others permission
        return $user->canEdit($post);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): bool
    {
        // Only admins or the post author can delete posts
        return $user->is_admin || $post->{config('filamentblog.user.foreign_key')} === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Post $post): bool
    {
        // Only admins can restore posts
        return $user->is_admin;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Post $post): bool
    {
        // Only admins can permanently delete posts
        return $user->is_admin;
    }
}
