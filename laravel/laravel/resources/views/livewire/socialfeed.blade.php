<div>
    <div class="comment-section">
        <div class="comment-header">
            <img src="https://w7.pngwing.com/pngs/178/595/png-transparent-user-profile-computer-icons-login-user-avatars-thumbnail.png" alt="User Avatar">
            <div>
                <span class="username">{{ Auth::user()->name }}</span>
            </div>
        </div>
    <div class="reply-section">
        <form wire:submit="tambahpostingan">
            <textarea wire:model="TEXT" placeholder="Posting Sesuatu..."></textarea>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" id="show_upload_gambar">
                <label class="form-check-label" for="rememberMe">Tambah Gambar</label>
            </div>
            <div class="mb-3" id="upload_gambar">
                <input wire:model="GAMBAR" type="text" class="form-control" placeholder="Masukkan Link Image Addres">
            </div>
            <button class="btn btn-primary">Post</button>
        </form>
    </div>
    <hr>




    @foreach($data_posting as $data)
    <div class="comment-header">
        <img src="https://w7.pngwing.com/pngs/178/595/png-transparent-user-profile-computer-icons-login-user-avatars-thumbnail.png" alt="User Avatar">
        <div>
            <span class="username">{{ $data->PENULIS }}</span>
            <span class="time">{{ $data->updated_at }}</span>
        </div>
    </div>
    <div class="comment-body">
        <p>{{ $data->TEXT }}</p>
        @if( $data->GAMBAR !== null)
            <img src="{{ $data->GAMBAR }}" alt="Comment image">
        @endif
    </div>
    <div class="comment-actions">
        <button data-id="{{ $data->id }}" class="like-btn">
            <i class="fas fa-thumbs-up"></i>{{ $data->LIKE }}
        </button>
        <button data-id="{{ $data->id }}" class="dislike-btn">
            <i class="fas fa-thumbs-down"></i>{{ $data->DISLIKE }}
        </button>
        <button class="reply-btn" id="show-balas{{ $data->id }}">
            <i class="fas fa-reply"></i>Balas
        </button>
    </div>
    <div style="margin-top:13px; color:blue;">
        <p class="show-komen{{ $data->id }}">Lihat {{ $data_komentar->Where("ID_POSTING",$data->id)->count() }} Balasan</p>
    </div>



    <!-- Reply section initially hidden -->
    <div class="balas reply-section" id="balas{{ $data->id }}" style="display:none;">
        <div class="comment-header">
            <img src="https://w7.pngwing.com/pngs/178/595/png-transparent-user-profile-computer-icons-login-user-avatars-thumbnail.png" alt="User Avatar">
            <div>
                <span class="username">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <form wire:submit="balaspostingan({{ $data->id }})">
            <textarea wire:model="KOMEN_TEXT" placeholder="Balas Postingan..."></textarea>
            <button class="btn btn-primary">Reply</button>
        </form>
    </div>
    
    <div class="komen{{ $data->id }}">
        @foreach( $data_komentar->where('ID_POSTING' , $data->id) as $item)
            <div class="reply-section">
                <div class="comment-header">
                    <img src="https://w7.pngwing.com/pngs/178/595/png-transparent-user-profile-computer-icons-login-user-avatars-thumbnail.png" alt="User Avatar">
                    <div>
                        <span class="username">{{ $item->PENULIS }}</span>
                        <span class="time">{{ $item->created_at }}</span>
                    </div>
                </div>
                <div class="comment-body">
                    <p>{{ $item->TEXT }}</p>
                </div>
                <div class="comment-actions">
                    <button data-id="{{ $item->id }}" class="like-btn like-btn-komen"><i class="fas fa-thumbs-up"></i>{{ $item->LIKE }}</button>
                    <button data-id="{{ $item->id }}" class="dislike-btn dislike-btn-komen"><i class="fas fa-thumbs-down"></i>{{ $item->DISLIKE }}</button>
                </div>
            </div>
        @endforeach
    </div>

    <hr>
