<?php

namespace RhysLees\JetstreamTeamProfilePhoto\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use RhysLees\JetstreamTeamProfilePhoto\JetstreamTeamProfilePhotoServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'RhysLees\\JetstreamTeamProfilePhoto\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            JetstreamTeamProfilePhotoServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_jetstream-team-profile-photo_table.php.stub';
        $migration->up();
        */
    }
}
