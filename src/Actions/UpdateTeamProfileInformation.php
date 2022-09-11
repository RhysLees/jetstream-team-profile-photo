<?php

namespace RhysLees\JetstreamTeamProfilePhoto\Actions;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use RhysLees\JetstreamTeamProfilePhoto\Contracts\UpdatesTeamProfileInformation;

class UpdateTeamProfileInformation implements UpdatesTeamProfileInformation
{
    /**
     * Validate and update the given team's profile information.
     *
     * @param  mixed  $team
     * @param  string  $input
     * @return void
     */
    public function update($team, array $input)
    {
        Validator::make($input, [
            'photo' => 'mimes:jpg,jpeg,png|max:1024',
        ])->validateWithBag('updateTeamProfileInformation');

        if (isset($input['photo'])) {
            $team->updateProfilePhoto($input['photo']);
        }

        Log::info('Updating team profile information', $input);
    }
}