@endforeach
   
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMlFw5X/eK+N5irfI96q5dA9j4z1WjU4qf3If3m" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('.komen, .balas').hide();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.like-btn').click(function() {
            $(this).toggleClass('active');
            var likeBtn = $(this);
            var likeCount = parseInt(likeBtn.text());
            var postId = likeBtn.data('id');

            if (likeBtn.hasClass('active')) {
                $.ajax({
                    type: 'POST',
                    url: '/Tambahlike', 
                    data: { postId: postId },
                    success: function() {
                        likeCount += 1;
                        likeBtn.html('<i class="fas fa-thumbs-up"></i> ' + likeCount);
                    },
                });
            } else {
                $.ajax({
                    type: 'POST',
                    url: '/Kuranglike',
                    data: { postId: postId },
                    success: function() {
                        likeCount -= 1;
                        likeBtn.html('<i class="fas fa-thumbs-up"></i> ' + likeCount);
                    },
                });
            }
            $(this).siblings('.dislike-btn').removeClass('active');
        });

        $('.dislike-btn').click(function(){
            $(this).toggleClass('active');
            var likeBtn = $(this);
            var likeCount = parseInt(likeBtn.text());
            var postId = likeBtn.data('id');

            if (likeBtn.hasClass('active')) {
                $.ajax({
                    type: 'POST',
                    url: '/Tambahdislike', 
                    data: { postId: postId },
                    success: function() {
                        likeCount += 1;
                        likeBtn.html('<i class="fas fa-thumbs-down"></i> ' + likeCount);
                    },
                });
            } else {
                $.ajax({
                    type: 'POST',
                    url: '/Kurangdislike',
                    data: { postId: postId },
                    success: function() {
                        likeCount -= 1;
                        likeBtn.html('<i class="fas fa-thumbs-down"></i> ' + likeCount);
                    },
                });
            }
            $(this).siblings('.like-btn').removeClass('active');
        });
        
        $('.like-btn-komen').click(function() {
            $(this).toggleClass('active');
            var likeBtn = $(this);
            var likeCount = parseInt(likeBtn.text());
            var postId = likeBtn.data('id');

            if (likeBtn.hasClass('active')) {
                $.ajax({
                    type: 'POST',
                    url: '/Tambahlikekomen', 
                    data: { postId: postId },
                    success: function() {
                        likeCount -= 1;
                        likeBtn.html('<i class="fas fa-thumbs-up"></i> ' + likeCount);
                    },
                });
            } else {
                $.ajax({
                    type: 'POST',
                    url: '/Kuranglikekomen',
                    data: { postId: postId },
                    success: function() {
                        likeCount += 1;
                        likeBtn.html('<i class="fas fa-thumbs-up"></i> ' + likeCount);
                    },
                });
            }
            $(this).siblings('.dislike-btn-komen').removeClass('active');
        });

        $('.dislike-btn-komen').click(function() {
            $(this).toggleClass('active');
            var likeBtn = $(this);
            var likeCount = parseInt(likeBtn.text());
            var postId = likeBtn.data('id');

            if (likeBtn.hasClass('active')) {
                $.ajax({
                    type: 'POST',
                    url: '/Tambahdislikekomen', 
                    data: { postId: postId },
                    success: function() {
                        likeCount -= 1;
                        likeBtn.html('<i class="fas fa-thumbs-down"></i> ' + likeCount);
                    },
                });
            } else {
                $.ajax({
                    type: 'POST',
                    url: '/Kurangdislikekomen',
                    data: { postId: postId },
                    success: function() {
                        likeCount += 1;
                        likeBtn.html('<i class="fas fa-thumbs-down"></i> ' + likeCount);
                    },
                });
            }
            $(this).siblings('.like-btn-komen').removeClass('active');
        });
        
        $('.reply-btn').click(function() {
            var postId = $(this).attr('id').replace('show-balas', '');
            $('#balas' + postId).fadeToggle(); 
        });


        $('#upload_gambar').hide();
        $('#show_upload_gambar').change(function() {
        if ($(this).is(':checked')) {
            $('#upload_gambar').show();
        } else {
            $('#upload_gambar').hide(); 
        }
    });
    });
</script>
</div>