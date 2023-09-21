<?php

namespace App\Livewire\Perbaikan;

use App\Models\Perbaikan;
use Livewire\Component;
use Livewire\Attributes\Rule;

class Create extends Component
{

    // nomor
    #[Rule('required', message: 'Masukkan Nomor Perbaikan')]
    public $nomor;

    // tanggal
    #[Rule('required', message: 'Masukkan Tanggal Perbaikan')]
    public $tanggal;

    /**
     * store
     *
     * @return void
     */
    public function store()
    {
        $this->validate();

        //create post
        Perbaikan::create([
            'nomor' => $this->nomor,
            'tanggal' => $this->tanggal,
        ]);

        //flash message
        session()->flash('message', 'Data berhasil disimpan.');

        //redirect
        return redirect()->route('perbaikan.index');
    }

    public function render()
    {
        return view('livewire.perbaikan.create');
    }
}
