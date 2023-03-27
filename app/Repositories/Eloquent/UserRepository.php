<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    /**
     * UserRepository constructor.
     *
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * @param $email
     * @return Model|null
     */
    public function getByEmail($email): ?Model
    {
        return $this->where('email', $email)->first();
    }

    /**
     * @param $model
     * @param $token
     * @return Model
     */
    public function updateApiToken($model, $token): Model
    {
        $model->update(['api_token' => $token]);
        return $model;
    }
}
