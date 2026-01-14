<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Staff;

class StaffPolicy
{
    /**
     * Determine whether the user can view any models.
     * All users (including guests) can view the list.
     */
    public function viewAny(?Staff $authenticatedStaff): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     * Anyone can view staff profiles.
     */
    public function view(?Staff $authenticatedStaff, Staff $staff): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     * Only admin level users can create staff.
     */
    public function create(Staff $authenticatedStaff): bool
    {
        // Only admin level (1-3) can create new staff
        return $authenticatedStaff->user_level <= 3;
    }

    /**
     * Determine whether the user can update the model.
     * Staff can update their own profile, admin can update any.
     */
    public function update(Staff $authenticatedStaff, Staff $staff): bool
    {
        // Admin level (1-3) can update any staff
        if ($authenticatedStaff->user_level <= 3) {
            return true;
        }

        // Staff can only update their own profile (limited fields)
        return $authenticatedStaff->staff_id === $staff->staff_id;
    }

    /**
     * Determine whether the user can delete the model.
     * Only super admin (level 1) can delete staff.
     */
    public function delete(Staff $authenticatedStaff, Staff $staff): bool
    {
        // Only super admin (level 1) can delete staff
        // And cannot delete themselves
        return $authenticatedStaff->user_level <= 3 
            && $authenticatedStaff->staff_id !== $staff->staff_id;
    }

    /**
     * Determine whether the user can restore the model.
     * Only super admin can restore.
     */
    public function restore(Staff $authenticatedStaff, Staff $staff): bool
    {
        return $authenticatedStaff->user_level === 1;
    }

    /**
     * Determine whether the user can permanently delete the model.
     * Only super admin can force delete.
     */
    public function forceDelete(Staff $authenticatedStaff, Staff $staff): bool
    {
        return $authenticatedStaff->user_level === 1 
            && $authenticatedStaff->staff_id !== $staff->staff_id;
    }
}
