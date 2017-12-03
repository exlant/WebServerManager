<?php
declare(strict_type=1);

namespace App\Core\Auth\Interfaces;

use App\Models\User as UserModel;

/**
 * Interface UserInterface
 *
 * @package App\Core\Auth\Interfaces
 */
interface UserInterface
{
    /**
     * @param array $data
     * @return null|UserModel
     */
    public function registration(array $data): ?UserModel;
    
    /**
     * @param string $name
     * @param string $password
     * @return UserModel
     */
    public function login(string $name, string $password): UserModel;
    
    /**
     * @return bool
     */
    public function logout(): bool;
    
    /**
     * @param array $data
     * @return UserModel
     */
    public function update(array $data): UserModel;
    
    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;
}