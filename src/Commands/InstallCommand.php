<?php

namespace RhysLees\JetstreamTeamProfilePhoto\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class InstallCommand extends Command
{
    public $signature = 'teamprofilephoto:install';

    public $description = 'Install Team Profile Photo Command';

    public function handle(): int
    {
        $this->components->info('Installing Team Profile Photo');

        $this->call('vendor:publish', [
            '--provider' => "RhysLees\JetstreamTeamProfilePhoto\JetstreamTeamProfilePhotoServiceProvider",
            '--tag' => 'jetstream-team-profile-photo-migrations',
        ]);

        $this->installActions();

        $this->components->info('Team Profile Photo Installed');

        return self::SUCCESS;
    }

    public function installActions()
    {
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/app/Actions', app_path('Actions'));
    }
}
