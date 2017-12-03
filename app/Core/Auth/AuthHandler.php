<?php
declare(strict_type=1);

namespace App\Core\Auth;

use App\Core\Auth\Interfaces\AuthInterface;
use App\Models\User as UserModel;

/**
 * Class AuthHandler
 *
 * @package App\Core\Auth
 */
class AuthHandler extends AuthCommon implements AuthInterface
{
    /**
     * @param UserModel $model
     * @return UserModel
     */
    public function login(UserModel $model): UserModel
    {
        $model->name = $model->name . ' Auth';
        $model->password = $model->password . ' Auth';
        return $model;
    }
    
    /**
     * @param UserModel $model
     * @return bool
     */
    public function logout(UserModel $model):bool
    {
        return true;
    }
    
    /**
     * @param UserModel $model
     * @return bool
     */
    public function refreshToken(UserModel $model): bool
    {
        return true;
    }
    
}