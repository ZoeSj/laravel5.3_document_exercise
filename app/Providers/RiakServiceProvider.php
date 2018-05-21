<?php

namespace App\Providers;

use Illuminate\Database\Connection;
use Illuminate\Support\ServiceProvider;

class RiakServiceProvider extends ServiceProvider
{
    /**
     * 服务提供者加是否延迟加载
     * @var bool
     */
    protected $defer = true;
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //如果我们想要在服务提供者中注册视图composer该怎么做？boot方法在所有服务提供者被注册以后才会被调用，这就是说我们可以在其中访问框架已注册的所有其他服务
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Riak\Contracts\Connection',function ($app){
//            return new Connection(config('riak'));
            return new Connection($app['config']['riak']);
        });
        //该服务提供者只定义了一个register方法啊，并使用该方法在服务容器中定义了一个Riak\Contracts\Connection的实现
    }

    /**
     * 获取由服务提供者提供的服务
     *
     * @return array
     */
    public function providers(){
        return [Connection::class];
    }
}
