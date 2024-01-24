<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Interfaces\Users\UserRepositoryInterface;
use App\Models\User;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    use UploadTrait;

    private $Users;

    public function __construct(UserRepositoryInterface $Users)
    {
        $this->Users = $Users;
    }
    public function index()
    {
        return $this->Users->index();
    }

    public function update(Request $request)
    {
        return $this->Users->update($request);
    }
}
