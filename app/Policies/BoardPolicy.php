<?php

namespace App\Policies;

use App\Models\Board;
use App\Models\Team;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BoardPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Board $board): bool
    {
        return in_array($board->team_id, $user->allTeams()->pluck('id')->toArray());
    }

    public function create(User $user): bool
    {
        return $user->team_id !== null;
    }

    public function update(User $user, Board $board): bool
    {
        return $user->team_id === $board->team_id;
    }

    public function delete(User $user, Team $team, Board $board): bool
    {
        return $user->ownsTeam($board->team) && $user->hasTeamRole($team, 'admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Board $board): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Board $board): bool
    {
        return false;
    }
}
