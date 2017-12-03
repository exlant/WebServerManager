<?php
declare(strict_type=1);

namespace App\Core\Auth\Interfaces;

use App\Models\User as UserModel;

/**
 * interface TokenInterface
 *
 * @package App\Core\Auth\Interfaces
 */
interface TokenInterface
{
    /**
     * @param UserModel $model
     * @return string
     */
    public function getUserToken(UserModel $model): string;
    
    /**
     * @param string $userToken
     * @return string
     */
    public function getUserRefreshToken(string $userToken): string;
    
    /**
     * @param UserModel $model
     * @return string
     */
    public function refreshUserToken(UserModel $model): string;
}