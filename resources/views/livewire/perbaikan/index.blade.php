{{-- <div> --}}
    {{-- In work, do what you enjoy. --}}
{{-- </div> --}}

@section('title')
Data Perbaikan - Trucking Apps v2
@endsection

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">

            <!-- flash message -->
            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            <!-- end flash message -->

            <a href="/perbaikan/create" wire:navigate class="btn btn-md btn-success rounded shadow-sm border-0 mb-3">TAMBAH DATA PERBAIKAN</a>
            <div class="card border-0 rounded shadow-sm">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th scope="col">Nomor</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col" style="width: 15%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($perbaikan as $row)
                            <tr>
                                <td>{{ $row->nomor }}</td>
                                <td>{!! $row->tanggal !!}</td>
                                <td class="text-center">
                                    <a href="/perbaikan/edit/{{ $row->id }}" wire:navigate class="btn btn-sm btn-primary">EDIT</a>
                                    {{-- <button class="btn btn-sm btn-danger">DELETE</button> --}}
                                    <button wire:click="destroy({{ $row->id }})" class="btn btn-sm btn-danger">DELETE</button>
                                </td>
                            </tr>
                            @empty
                            <div class="alert alert-danger">
                                Data Perbaikan belum tersedia.
                            </div>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $perbaikan->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>
