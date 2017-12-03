<?php
declare(strict_types=1);

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use App\Core\Helpers\Api;
use App\Core\Helpers\Logger;
use Throwable;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * Class AuthenticateUser
 *
 * @package App\Http\Middleware
 */
class AuthenticateUser
{
    const FIELD_CURRENT_USER = '_current_user';


    /**
     * Handle an incoming request.
     *
     * @param  Request $request
     * @param  \Closure $next
     * @return mixed
     * @throws \InvalidArgumentException
     */
    public function handle(Request $request, Closure $next)
    {
        JWTAuth::setRequest($request); // JWTAuth doesn't work during testing without this line
        try {
            /** @var \App\Models\User $user */
            $user = JWTAuth::parseToken()->authenticate();
            if (!$user instanceof User) {
                return Api::respondUnauthorized();
            }

            $decodedToken = JWTAuth::decode(JWTAuth::getToken());

            $request->attributes->add([
                self::FIELD_CURRENT_USER => $user,
                '_remember_me' => ($decodedToken->get('remember_me') === true),
            ]);
        } catch (TokenExpiredException $e) {
            return response()->json([
                'data' => ['errorCode' => 'tokenExpired'],
            ])->setStatusCode(Api::HTTP_UNAUTHORIZED, 'tokenExpired');
        } catch (JWTException $e) {
            return Api::respondUnauthorized();
        } catch (Throwable $e) {
            Logger::exception($e);

            return Api::respondUnauthorized();
        }

        return $next($request);
    }
}
