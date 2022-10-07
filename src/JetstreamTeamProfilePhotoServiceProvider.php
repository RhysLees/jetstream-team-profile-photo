<?php

namespace RhysLees\JetstreamTeamProfilePhoto;

use App\Actions\JetstreamTeamProfilePhoto\UpdateTeamProfileInformation;
use Livewire\Livewire;
use RhysLees\JetstreamTeamProfilePhoto\Commands\InstallCommand;
use RhysLees\JetstreamTeamProfilePhoto\Contracts\UpdatesTeamProfileInformation;
use RhysLees\JetstreamTeamProfilePhoto\Http\Livewire\UpdateTeamInformationForm;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class JetstreamTeamProfilePhotoServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('jetstream-team-profile-photo')
            ->hasViews()
            ->hasCommand(InstallCommand::class)
            ->hasMigration('add_profile_photo_path_to_teams');
    }

        public function boot()
        {
            parent::boot();

            if (! $this->app->runningInConsole()) {
                Livewire::component('jetstream-team-profile-photo::update-team-infomation-form', UpdateTeamInformationForm::class);
            }
        }

        public function register()
        {
            parent::register();

            $this->app->bind(
                UpdatesTeamProfileInformation::class,
                UpdateTeamProfileInformation::class
            );
        }
}
