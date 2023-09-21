{{-- <div> --}}
    {{-- Stop trying to control. --}}
{{-- </div> --}}

@section('title')
Tambah Data Perbaikan - Trucking Apps v2
@endsection

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form wire:submit="store">

                        <div class="form-group mb-4">
                            <label class="fw-bold">NOMOR</label>
                            <input type="text" class="form-control @error('nomor') is-invalid @enderror" wire:model="nomor" placeholder="Masukkan Nomor Perbaikan">

                            <!-- error message untuk title -->
                            @error('nomor')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="fw-bold">TANGGAL</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" wire:model="tanggal" placeholder="Masukkan Tanggal Perbaikan">

                            <!-- error message untuk content -->
                            @error('tanggal')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="card">
                            <div class="card-header">
                                Data Perbaikan Detail
                            </div>

                            <div class="card-body">
                                <table class="table" id="perbaikan_detail_table">
                                    <thead>
                                    <tr>
                                        <th>Armada</th>
                                        <th>Jumlah</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($orderProducts as $index => $orderProduct)
                                        <tr>
                                            <td>
                                                <select name="orderProducts[{{$index}}][product_id]"
                                                        wire:model="orderProducts.{{$index}}.product_id"
                                                        class="form-control">
                                                    <option value="">-- choose product --</option>
                                                    @foreach ($allProducts as $product)
                                                        <option value="{{ $product->id }}">
                                                            {{ $product->name }} (${{ number_format($product->price, 2) }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number"
                                                       name="orderProducts[{{$index}}][quantity]"
                                                       class="form-control"
                                                       wire:model="orderProducts.{{$index}}.quantity" />
                                            </td>
                                            <td>
                                                <a href="#" wire:click.prevent="removeProduct({{$index}})">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-sm btn-secondary"
                                            wire:click.prevent="addProduct">+ Add Another Product</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br />

                        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
