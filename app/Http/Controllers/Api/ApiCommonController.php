<?php
declare(strict_type=1);

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use App\Core\Helpers\Api;


/**
 * Class ApiCommonController
 *
 * @package App\Http\Controllers\Auth
 */
abstract class ApiCommonController extends BaseController
{
    /**
     * This endpoint is required by some JavaScript frameworks like AngularJs
     *
     * @return Response
     */
    public function options(): Response
    {
        return $this->respondSuccess();
    }
    
    /**
     * @param \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder $query
     * @param int $offset
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder
     */
    protected function paginate($query, $offset = 0, $limit = 50)
    {
        $request = request();
        
        $offset = $request->get('offset', $offset);
        $limit = $request->get('limit', $limit);
        
        $query->offset($offset)->limit($limit);
        
        return $query;
    }
    
    /**
     * @param string|array $msg
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondNotFound($msg = 'Resource not found.'): JsonResponse
    {
        return Api::respondNotFound($msg);
    }
    
    /**
     * @param string|array $msg
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondBadRequest($msg = 'Bad request'): JsonResponse
    {
        return Api::respondBadRequest($msg);
    }
    
    /**
     * @param string|array $msg
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondForbidden($msg = 'Forbidden.'): JsonResponse
    {
        return Api::respondForbidden($msg);
    }
    
    /**
     * @param string|array $msg
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondUnauthorized($msg = 'Unauthorized.'): JsonResponse
    {
        return Api::respondUnauthorized($msg);
    }
    
    /**
     * @param string|array $msg
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondServerError($msg = 'Internal server error.'): JsonResponse
    {
        return Api::respondServerError($msg);
    }
    
    /**
     * @param string|array $msg
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondPaymentRequired($msg = 'Payment required'): JsonResponse
    {
        return Api::respondPaymentRequired($msg);
    }
    
    /**
     * @param string|array $msg
     * @param int $code
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithError($msg = 'Some error occurred', int $code = 500, array $headers = []): JsonResponse
    {
        return Api::respondError($msg, $code, $headers);
    }
    
    /**
     * @param mixed $data
     * @param array $headers
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respond($data, array $headers = [], int $statusCode = 200): JsonResponse
    {
        return Api::respond($data, $headers, $statusCode);
    }
    
    /**
     * @return \Illuminate\Http\Response
     */
    protected function respondSuccess(): Response
    {
        return Api::respondSuccess();
    }
    
    /**
     * @param array $data
     * @param null|array $pagination
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithPagination(array $data, ?array $pagination = null): JsonResponse
    {
        if ($pagination === null) {
            $request = request();
            $pagination['offset'] = $request->get('offset', self::PAGINATE_OFFSET_DEFAULT);
            $pagination['limit'] = $request->get('limit', self::PAGINATE_LIMIT_DEFAULT);
        }
        
        return $this->respond(array_merge($data, [
            'pagination' => [
                'offset' => $pagination['limit'] + $pagination['offset'],
                'limit' => (int)$pagination['limit'],
                'moreAvailable' => count($data['items']) === (int)$pagination['limit']
            ]
        ]));
    }
    
    /**
     * @param array $data
     * @param null|array $pagination
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithPaginatedItems(array $data, ?array $pagination = null): JsonResponse
    {
        return $this->respondWithPagination($data, $pagination);
    }
    
    /**
     * @return User
     */
    /*protected function getCurrentUser(): User
    {
        return request()->get(AuthenticateUser::FIELD_CURRENT_USER);
    }*/
}