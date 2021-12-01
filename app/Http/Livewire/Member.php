<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Member as Members;

class Member extends Component
{
    public $name_f, $trn, $el_mail, $numb, $add, $mouse_id;
    public $isModalOpen = false;

    public function render()
    {
        return view('livewire.member', [
            'mouses' => Members::paginate(4),
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
        $this->name_f = '';
        $this->trn = '';
        $this->el_mail = '';
        $this->numb = '';
        $this->add = '';
    }
    
    public function store()
    {
        $this->validate([
            'name_f' => 'required',
            'trn' => 'required',
            'el_mail' => 'required',
            'numb' => 'required',
            'add' => 'required',
        ]);
    
        Members::updateOrCreate(['id' => $this->mouse_id], [
            'name_f' => $this->name_f,
            'trn' => $this->trn,
            'el_mail' => $this->el_mail,
            'numb' => $this->numb,
            'add' => $this->add,
        ]);

        session()->flash('message', $this->mouse_id ? 'Members updated.' : 'Members was created.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $mouse = Members::findOrFail($id);
        // $this->mouse_id = $id;
        $this->name_f = $mouse->name_f;
        $this->trn = $mouse->trn;
        $this->el_mail = $mouse->el_mail;
        $this->numb = $mouse->numb;
        $this->add = $mouse->add;
    
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        Members::find($id)->delete();
        session()->flash('message', 'Member was deleted.');
    }
}
