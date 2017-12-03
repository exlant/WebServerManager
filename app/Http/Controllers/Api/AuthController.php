<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Core\Auth\User;
use Illuminate\Http\JsonResponse;

/**
 * Class AuthController
 *
 * @package App\Http\Controllers\Auth
 */
class AuthController extends ApiCommonController
{
    
    /**
     * @param User $user
     * @return JsonResponse
     */
    public function login(User $user): JsonResponse
    {
        $name = 'exlant';
        $password = 'pass';
        $login = $user->login($name, $password);
        return $this->respond(
            [
                'name' => $login->name,
                'password' => $login->password,
            ]
        );
    }
    
    public function registration()
    {
    
    }
    
    public function passwordChange()
    {
    
    }
    
    public function passwordReset()
    {
    
    }
    
    public function refreshToken()
    {
    
    }
}
