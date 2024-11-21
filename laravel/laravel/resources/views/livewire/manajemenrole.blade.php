<div>
    <div class="row">
        <div class="text-start" style="margin-bottom:20px;">
            <a id="Popuprole" class="btn bg-gradient-dark mb-0"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Role</a>
                <div class="popup" id="popupCardrole">
                    <div class="popup-content">
                        <form wire:submit="tambahrole">
                            <span class="close" id="closePopuprole">&times;</span>
                            <h2>Tambah Menu</h2>                           
                            <label>Nama Role</label>
                            <div class="mb-3">
                                <input wire:model="tambah_role" type="text" class="form-control" placeholder="Masukkan nama role" aria-label="Email" aria-describedby="email-addon" required>
                            </div>    
                            <div class="text-center">
                            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Tambah</button>
                            </div> 
                        </form>
                    </div>
                </div>
        </div>
    <div class="col-12">
        <div class="card mb-4">
            <div style="display:flex;">
            </div>
        <div class="card-header pb-0">
            <h6>Role table</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id Role</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Role</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Option</th>
                </tr>
                </thead>
                <tbody>
                    @foreach( $data_role as $item)
                        <tr>
                            <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{ $item->id }}</h6>
                                </div>
                            </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $item->JENIS_USER }}</p>
                            </td>
                            <td style="margin-left:50px;">
                            <span class="text-secondary text-xs font-weight-bold">
                                <a id="buttonPopupeditrole{{ $item->id }}" href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user" style="margin-right:20px;">
                                    Edit
                                </a>
                                <div class="popup" id="Popupeditrole{{ $item->id }}">
                                    <div class="popup-content">
                                        <form wire:submit.prevent="editrole({{ $item->id }})">
                                            <span class="close" id="closePopupeditrole{{ $item->id}}">&times;</span>
                                            <h2>Edit Role</h2>                           
                                            <label>Nama Role</label>
                                            <div class="mb-3">
                                                <input wire:model="edit_role" type="text" class="form-control" placeholder="{{ $item->JENIS_USER }}" required>
                                            </div>                                                                    
                                            <div class="text-center">
                                                <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        </div>
        </div>
    </div>
</div>