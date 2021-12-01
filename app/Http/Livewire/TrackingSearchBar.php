<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tracking;


class TrackingSearchBar extends Component
{
    public $query, $trackings, $highlightIndex;


    public function mount() {

        $this->reset();
    }

    // public function reset() {

    //     $this->query = '';
    //     $this->trackings = [];
    //     $this->highlightIndex = 0;
    // }

    public function incrementHighlight() {

        if ($this->highlightIndex == count($this->trackings) -1) {

            $this->highlightIndex = 0;

            return;
            
        }

        $this->highlightIndex++;
    }

    public function decrementHighlight() {

        if ($this->highlightIndex == 0) {

            $this->highlightIndex = count($this->trackings) -1;

            return;
            
        }

        $this->highlightIndex--;
    }

    public function selectTracking() {

        $tracking = $this->trackings[$this->highlight] ?? null;

        if ($tracking) {


            $this->redirect(route('show-tracking'. $trackingId));

        }
    }

    public function render()
    {
        return view('livewire.tracking-search-bar');
    }
    public function updatedQuery() {

        // sleep(2);

        $this->trackings = Tracking::where('tracking_number', 'like', '%' . $this->query . '%')

        ->get()

        ->toArray();

    }
}
