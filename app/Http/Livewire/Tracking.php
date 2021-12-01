<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Tracking as Trackings;

class Tracking extends Component
{
    public $member_id, $branch_name, $tracking_nunber, $truck_id, $package_type;
    public $isModalOpen = false;

    public function render()
    {
        return view('livewire.tracking', [
            'trucks' => Trackings::paginate(4),
        ]);
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    private function resetCreateForm(){
        $this->tracking_number = '';
    }
    
    public function store()
    {
        $this->validate([
            'tracking_number' => 'required',
            'member_id' => 'required',
            'package_type' => 'required',
            'branch_name' => 'required',
        ]);
    
        Trackings::updateOrCreate(['id' => $this->truck_id], [
            'tracking_number' => $this->tracking_number,
            'member_id' => $this->member_id,
            'package_type' => $this->package_type,
            'branch_name' => $this->branch_name,
        ]);

        session()->flash('message', $this->truck_id ? 'Tracking updated.' : 'Tracking was created.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $truck = Trackings::findOrFail($id);
        $this->truck_id = $id;
        $this->tracking_number = $truck->tracking_number;
        $this->member_id = $truck->member_id;
        $this->package_type = $truck->package_type;
        $this->branch_name = $truck->branch_name;
    
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        Trackings::find($id)->delete();
        session()->flash('message', 'Tracking was deleted.');
    }
}
