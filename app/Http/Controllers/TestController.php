<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Library\Services\Contracts\CustomServiceInterface;
use Illuminate\Support\Facades\Cache;
use App\Facade\DemoFacade;
use Illuminate\Support\Collection;
use App\Events\ClearCache;
use App\Jobs\ProcessSendingEmail;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index(CustomServiceInterface $object) {
        $object->doSomething();

        //cache

        $value = Cache::get('name', '');
        $value = Cache::store('file')->get('name');
        $value = Cache::store('redis')->put('name');

        $value = Cache::get('name', function() {
            return DB::table('test')->get();
        });

        if (Cache::has('key')) {
            //
        }

        Cache::increment('key');
        Cache::decrement('key');

        $value = Cache::remember('users', $minutes, function () {
            return DB::table('users')->get();
        });

        $value = Cache::pull('key');

        Cache::put('key', 'value', $minutes);

        $expiresAt = Carbon::now()->addMinutes(10);

        Cache::put('key', 'value', $expiresAt);

        Cache::forever('key', 'value');
        Cache::forget('key');
        Cache::flush();

        $value = cache('key');

        cache(['key' => 'value'], $minutes);

        cache(['key' => 'value'], Carbon::now()->addSeconds(10));

        Cache::tags(['people', 'artists'])->put('John', $john, $minutes);
        Cache::tags(['people', 'authors'])->put('Anne', $anne, $minutes);

        $john = Cache::tags(['people', 'artists'])->get('John');
        $anne = Cache::tags(['people', 'authors'])->get('Anne');

        Cache::tags(['people', 'authors'])->flush();
        Cache::tags('authors')->flush();

        //event

        $arr_caches = ['categories', 'products'];
        event(new ClearCache($arr_caches));


// collection
        $collection = collect(['taylor', 'abigail', null])->map(function ($name) {
            return strtoupper($name);
        })->reject(function ($name) {
                return empty($name);
            });

        $collection = collect([1, 2, 3, 4, 5, 6, 7]);

        $chunks = $collection->chunk(4);

        $chunks->toArray();

// [[1, 2, 3, 4], [5, 6, 7]]

        $collection = collect([[1, 2, 3], [4, 5, 6], [7, 8, 9]]);

        $collapsed = $collection->collapse();

        $collapsed->all();

// [1, 2, 3, 4, 5, 6, 7, 8, 9]

        $collection = collect(['name' => 'Desk', 'price' => 100]);

        $collection->contains('Desk');

// true

        $collection->contains('New York');

// false

        $collection = collect(['name', 'age']);

        $combined = $collection->combine(['George', 29]);

        $combined->all();

// ['name' => 'George', 'age' => 29]

        $collection = collect([1, 2, 3, 4, 5]);

        $collection->contains(function ($value, $key) {
            return $value > 5;
        });

        //builder

        $users = DB::table('users')->get();
        $user = DB::table('users')->where('name', 'John')->first();
        $email = DB::table('users')->where('name', 'John')->value('email');

        $emails = DB::table('users')->pluck('email');

        foreach ($emails as $email) {
            echo $email;
        }

        DB::table('users')->orderBy('id')->chunk(10, function ($users) {
            foreach ($users as $user) {
                //
            }
        });

        $users = DB::table('users')->count();
        $price = DB::table('orders')->max('price');

        $users = DB::table('users')->select('name', 'email')->get();

        $query = DB::table('users')->select('name');

        $users = $query->addSelect('age')->get();

        $users = DB::table('users')
            ->select(DB::raw('count(*) as user_count, status'))
            ->where('status', '<>', 1)
            ->groupBy('status')
            ->get();

        $users = DB::table('users')->where('votes', '=', 100)->get();

        $users = DB::table('users')->where([
            ['status', '=', '1'],
            ['subscribed', '<>', '1'],
        ])->get();

        $users = DB::table('users')
            ->where('votes', '>', 100)
            ->orWhere('name', 'John')
            ->get();


        $role = $request->input('role');

        $users = DB::table('users')
            ->when($role, function ($query) use ($role) {
                return $query->where('role_id', $role);
            })
            ->get();

        DB::table('users')->insert(
            ['email' => 'john@example.com', 'votes' => 0]
        );

        DB::table('users')
            ->where('id', 1)
            ->update(['votes' => 1]);

        DB::table('users')->delete();

        DB::table('users')->where('votes', '>', 100)->delete();

        //paginate

        $users = DB::table('users')->paginate(15);

        return view('user.index', ['users' => $users]);

        $users = DB::table('users')->simplePaginate(15);

        $users = User::where('votes', '>', 100)->paginate(15);


        //helpers
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

    public function register(Request $request)
    {
        ProcessSendingEmail::dispatch($user);
    }
}
