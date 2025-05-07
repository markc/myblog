<?php

namespace App\Policies;

use App\Models\User;
use Firefly\FilamentBlog\Models\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Only users who can moderate comments or admins can see the comments list
        return $user->is_admin || $user->can_moderate;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Comment $comment): bool
    {
        // Anyone with admin access or moderation permissions can view comments
        return $user->is_admin || $user->can_moderate || $user->can_post || $user->can_edit_others;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Comment $comment): bool
    {
        // User can edit if they are the comment author, an admin, or have moderation permission
        return $user->is_admin ||
               $user->can_moderate ||
               $comment->{config('filamentblog.user.foreign_key')} === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Comment $comment): bool
    {
        // User can delete if they are the comment author, an admin, or have moderation permission
        return $user->is_admin ||
               $user->can_moderate ||
               $comment->{config('filamentblog.user.foreign_key')} === $user->id;
    }

    /**
     * Determine whether the user can approve comments.
     */
    public function approve(User $user): bool
    {
        // Only moderators and admins can approve comments
        return $user->is_admin || $user->can_moderate;
    }
}
