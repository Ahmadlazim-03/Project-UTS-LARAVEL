<div>    
    <div class="row">
        <div class="text-start" style="margin-bottom:20px;">
            <a id="openPopup" class="btn bg-gradient-dark mb-0"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Menu</a>
                <div class="popup" id="popupCard">
                    <div class="popup-content">
                        <form wire:submit="tambahmenu">
                            <span class="close" id="closePopup">&times;</span>
                            <h2>Tambah Menu</h2>                           
                            <label>Nama Menu</label>
                            <div class="mb-3">
                                <input wire:model="MENU_NAME" type="text" class="form-control" placeholder="Masukkan nama menu" aria-label="Email" aria-describedby="email-addon">
                            </div>     
                            <label>Icon</label>
                            <div class="mb-3">
                                <select id="menu" name="menu" class="form-control" wire:model="MENU_ICON">
                                    <option value="">Pilih Icon</option>            
                                    <option value="ni ni-cart">ni ni-cart</option>
                                    <option value="ni ni-world">ni ni-world</option>
                                    <option value="ni ni-paper-diploma">ni ni-paper-diploma</option>
                                    <option value="ni ni-money-coins">ni ni-money-coins</option>
                                    <option value="ni ni-bell-55">ni ni-bell-55</option>
                                    <option value="ni ni-html5">ni ni-html5</option>
                                    <option value="ni ni-credit-card">ni ni-credit-card</option>
                                    <option value="ni ni-key-25">ni ni-key-25</option>
                                    <option value="ni ni-diamond">ni ni-diamond</option>          
                                </select>
                            </div>                                             
                            <label>Class</label>
                            <div class="mb-3">
                                <input wire:model="CLASS" type="text" class="form-control" placeholder="masukkan nama menu kecil semua tanpa spasi" aria-label="Email" aria-describedby="email-addon">
                            </div>
                            <label>Pilih Role</label>         
                            <div class="form-check form-switch mb-3">
                                @foreach( $all_jenis_user as $item)
                                    <input wire:model="tambah_role" class="form-check-input" value="{{ $item->id }}" type="checkbox" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">{{ $item->JENIS_USER }}</label>
                                    <br>
                                @endforeach
                            </div>              
                            <label>Isi Content HTML ( Opsional )</label>
                            <div class="mb-3">
                                <textarea wire:model="ISI_HTML" class="form-control" rows="4" placeholder="Masukkan isi content (opsional)" aria-label="Content"></textarea>
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
            <h6>Menu table</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Menu Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Menu Icon</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Class</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Option</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($data_menu as $item)
                        <tr id="menu-row-{{ $item->id }}">
                            <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{ $item->MENU_NAME }}</h6>
                                </div>
                            </div>
                            </td>
                            <td>
                                <div class="icon icon-shape small-icon-box bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="{{ $item->MENU_ICON }} small-icon" aria-hidden="true"></i>
                                </div>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span>{{ $item->CLASS }}</span>
                            </td>
                            <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">
                                <a id="buttonPopupeditmenu{{ $item->id }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user" style="margin-right:20px;">
                                    Edit
                                </a>
                                <a class="deletemenu text-secondary font-weight-bold text-xs" data-id="{{ $item->id }}">
                                    Hapus
                                </a>
                                <div class="text-start" style="margin-bottom:20px;">
                                    <div class="popup" id="Popupeditmenu{{ $item->id }}">
                                        <div class="popup-content">
                                            <form wire:submit.prevent="editmenu({{ $item->id }})">
                                                <span class="close" id="closePopupeditmenu{{ $item->id }}">&times;</span>
                                                <h2>Edit Menu</h2>                           
                                                <label>Nama Menu</label>
                                                <div class="mb-3">
                                                    <input wire:model="EDIT_MENU_NAME" type="text" class="form-control" placeholder="Masukkan nama menu" aria-label="Email" aria-describedby="email-addon" required>
                                                </div>     
                                                <label>Icon</label>
                                                <div class="mb-3">
                                                    <select id="menu" name="menu" class="form-control" wire:model="EDIT_MENU_ICON" required>
                                                        <option value="">Pilih Icon</option>            
                                                        <option value="ni ni-cart">ni ni-cart</option>
                                                        <option value="ni ni-world">ni ni-world</option>
                                                        <option value="ni ni-paper-diploma">ni ni-paper-diploma</option>
                                                        <option value="ni ni-money-coins">ni ni-money-coins</option>
                                                        <option value="ni ni-bell-55">ni ni-bell-55</option>
                                                        <option value="ni ni-html5">ni ni-html5</option>
                                                        <option value="ni ni-credit-card">ni ni-credit-card</option>
                                                        <option value="ni ni-key-25">ni ni-key-25</option>
                                                        <option value="ni ni-diamond">ni ni-diamond</option>                                                     
                                                    </select>
                                                </div>                                             
                                                <label>Class</label>
                                                <div class="mb-3">
                                                    <input wire:model="EDIT_CLASS" type="text" class="form-control" placeholder="masukkan nama menu kecil semua tanpa spasi" aria-label="Email" aria-describedby="email-addon" required>
                                                </div>
                                                <label>Pilih Role</label>         
                                                <div class="form-check form-switch mb-3">
                                                    @foreach( $all_jenis_user as $item)
                                                        <input wire:model="edit_tambah_role" class="form-check-input" value="{{ $item->id }}" type="checkbox" id="rememberMe">
                                                        <label class="form-check-label" for="rememberMe">{{ $item->JENIS_USER }}</label>
                                                        <br>
                                                    @endforeach
                                                </div>              
                                                <label>Isi Content HTML ( Opsional )</label>
                                                <div class="mb-3">
                                                    <textarea wire:model="ISI_HTML" class="form-control" rows="4" placeholder="Masukkan isi content (opsional)" aria-label="Content"></textarea>
                                                </div>                          
                                                <div class="text-center">
                                                    <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Tambah</button>
                                                </div>
                                            </form>
                                        </div>
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
