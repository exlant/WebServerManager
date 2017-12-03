<?php
declare(strict_types=1);

namespace App\Core\Auth;

use App\Core\Auth\Interfaces\TokenInterface;
use App\Models\User as UserModel;

/**
 * Class TokenManager
 *
 * @package App\Core\Auth
 */
class TokenManager extends AuthCommon implements TokenInterface
{
    /**
     * @param UserModel $model
     * @return string
     */
    public function getUserToken(UserModel $model): string
    {
        return 'getUserToken';
    }
    
    /**
     * @param string $userToken
     * @return string
     */
    public function getUserRefreshToken(string $userToken): string
    {
        return 'getUserRefreshToken';
    }
    
    /**
     * @param UserModel $model
     * @return string
     */
    public function refreshUserToken(UserModel $model): string
    {
        return 'refreshUserToken';
    }
    
}