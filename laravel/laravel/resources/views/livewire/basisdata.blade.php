<div>
    <div style="display: flex; justify-content: center;">
        <a id="PopuproleDDL" class="btn bg-gradient-dark mb-0" style="margin-right: 10px; text-align: center;">
            &nbsp;&nbsp;DDL
        </a>
        <a id="PopuproleDML" class="btn bg-gradient-dark mb-0" style="text-align: center;">
            &nbsp;&nbsp;DML
        </a>
    </div>

    <div class="card" id="CardDDL" style="margin-top: 30px;">
        <div style="margin: 20px;">
            <button onclick="alert('Tabel Dalam Proses Query Mohon Tunggu !!!')" wire:click="create_table_satuan" class="btn bg-gradient-info mb-0" style="margin-right: 10px; text-align: center;">
                &nbsp;&nbsp;Create Satuan
            </button>
            <button onclick="alert('Tabel Berhasil Dihapus')" wire:click="delete_table_satuan" class="btn bg-gradient-danger mb-0" style="margin-right: 10px; text-align: center;">
                &nbsp;&nbsp;Drop Satuan
            </button>

            @if(isset($satuan))
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mt-2">
                            <thead>
                                <tr>
                                    @foreach(Schema::getColumnListing('satuan') as $item)
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{ $item }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($satuan as $item)
                                    <tr>
                                        @foreach( Schema::getColumnListing('satuan') as $colom)
                                            <td class="align-middle text-center">
                                                {{ $item->$colom }}
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            <button  onclick="alert('Tabel Dalam Proses Query Mohon Tunggu !!!')" wire:click="create_table_barang" class="btn bg-gradient-info mb-0" style="margin-right: 10px; text-align: center;">
                &nbsp;&nbsp;Create Barang
            </button>
            <button onclick="alert('Tabel Berhasil Dihapus')" wire:click="delete_table_barang" class="btn bg-gradient-danger mb-0" style="margin-right: 10px; text-align: center;">
                &nbsp;&nbsp;Drop Barang
            </button>

            @if(isset($barang)) 
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mt-2">
                            <thead>
                                <tr>
                                    @foreach(Schema::getColumnListing('barang') as $item)
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{ $item }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($barang as $item)
                                    <tr>
                                        @foreach(Schema::getColumnListing('barang') as $colom)
                                            <td class="align-middle text-center">
                                                {{ $item->$colom }}
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            <button  onclick="alert('Tabel Dalam Proses Query Mohon Tunggu !!!')" wire:click="create_table_kartu_stok" class="btn bg-gradient-info mb-0" style="margin-right: 10px; text-align: center;">
                &nbsp;&nbsp;Create Kartu Stok
            </button>
            <button onclick="alert('Tabel Berhasil Dihapus')" wire:click="delete_table_kartu_stok" class="btn bg-gradient-danger mb-0" style="margin-right: 10px; text-align: center;">
                &nbsp;&nbsp;Drop Kartu Stok
            </button>

            @if(isset($kartustok)) 
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mt-2">
                            <thead>
                                <tr>
                                    @foreach(Schema::getColumnListing('kartustok') as $item)
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{ $item }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kartustok as $item)
                                    <tr>
                                        @foreach(Schema::getColumnListing('kartustok') as $colom)
                                            <td class="align-middle text-center">
                                                {{ $item->$colom }}
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            <button  onclick="alert('Tabel Dalam Proses Query Mohon Tunggu !!!')" wire:click="create_table_vendor" class="btn bg-gradient-info mb-0" style="margin-right: 10px; text-align: center;">
                &nbsp;&nbsp;Create Vendor
            </button>
            <button onclick="alert('Tabel Berhasil Dihapus')" wire:click="delete_table_vendor" class="btn bg-gradient-danger mb-0" style="margin-right: 10px; text-align: center;">
                &nbsp;&nbsp;Drop Vendor
            </button>     

            @if(isset($vendor)) 
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mt-2">
                            <thead>
                                <tr>
                                    @foreach(Schema::getColumnListing('vendor') as $item)
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{ $item }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vendor as $item)
                                    <tr>
                                        @foreach(Schema::getColumnListing('vendor') as $colom)
                                            <td class="align-middle text-center">
                                                {{ $item->$colom }}
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            <button  onclick="alert('Tabel Dalam Proses Query Mohon Tunggu !!!')" wire:click="create_table_pengadaan" class="btn bg-gradient-info mb-0" style="margin-right: 10px; text-align: center;">
                &nbsp;&nbsp;Create Pengadaan
            </button>
            <button onclick="alert('Tabel Berhasil Dihapus')" wire:click="delete_table_pengadaan" class="btn bg-gradient-danger mb-0" style="margin-right: 10px; text-align: center;">
                &nbsp;&nbsp;Drop Pengadaan
            </button>

            @if(isset($pengadaan)) 
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mt-2">
                            <thead>
                                <tr>
                                    @foreach(Schema::getColumnListing('pengadaan') as $item)
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{ $item }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pengadaan as $item)
                                    <tr>
                                        @foreach(Schema::getColumnListing('pengadaan') as $colom)
                                            <td class="align-middle text-center">
                                                {{ $item->$colom }}
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            <button  onclick="alert('Tabel Dalam Proses Query Mohon Tunggu !!!')" wire:click="create_table_detailpengadaan" class="btn bg-gradient-info mb-0" style="margin-right: 10px; text-align: center;">
                &nbsp;&nbsp;Create Detail Pengadaan
            </button>
            <button onclick="alert('Tabel Berhasil Dihapus')" wire:click="delete_table_detailpengadaan" class="btn bg-gradient-danger mb-0" style="margin-right: 10px; text-align: center;">
                &nbsp;&nbsp;Drop Detail Pengadaan
            </button>

            @if(isset($detailpengadaan)) 
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mt-2">
                            <thead>
                                <tr>
                                    @foreach(Schema::getColumnListing('detailpengadaan') as $item)
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{ $item }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($detailpengadaan as $item)
                                    <tr>
                                        @foreach(Schema::getColumnListing('detailpengadaan') as $colom)
                                            <td class="align-middle text-center">
                                                {{ $item->$colom }}
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            <button  onclick="alert('Tabel Dalam Proses Query Mohon Tunggu !!!')" wire:click="create_table_penerimaan" class="btn bg-gradient-info mb-0" style="margin-right: 10px; text-align: center;">
                &nbsp;&nbsp;Create Penerimaan
            </button>
            <button onclick="alert('Tabel Berhasil Dihapus')" wire:click="delete_table_penerimaan" class="btn bg-gradient-danger mb-0" style="margin-right: 10px; text-align: center;">
                &nbsp;&nbsp;Drop Penerimaan
            </button>

            @if(isset($penerimaan)) 
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mt-2">
                            <thead>
                                <tr>
                                    @foreach(Schema::getColumnListing('penerimaan') as $item)
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{ $item }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($penerimaan as $item)
                                    <tr>
                                        @foreach(Schema::getColumnListing('penerimaan') as $colom)
                                            <td class="align-middle text-center">
                                                {{ $item->$colom }}
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            <button  onclick="alert('Tabel Dalam Proses Query Mohon Tunggu !!!')" wire:click="create_table_detailpenerimaan" class="btn bg-gradient-info mb-0" style="margin-right: 10px; text-align: center;">
                &nbsp;&nbsp;Create Detail Penerimaan
            </button>
            <button onclick="alert('Tabel Berhasil Dihapus')" wire:click="delete_table_detailpenerimaan" class="btn bg-gradient-danger mb-0" style="margin-right: 10px; text-align: center;">
                &nbsp;&nbsp;Drop Detail Penerimaan
            </button>

            @if(isset($detailpenerimaan)) 
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mt-2">
                            <thead>
                                <tr>
                                    @foreach(Schema::getColumnListing('detailpenerimaan') as $item)
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{ $item }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($detailpenerimaan as $item)
                                    <tr>
                                        @foreach(Schema::getColumnListing('detailpenerimaan') as $colom)
                                            <td class="align-middle text-center">
                                                {{ $item->$colom }}
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            <button  onclick="alert('Tabel Dalam Proses Query Mohon Tunggu !!!')" wire:click="create_table_retur" class="btn bg-gradient-info mb-0" style="margin-right: 10px; text-align: center;">
                &nbsp;&nbsp;Create Retur
            </button>
            <button onclick="alert('Tabel Berhasil Dihapus')" wire:click="delete_table_retur" class="btn bg-gradient-danger mb-0" style="margin-right: 10px; text-align: center;">
                &nbsp;&nbsp;Drop Retur
            </button>

            @if(isset($retur)) 
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mt-2">
                            <thead>
                                <tr>
                                    @foreach(Schema::getColumnListing('retur') as $item)
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{ $item }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($retur as $item)
                                    <tr>
                                        @foreach(Schema::getColumnListing('retur') as $colom)
                                            <td class="align-middle text-center">
                                                {{ $item->$colom }}
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            <button  onclick="alert('Tabel Dalam Proses Query Mohon Tunggu !!!')" wire:click="create_table_detailretur" class="btn bg-gradient-info mb-0" style="margin-right: 10px; text-align: center;">
                &nbsp;&nbsp;Create Detail Retur
            </button>
            <button onclick="alert('Tabel Berhasil Dihapus')" wire:click="delete_table_detailretur" class="btn bg-gradient-danger mb-0" style="margin-right: 10px; text-align: center;">
                &nbsp;&nbsp;Drop Detail Retur
            </button>

            @if(isset($detailretur)) 
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mt-2">
                            <thead>
                                <tr>
                                    @foreach(Schema::getColumnListing('detailretur') as $item)
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{ $item }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($detailretur as $item)
                                    <tr>
                                        @foreach(Schema::getColumnListing('detailretur') as $colom)
                                            <td class="align-middle text-center">
                                                {{ $item->$colom }}
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            <button  onclick="alert('Tabel Dalam Proses Query Mohon Tunggu !!!')" wire:click="create_table_penjualan" class="btn bg-gradient-info mb-0" style="margin-right: 10px; text-align: center;">
                &nbsp;&nbsp;Create Penjualan
            </button>
            <button onclick="alert('Tabel Berhasil Dihapus')" wire:click="delete_table_penjualan" class="btn bg-gradient-danger mb-0" style="margin-right: 10px; text-align: center;">
                &nbsp;&nbsp;Drop Penjualan
            </button>

            @if(isset($penjualan)) 
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mt-2">
                            <thead>
                                <tr>
                                    @foreach(Schema::getColumnListing('penjualan') as $item)
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{ $item }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($penjualan as $item)
                                    <tr>
                                        @foreach(Schema::getColumnListing('penjualan') as $colom)
                                            <td class="align-middle text-center">
                                                {{ $item->$colom }}
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            <button  onclick="alert('Tabel Dalam Proses Query Mohon Tunggu !!!')" wire:click="create_table_detailpenjualan" class="btn bg-gradient-info mb-0" style="margin-right: 10px; text-align: center;">
                &nbsp;&nbsp;Create Detail Penjualan
            </button>
            <button onclick="alert('Tabel Berhasil Dihapus')" wire:click="delete_table_detailpenjualan" class="btn bg-gradient-danger mb-0" style="margin-right: 10px; text-align: center;">
                &nbsp;&nbsp;Drop Detail Penjualan
            </button>

            @if(isset($detailpenjualan)) 
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mt-2">
                            <thead>
                                <tr>
                                    @foreach(Schema::getColumnListing('detailpenjualan') as $item)
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{ $item }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($detailpenjualan as $item)
                                    <tr>
                                        @foreach(Schema::getColumnListing('detailpenjualan') as $colom)
                                            <td class="align-middle text-center">
                                                {{ $item->$colom }}
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            <button  onclick="alert('Tabel Dalam Proses Query Mohon Tunggu !!!')" wire:click="create_table_marginpenjualan" class="btn bg-gradient-info mb-0" style="margin-right: 10px; text-align: center;">
                &nbsp;&nbsp;Create Margin Penjualan
            </button>
            <button onclick="alert('Tabel Berhasil Dihapus')" wire:click="delete_table_marginpenjualan" class="btn bg-gradient-danger mb-0" style="margin-right: 10px; text-align: center;">
                &nbsp;&nbsp;Drop Margin Penjualan
            </button>

            @if(isset($marginpenjualan)) 
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mt-2">
                            <thead>
                                <tr>
                                    @foreach(Schema::getColumnListing('marginpenjualan') as $item)
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{ $item }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($marginpenjualan as $item)
                                    <tr>
                                        @foreach(Schema::getColumnListing('marginpenjualan') as $colom)
                                            <td class="align-middle text-center">
                                                {{ $item->$colom }}
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="card" id="CardDML" style="margin-top: 30px; padding: 20px;">
        <h5>Query DML</h5>
        <form wire:submit="AddQuery">
            <textarea wire:model="Query" class="form-control" style="width: 100%; height: 200px;" required></textarea>
            <div class="d-flex justify-content-between">
                <button class="btn bg-gradient-success mt-3" style="text-align: center;">
                    Run
                </button>
            </div>
        </form>
    </div>
</div>
