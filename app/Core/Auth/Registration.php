<?php
declare(strict_types=1);

namespace App\Core\Auth;

use App\Core\Auth\Interfaces\RegistrationInterface;
use App\Models\User as UserModel;

/**
 * Class Registration
 *
 * @package App\Core\Auth
 */
class Registration extends AuthCommon implements RegistrationInterface
{
    /**
     * @param UserModel $model
     * @param array $data
     * @return UserModel|null
     */
    public function newUser(UserModel $model, array $data): ?UserModel
    {
        return $model;
    }
}