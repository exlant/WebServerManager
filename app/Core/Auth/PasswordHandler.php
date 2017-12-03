<?php
declare(strict_types=1);

namespace App\Core\Auth;

use App\Core\Auth\Interfaces\PasswordInterface;
use App\Models\User as UserModel;

/**
 * Class Password
 *
 * @package App\Core\Auth
 */
class PasswordHandler extends AuthCommon implements PasswordInterface
{
    /**
     * @param UserModel $model
     * @param string $password
     * @return bool
     */
    public function change(UserModel $model, string $password): bool
    {
        return true;
    }
    
    /**
     * @param UserModel $model
     * @return bool
     */
    public function reset(UserModel $model): bool
    {
        return true;
    }
}