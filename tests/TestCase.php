<?php

namespace Cierrateam\Billing\Tests;

use App\User;
use Cierrateam\Billing\BillingServiceProvider;
use Exception;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Exceptions\Handler;
use Orchestra\Testbench\BrowserKit\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{

    protected $withDummy = true;

    public function setUp()
    {
        parent::setUp();

        if (app()->version() < 5.4) {
            $this->loadMigrationsFrom([
                                          '--realpath' => realpath(__DIR__.'/migrations'),
                                      ]);
        }

        if (!is_dir(base_path('routes'))) {
            mkdir(base_path('routes'));
        }

        if (!file_exists(base_path('routes/api.php'))) {
            file_put_contents(
                base_path('routes/api.php'),
                "<?php Route::get('/', function () {return view('welcome');});"
            );
        }

        $this->app->make('Illuminate\Contracts\Http\Kernel')->pushMiddleware('Illuminate\Session\Middleware\StartSession');
        $this->app->make('Illuminate\Contracts\Http\Kernel')->pushMiddleware('Illuminate\View\Middleware\ShareErrorsFromSession');

        $this->install();
    }

    protected function getPackageProviders($app)
    {
        return [
            BillingServiceProvider::class,
        ];
    }

    public function tearDown()
    {
        //parent::tearDown();

        //$this->artisan('migrate:reset');
    }

    /**
     * Define environment setup.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);

        // Setup Cierra configuration

        // Setup Authentication configuration
        $app['config']->set('auth.providers.users.model', User::class);
    }

    protected function install()
    {
        if (app()->version() >= 5.4) {
            $migrator = app('migrator');

            if (!$migrator->repositoryExists()) {
                $this->artisan('migrate:install');
            }

            $migrator->run([realpath(__DIR__.'/migrations')]);

            $this->artisan('migrate', ['--path' => realpath(__DIR__.'/migrations')]);
        }

//        $this->artisan('Cierra:install', ['--with-dummy' => $this->withDummy]);

        if (file_exists(base_path('routes/api.php'))) {
            require base_path('routes/api.php');
        }
    }

    public function disableExceptionHandling()
    {
        $this->app->instance(ExceptionHandler::class, new DisabledTestException());
    }

    /**
     * Visit the given URI with a GET request.
     *
     * @param string $uri
     *
     * @return $this
     */
    public function visit($uri)
    {
        if (is_callable('parent::visit')) {
            return parent::visit($uri);
        }

        return $this->get($uri);
    }

    /**
     * Assert that a given string is seen on the current HTML.
     *
     * @param string $text
     * @param bool   $negate
     *
     * @return $this
     */
    public function see($text, $negate = false)
    {
        if (is_callable('parent::see')) {
            return parent::see($text);
        }

        if ($negate) {
            return $this->assertDontSee($text);
        }

        return $this->assertSee($text);
    }
}

class DisabledTestException extends Handler
{

    public function __construct()
    {
    }

    public function report(Exception $e)
    {
    }

    public function render($request, Exception $e)
    {
        throw $e;
    }
}
