<?php
declare(strict_type=1);

namespace App\Core\Auth\Interfaces;

use App\Models\User as UserModel;

/**
 * Interfase PasswordHandler
 *
 * @package App\Core\Auth\Interfaces
 */
interface PasswordInterface
{
    /**
     * @param UserModel $model
     * @param string $password
     * @return bool
     */
    public function change(UserModel $model, string $password): bool;
    
    /**
     * @param UserModel $model
     * @return bool
     */
    public function reset(UserModel $model): bool;
}