<?php

namespace App\Livewire\Facilities;

use Livewire\Component;

class Index extends Component
{
    public $term = '';
    public function render()
    {
        $data['facilites'] = (new \App\Http\Controllers\Facility\ReadController)->getFacilities($this->term);
        return view('livewire.facilities.index', $data);
    }
}
