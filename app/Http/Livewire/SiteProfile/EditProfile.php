<?php

namespace App\Http\Livewire\SiteProfile;

use App\Models\SiteProfile;
use Livewire\Component;

class EditProfile extends Component
{
    public $name;
    public $city;
    public $state;
    public $country;
    public $address;
    public $facebook;
    public $twitter;
    public $instagram;
    public $pentrest;
    public $messenger;

    public function mount()
    {
        $data = SiteProfile::firstorFail();
        $this->name = $data->name;
        $this->city = $data->city;
        $this->state = $data->state;
        $this->country = $data->country;
        $this->address = $data->address;
        $this->facebook = $data->facebook_link;
        $this->twitter = $data->twitter_link;
        $this->instagram = $data->instagram_link;
        $this->pentrest = $data->pinterest_link;
        $this->messenger = $data->messenger_link;
    }
    public function update()
    {
        $this->validate([
            'name' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'address' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
            'pentrest' => 'required',
            'messenger' => 'required',
        ]);

        SiteProfile::UpdateorCreate([
            'id' => 1
        ], [
            'name' => $this->name,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
            'address' => $this->address,
            'facebook_link' => $this->facebook,
            'twitter_link' => $this->twitter,
            'instagram_link' => $this->instagram,
            'pinterest_link' => $this->pentrest,
            'messenger_link' => $this->messenger,
        ]);

        session()->flash('message', 'Site Profile pdated successfully');
    }

    public function render()
    {
        return view('livewire.site-profile.edit-profile');
    }
}
