# This is my package jetstream-team-profile-photo

This package adds team profile photos to jetstream

`Note: Current only supports livewire stack`

## Installation

You can install the package via composer:

```bash
composer require rhyslees/jetstream-team-profile-photo
```

```bash
php artian teamprofilephoto:install
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="jetstream-team-profile-photo-migrations"
php artisan migrate
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="jetstream-team-profile-photo-views"
```

Optionally, you can publish the config using

```bash
php artisan vendor:publish --tag="jetstream-team-profile-photo-config"
```

Add the `HasTeamProfilePhotos` trait to your Team model:

```php
use RhysLees\JetstreamTeamProfilePhoto\Traits\HasTeamProfilePhoto;

class Team extends JetstreamTeam
{
    use HasTeamProfilePhoto;
    
    ...
}
```
Modify `resources/views/teams/show.blade.php` as follows:

```diff
@livewire('teams.update-team-name-form', ['team' => $team])

+ <x-jet-section-border />

+ @livewire('jetstream-team-profile-photo::update-team-infomation-form', ['team' => $team])
```

## Modifying the redirect route

If you want to change the redirect route after updating the team profile photo, you can publish the config file and change the `redirect_route.name` value.


## Adding additional redirect route parameters

If you want to add additional parameters to the redirect route, you can specify them in the `@linvewire` directive as follows:

```diff
- @livewire('jetstream-team-profile-photo::update-team-infomation-form', ['team' => $team])
+ @livewire('jetstream-team-profile-photo::update-team-infomation-form', ['team' => $team, 'routeParameters' => ['foo' => 'bar']])
```

For route parameters to be passed to the redirect route, you will need to pass them to the view where you implement the `@livewire('jetstream-team-profile-photo::update-team-infomation-form')` directive.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Rhys Lees](https://github.com/RhysLees)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
