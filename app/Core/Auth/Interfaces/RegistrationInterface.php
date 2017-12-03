<?php
declare(strict_type=1);

namespace App\Core\Auth\Interfaces;

use App\Models\User as UserModel;

/**
 * Interfase RegistrationHandler
 *
 * @package App\Core\Auth\Interfaces
 */
interface RegistrationInterface
{
    /**
     * @param UserModel $model
     * @param array $data
     * @return UserModel|null
     */
    public function newUser(UserModel $model, array $data): ?UserModel;
}