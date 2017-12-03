<?php
declare(strict_type=1);

namespace App\Core\Auth\Interfaces;

use App\Models\User as UserModel;

/**
 * Interface Login
 *
 * @package App\Core\Auth\Interfaces
 */
interface AuthInterface
{
    /**
     * @param UserModel $model
     * @return UserModel
     */
    public function login(UserModel $model): UserModel;
    
    /**
     * @param UserModel $model
     * @return bool
     */
    public function logout(UserModel $model): bool;
}