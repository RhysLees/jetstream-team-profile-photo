<?php

namespace RhysLees\JetstreamTeamProfilePhoto\Http\Livewire;

use App\Models\Team;
use Livewire\Component;
use Livewire\WithFileUploads;
use RhysLees\JetstreamTeamProfilePhoto\Contracts\UpdatesTeamProfileInformation;

class UpdateTeamInformationForm extends Component
{
    use WithFileUploads;

    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];

    /**
     * Th team.
     *
     * @var mixed
     */
    public $team;

    /**
     * The new avatar for the team.
     *
     * @var mixed
     */
    public $photo;

    /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount(Team $team)
    {
        $this->team = $team;
        $this->state = $team->withoutRelations()->toArray();
    }

    /**
     * Update the user's profile information.
     *
     * @param  RhysLees\JetstreamTeamProfilePhoto\Contracts\UpdatesTeamProfileInformation  $updater
     * @return void
     */
    public function updateTeamProfileInformation(UpdatesTeamProfileInformation $updater)
    {
        $this->resetErrorBag();

        $updater->update(
            $this->team,
            $this->photo
            ? array_merge($this->state, ['photo' => $this->photo])
            : $this->state
        );

        if (isset($this->photo)) {
            $route = config(
                'jetstream-team-profile-photo.redirect_route.name',
                'teams.show'
            );

            return redirect()->route($route, $this->team);
        }

        $this->emit('saved');
    }

    /**
     * Delete user's profile photo.
     *
     * @return void
     */
    public function deleteProfilePhoto()
    {
        $this->team->deleteProfilePhoto();
    }

    /**
     * Get the current user of the application.
     *
     * @return mixed
     */
    public function getTeamProperty()
    {
        return $this->team;
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('jetstream-team-profile-photo::teams.update-team-information-form');
    }
}
