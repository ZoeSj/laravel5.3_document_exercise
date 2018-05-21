<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * The user repository implementation
     * @var UserRepository
     */

    protected $users;

    /**
     * Create a new controller instance
     *
     * @param UserRepository $users
     * @return void
     */

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * Show the profile for the given user
     *
     * @param int $id
     * @return Response
     */
    public function show($id){
        $user = $this->users->find($id);
        return view('user.profile',['user'=>$user]);
    }
}
/**
 * 在本例中，UserController 需要从数据源获取用户，所以注入了一个可以获取用户的服务UserRepository,其扮演的角色类似使用Eloquent从数据库获取用户信息。注入UserRepository后，我们可以在其基础上封装其他实现，也可以模拟或者创建一个假的UserRepository实现用于测试。
 *
 */
