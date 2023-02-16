<?php

namespace RhysLees\JetstreamTeamProfilePhoto\Contracts;

interface UpdatesTeamProfileInformation
{
    /**
     * Validate and update the given team's profile photo.
     *
     * @param  mixed  $team
     * @return void
     */
    public function update($team, array $input);
}
