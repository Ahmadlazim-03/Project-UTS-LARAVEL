<div>
<div class="row">
        <div class="text-start" style="margin-bottom:20px;">
        <a id="Popupuser" class="btn bg-gradient-dark mb-0"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah User</a>
            <div class="popup" id="Popupcarduser">
                <div class="popup-content">
                    <form wire:submit.prevent="tambahuser">
                        <span class="close" id="closePopupuser">&times;</span>
                        <h2>Tambah User</h2>                           
                        <label>Nama User</label>
                        <div class="mb-3">
                            <input wire:model="name" type="text" class="form-control" placeholder="Masukkan nama user" aria-label="Email" aria-describedby="email-addon">
                        </div>     
                        <label>Email</label>
                        <div class="mb-3">
                            <input wire:model="email" type="email" class="form-control" placeholder="masukkan email user" aria-label="Email" aria-describedby="email-addon">
                        </div>       
                        <label>Password</label>
                        <div class="mb-3">
                            <input wire:model="password" type="text" class="form-control" placeholder="masukkan password" aria-label="Email" aria-describedby="email-addon">
                        </div>                       
                        <label>Role</label>
                        <div class="mb-3">
                            <select id="menu" name="menu" class="form-control" wire:model="ID_JENIS_USER">
                                <option value=""></option>
                                    @foreach( $data_jenis_user as $item)
                                        <option value="{{ $item->id }}">{{ $item->JENIS_USER }}</option>
                                    @endforeach
                            </select>
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
            <div class="card-header pb-0">
                <h6>User table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created at</th>
                        <th class="text-secondary opacity-7">Option</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($data_user as $item)
                        <tr id="user-row-{{ $item->id }}">
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div>
                                        <img src="https://cdn-icons-png.flaticon.com/512/21/21104.png" class="avatar avatar-sm me-3" alt="user1">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ $item->name }}</h6>
                                        <p class="text-xs text-secondary mb-0">{{ $item->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $item->RelationJenisUser->JENIS_USER }}</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                                @if($item->STATUS_USER == "online")
                                    <span class="badge badge-sm bg-gradient-success">Online</span>
                                @elseif($item->STATUS_USER == "offline")
                                    <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                                @endif
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{ $item->created_at }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">
                                    <div class="text-start" style="margin-bottom:20px;">
                                        <a id="buttonPopupedituser{{ $item->id }}" class="text-secondary font-weight-bold "  style="margin-right:20px;">
                                            Edit
                                        </a>
                                        
                                        <a class="hapus-user text-secondary font-weight-bold text-xs" data-id="{{ $item->id }}">
                                            Hapus
                                        </a>

                                        <div class="popup" id="Popupedituser{{ $item->id }}">
                                            <div class="popup-content">
                                                <form wire:submit.prevent="edituser({{ $item->id }})">
                                                    <span class="close" id="closePopupedituser{{ $item->id }}">&times;</span>
                                                    <h2>Edit User</h2>                           
                                                    <label>Nama User</label>
                                                    <div class="mb-3">
                                                        <input wire:model="edit_name" type="text" class="form-control" placeholder="{{ $item->name }}" required>
                                                    </div>     
                                                    <label>Email</label>
                                                    <div class="mb-3">
                                                        <input wire:model="edit_email" type="email" class="form-control" placeholder="{{ $item->email }}" required>
                                                    </div>       
                                                    <label>Password</label>
                                                    <div class="mb-3">
                                                        <input wire:model="edit_password" type="text" class="form-control" placeholder="Masukkan password baru" required>
                                                    </div>                       
                                                    <label>Role</label>
                                                    <div class="mb-3">
                                                        <select id="menu" name="menu" class="form-control" wire:model="edit_ID_JENIS_USER" required>
                                                            <option value=""></option>
                                                            @foreach($data_jenis_user as $item)
                                                                <option value="{{ $item->id }}">{{ $item->JENIS_USER }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>                                                                            
                                                    <div class="text-center">
                                                        <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Edit</button>
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
</div>