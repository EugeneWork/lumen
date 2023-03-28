<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

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

    /**
     * @param $model
     * @param $token
     * @return Model
     */
    public function setEmailToken($model, $token): Model
    {
        $model->update(['reset_email_token' => $token]);
        return $model;
    }

    /**
     * @param $token
     * @return Model|null
     */
    public function getByEmailToken($token): ?Model
    {
        return $this->where('reset_email_token', $token)->first();
    }

    /**
     * @param $token
     * @return Model|null
     */
    public function getByApiToken($token): ?Model
    {
        return $this->where('api_token', $token)->first();
    }
}
