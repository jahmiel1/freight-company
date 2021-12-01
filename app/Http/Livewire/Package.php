<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Package as Packages;

class Package extends Component
{
    public $member_id, $type, $weight, $shipper, $shipper_address, $estimated_cost, $tracking_id, $good_id;
    public $isModalOpen = false;

    public function render()
    {
        return view('livewire.package', [
            'goods' => Packages::paginate(4),
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
        $this->member_id = '';
        $this->type = '';
        $this->weight = '';
        $this->shipper = '';
        $this->shipper_address = '';
        $this->estimated_cost = '';
        $this->tracking_id = '';
    }
    
    public function store()
    {
        $this->validate([
            'member_id' => 'required',
            'type' => 'required',
            'weight' => 'required',
            'shipper' => 'required',
            'shipper_address' => 'required',
            'estimated_cost' => 'required',
            'tracking_id' => 'required',
        ]);
    
        Packages::updateOrCreate(['id' => $this->good_id], [
            'member_id' => $this->member_id,
            'type' => $this->type,
            'weight' => $this->weight,
            'shipper' => $this->shipper,
            'shipper_address' => $this->shipper_address,
            'estimated_cost' => $this->estimated_cost,
            'tracking_id' => $this->tracking_id,
        ]);

        session()->flash('message', $this->good_id ? 'Package updated.' : 'Package was created.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $good = Packages::findOrFail($id);
        $this->good_id = $id;
        $this->member_id = $good->member_id;
        $this->type = $good->type;
        $this->weight = $good->weight;
        $this->shipper = $good->shipper;
        $this->shipper_address = $good->shipper_address;
        $this->estimated_cost = $good->estimated_cost;
        $this->tracking_id = $good->tracking_id;
    
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        Packages::find($id)->delete();
        session()->flash('message', 'Package was deleted.');
    }
}
