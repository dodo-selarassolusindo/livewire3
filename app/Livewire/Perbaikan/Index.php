<?php

namespace App\Livewire\Perbaikan;

use App\Models\Perbaikan;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        //destroy
        Perbaikan::destroy($id);

        //flash message
        session()->flash('message', 'Data berhasil dihapus.');

        //redirect
        return redirect()->route('perbaikan.index');
    }

    public function render()
    {
        return view('livewire.perbaikan.index', [
            'perbaikan' => Perbaikan::latest()->paginate(5)
        ]);
    }
}
