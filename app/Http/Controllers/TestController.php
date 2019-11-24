<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Library\Services\Contracts\CustomServiceInterface;
use Illuminate\Support\Facades\Cache;
use App\Facade\DemoFacade;

class TestController extends Controller
{
    public function index(CustomServiceInterface $object) {
        $object->doSomething();

        $array = array_add(['name' => 'Desk'], 'price', 100);
        $array = array_collapse([[1, 2, 3], [4, 5, 6], [7, 8, 9]]);
        list($keys, $values) = array_divide(['name' => 'Desk']);
        $array = array_dot(['foo' => ['bar' => 'baz']]); // ['foo.bar' => 'baz'];

        $array = ['name' => 'Desk', 'price' => 100];

        $array = array_except($array, ['price']);

        $last = last($array);

        $path = app_path(); //app dir
        $path = app_path('Http/Controllers/TestController.php');

        $path = base_path();

        $path = base_path('vendor/bin');
        $path = config_path();
        $path = database_path();

        //string
        $camel = camel_case('foo_bar'); // fooBar
        $class = class_basename('Foo\Bar\Baz'); // Baz

        $value = ends_with('This is my name', 'name'); // true
        $value = str_limit('The PHP framework for web artisans.', 7);
        $value = str_after('This is: a test', 'This is:'); // ' a test'

        $url = action('HomeController@getIndex');
        $url = action('UserController@profile', ['id' => 1]);
        $url = asset('img/photo.jpg');

        $url = route('routeName');
        $url = route('routeName', ['id' => 1], false);

        $value = cache('key');

        $value = cache('key', 'default');

        $value = config('app.timezone');

        $value = config('app.timezone', $default);
        {{ csrf_field(); }}

        $token = csrf_token();
        dd($value);

        $env = env('APP_ENV');
        $env = env('APP_ENV', 'production');
    }

    public function eventFacadeAction() {
        DemoFacade::doSomething();
    }
}
