<?php
declare(strict_type=1);

namespace App\Models;

use App\Core\Auth\Interfaces\UserModelInterface;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * Class User
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $rememberToken
 *
 * @property-read \Carbon\Carbon $created_at
 * @property-read \Carbon\Carbon $updated_at
 *
 */
class User extends Model implements UserModelInterface
{
    const TABLE_NAME = 'users';
    
    /**
     * @var string
     */
    protected $table = self::TABLE_NAME;
    
    /**
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];
    
    /**
     * @var array
     */
    protected $casts = [
        'id' => 'int',
    ];
    
    /*
    |--------------------------------------------------------------------------
    |  Relations
    |--------------------------------------------------------------------------
    */
    
    
    public function add(array $data): bool
    {
        // TODO: Implement add() method.
        return true;
    }
    
    public function getById(int $userId): self
    {
        // TODO: Implement getById() method.
        return $this;
    }
    
    public function pushData(array $data): self
    {
        // TODO: Implement pushData() method.
        return $this;
    }
    
    public function deleteUser(): bool
    {
        // TODO: Implement deleteUser() method.
        return true;
    }
    
    public function deleteById(int $id): bool
    {
        // TODO: Implement deleteById() method.
        return true;
    }
    
}