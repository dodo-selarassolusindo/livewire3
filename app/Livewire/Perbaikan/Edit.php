<?php

namespace App\Livewire\Perbaikan;

use App\Models\Perbaikan;
use Livewire\Component;
use Livewire\Attributes\Rule;

class Edit extends Component
{

    //id post
    public $postID;

    #[Rule('required', message: 'Masukkan Nomor Perbaikan')]
    public $nomor;

    #[Rule('required', message: 'Masukkan Tanggal Perbaikan')]
    public $tanggal;

    public function mount($id)
    {
        //get post
        $perbaikan = Perbaikan::find($id);

        //assign
        $this->postID   = $perbaikan->id;
        $this->nomor    = $perbaikan->nomor;
        $this->tanggal  = $perbaikan->tanggal;
    }

    /**
     * update
     *
     * @return void
     */
    public function update()
    {
        $this->validate();

        //get post
        $perbaikan = Perbaikan::find($this->postID);

        //update post
        $perbaikan->update([
            'nomor' => $this->nomor,
            'tanggal' => $this->tanggal,
        ]);

        //flash message
        session()->flash('message', 'Data berhasil diupdate.');

        //redirect
        return redirect()->route('perbaikan.index');
    }

    public function render()
    {
        return view('livewire.perbaikan.edit');
    }
}
