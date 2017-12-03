<?php
declare(strict_type=1);

namespace App\Core\Auth\Interfaces;

use App\Models\User as UserModel;

/**
 * Interface  UserModelInterface
 *
 * @package App\Core\Auth\Interfaces
 */
interface UserModelInterface
{
    /**
     * @param array $data
     * @return bool
     */
    public function add(array $data): bool;
    
    /**
     * @param int $userId
     * @return UserModel
     */
    public function getById(int $userId): UserModel;
    
    /**
     * @param array $data
     * @return UserModel
     */
    public function pushData(array $data): UserModel;
    
    /**
     * @return bool
     */
    public function deleteUser(): bool;
    
    /**
     * @param int $id
     * @return bool
     */
    public function deleteById(int $id): bool;
}