<?php
declare(strict_types=1);

namespace App\Core\Auth;

use App\Core\Auth\Interfaces\UserInterface;
use App\Models\User as UserModel;

/**
 * Class User
 *
 * @package App\Core\Auth
 */
class User implements UserInterface
{
    /**
     * @var UserModel
     */
    protected $model;
    
    /**
     * @var Registration
     */
    protected $registr;
    
    /**
     * @var AuthHandler
     */
    protected $auth;
    
    /**
     * @var PasswordHandler
     */
    protected $password;
    
    /**
     * @var TokenManager
     */
    protected $tokenManager;
    
    /**
     * User constructor.
     *
     * @param UserModel $model
     * @param Registration $registr
     * @param AuthHandler $auth
     * @param PasswordHandler $password
     * @param TokenManager $tokenManager
     */
    public function __construct(
        UserModel $model,
        Registration $registr,
        AuthHandler $auth,
        PasswordHandler $password,
        TokenManager $tokenManager
    ) {
        $this->model = $model;
        $this->registr = $registr;
        $this->auth = $auth;
        $this->password = $password;
        $this->tokenManager = $tokenManager;
    }
    
    /**
     * @param array $data
     * @return null|UserModel
     */
    public function registration(array $data): ?UserModel
    {
        return $this->registr->newUser($this->model, $data);
    }
    
    /**
     * @param string $name
     * @param string $password
     * @return UserModel
     */
    public function login(string $name, string $password): UserModel
    {
        $this->model->name = $name;
        $this->model->password = $password;
        
        return $this->auth->login($this->model);
    }
    
    /**
     * @return bool
     */
    public function logout(): bool
    {
        return $this->auth->logout($this->model);
    }
    
    /**
     * @param array $data
     * @return UserModel
     */
    public function update(array $data): UserModel
    {
        return $this->model->pushData($data);
    }
    
    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return true;
    }
}