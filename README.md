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
