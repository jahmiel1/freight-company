<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Branch as Branches;

class Branch extends Component
{
    public $branch_name, $branch_address, $tree_id;
    public $isModalOpen = false;

    public function render()
    {
        return view('livewire.branch', [
            'trees' => Branches::paginate(4),

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
        $this->branch_name = '';
        $this->branch_address = '';
    }
    
    public function store()
    {
        $this->validate([
            'branch_name' => 'required',
            'branch_address' => 'required',
        ]);
    
        Branches::updateOrCreate(['id' => $this->tree_id], [
            'branch_name' => $this->branch_name,
            'branch_address' => $this->branch_address,
        ]);

        session()->flash('message', $this->tree_id ? 'Branch updated.' : 'Branch was created.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $tree = Branches::findOrFail($id);
        $this->tree_id = $id;
        $this->branch_name = $tree->branch_name;
        $this->branch_address = $tree->branch_address;
    
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        Branches::find($id)->delete();
        session()->flash('message', 'Branch was deleted.');
    }
}
