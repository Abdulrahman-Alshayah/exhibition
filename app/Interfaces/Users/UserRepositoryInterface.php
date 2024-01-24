<?php

namespace App\Interfaces\Users;

interface UserRepositoryInterface
{
    // get User
    public function index();

    // update User
    public function update($request);
}
