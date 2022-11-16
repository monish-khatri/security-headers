<x-app-layout>
@push('css')
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
@endpush
    <div class="py-12">
        <div class="container" style="margin:auto;">
            <div class="col-md-12 content">
                @if ($message = Session::get('success'))
                <x-alert-message type="{!! Session::get('type')!!}" message="{{$message}}" class="alert-block"/>
                @endif
                @if(!$published)
                    @can('isUser')
                        <a href="{{route('blogs.create')}}" class="btn btn-primary-color float-right">{{__('blog.new_blog_button')}}</a>
                    @endcan
                    <h3>{{__('blog.index_blog_title')}}</h3>
                @else
                    <h3>{{__('blog.all_blogs')}}</h3>
                @endif
                @if(isset($blogs))
                <table class="center">
                    <thead>
                        <tr>
                            <th>{{__('blog.sr_no')}}</th>
                            <th>@sortablelink('title',__('blog.title'))</th>
                            <th>{{__('blog.image')}}</th>
                            <th>@sortablelink('description',__('blog.description'))</th>
                            <th>{{__('blog.tags')}}</th>
                            <th>@sortablelink('is_published',__('blog.published'))</th>
                            <th>@sortablelink('user.name',__('blog.blog_owner'))</th>
                            @if(! $published)
                                <th>{{__('blog.blog_status')}}</th>
                            @endif
                            <th class="actions">{{__('blog.actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($blogs as $blog)
                        <tr @if($loop->odd) class="odd-row" @endif>
                            <td>{{ $loop->iteration + $blogs->firstItem() - 1 }}</td>
                            <td>
                                <a href="{{route('blogs.show',[$blog])}}" class="btn btn-xs">
                                    {{ $blog->title }}
                                </a>
                            </td>
                            <td><img src="@empty($blog->image)https://upload.wikimedia.org/wikipedia/commons/7/75/No_image_available.png @else {{ asset('storage/blog/'.$blog->image) }} @endempty" alt="{{$blog->image}}" height="100px"  width="100px"></td>
                            <td>{{ Str::limit($blog->description, 100) }}</td>
                            <td>
                                @forelse($blog->tags as $tag)
                                    @if($loop->iteration <= 5)
                                        <span class="badge badge-pill badge-primary">{{ $tag->name }}</span>
                                    @else
                                        <span class="badge badge-pill badge-secondary">...</span>
                                        @break
                                    @endif
                                @empty
                                    <span class="badge badge-pill badge-secondary">{{__('blog.no_tags')}}</span>
                                @endforelse
                            </td>
                            <td>
                                @if ($blog->is_published)
                                    <span @can('isOwner',$blog)title="{{__('blog.change_status_text')}}" data-original-title="Tooltip on right" @endcan class="@can('isOwner',$blog)change-status published @endcan badge badge-success" blog-id="{{$blog->slug}}" blog-title="{{$blog->title}}">{{__('blog.published')}}</span>
                                @else
                                    <span @can('isOwner',$blog) title="{{__('blog.change_status_text')}}" data-original-title="Tooltip on right" @endcan class="@can('isOwner',$blog)change-status not-published @endcan badge badge-danger" blog-id="{{$blog->slug}}" blog-title="{{$blog->title}}">{{__('blog.not_published')}}</span>
                                @endif
                            </td>
                            <td>
                                {{$blog->user->name}}
                            </td>
                            @if(! $published)
                                <td>
                                    @if ($blog->status == Blog::STATUS_PENDING)
                                        <span class="badge badge-warning" blog-id="{{$blog->slug}}" blog-title="{{$blog->title}}">{{__('blog.pending_tooltip')}}</span>
                                    @elseif($blog->status == Blog::STATUS_APPROVE)
                                        <span class="badge badge-success" blog-id="{{$blog->slug}}" blog-title="{{$blog->title}}">{{__('blog.approve_tooltip')}}</span>
                                    @elseif($blog->status == Blog::STATUS_DRAFT)
                                        <span class="badge badge-info" blog-id="{{$blog->slug}}" blog-title="{{$blog->title}}">{{__('blog.on_action_tooltip')}}</span>
                                    @else
                                        <span class="badge badge-danger" title="{{$blog->reject_reason}}" blog-id="{{$blog->slug}}" blog-title="{{$blog->title}}">{{__('blog.reject_tooltip')}}</span>
                                    @endif
                                </td>
                            @endif
                            <td>
                                @if($published)
                                    <a href="{{route('blogs.show',[$blog])}}" class="btn btn-xs">
                                        <span>
                                        <span>{{count($blog->totalComments)}}</span>
                                        <i class="fa fa-comment" title="{{__('blog.comment_tooltip')}}"></i>
                                        </span>
                                    </a>
                                    @can('isOwner',$blog)
                                        <a href="{{route('blogs.edit',[$blog])}}" class="btn btn-xs">
                                            <span><i class="fa fa-pencil" title="{{__('blog.edit_tooltip')}}"></i></span>
                                        </a>
                                        <a href="javascript:void(0)" onclick="removeBlog('{{route('blogs.destroy',[$blog])}}','{{$blog->title}}')" class="btn btn-xs">
                                            <span><i class="fa fa-trash" title="{{__('blog.delete_tooltip')}}"></i></span>
                                        </a>
                                    @endcan
                                @else
                                    @can('isAdmin')
                                        @if($blog->status == 'pending')
                                            <a href="javascript:void(0)" onclick="updateStatus('{{route('blogs.update_status',[$blog])}}','{{$blog->title}}','{{Blog::STATUS_APPROVE}}')" class="btn btn-xs">
                                                <span><i class="fa fa-check" title="{{__('blog.approve_tooltip')}}"></i></span>
                                            </a>
                                            <a href="javascript:void(0)" onclick="reasonPopup(this)" data-url= '{{route('blogs.update_status',[$blog])}}' data-title='{{$blog->title}}' class="btn btn-xs">
                                                <span><i class="fa fa-times" title="[{{__('blog.reject_tooltip')}}]"></i></span>
                                            </a>
                                        @endif
                                    @endcan
                                    @can('isUser')
                                        <a href="{{route('blogs.show',[$blog])}}" class="btn btn-xs">
                                            <span><i class="fa fa-eye" title="{{__('blog.view_tooltip')}}"></i></span>
                                        </a>
                                        <a href="{{route('blogs.edit',[$blog])}}" class="btn btn-xs">
                                            <span><i class="fa fa-pencil" title="{{__('blog.edit_tooltip')}}"></i></span>
                                        </a>
                                        <a href="javascript:void(0)" onclick="removeBlog('{{route('blogs.destroy',[$blog])}}','{{$blog->title}}')" class="btn btn-xs">
                                            <span><i class="fa fa-trash" title="{{__('blog.delete_tooltip')}}"></i></span>
                                        </a>
                                    @endcan
                                @endif
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan=" @if(! $published) 9 @else 8 @endif"><?= __('blog.no_record_found') ?></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div style="margin-top: 2%;">
                    {{$blogs->onEachSide(2)->links()}}
                </div>
                @endif
            </div>
        </div>
        @can('isAdmin')
        <div class="modal fade" id="reasonModal" tabindex="-1" aria-labelledby="reasonModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reasonModalLabel">{{__('blog.reject_modal_title')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="rejectForm">
                        <input type="hidden" id="modalTitle" name="title"/>
                        <input type="hidden" id="modalType" name="type"/>
                        <div class="form-group">
                            <textarea class="form-control" id="reject_reason" name="reject_reason"></textarea>
                            <div id="reason_error" class="text-red">{{ $message }}</div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('blog.cancel_button')}}</button>
                    <button id="rejectBlog" type="button" class="btn btn-primary-color">{{__('blog.reject_button')}}</button>
                </div>
                </div>
            </div>
        </div>
        @endcan
   </div>
    <script>
        function removeBlog(deleteUrl,blogName){
            Swal.fire({
                icon: 'warning',
                title:'{{__('blog.confirmation_title')}}',
                html: "{!!__('blog.delete_description', ['blogName' => '"+blogName+"'])!!}",
                showCancelButton: true,
                confirmButtonText: '{{__('blog.delete_button')}}',
                cancelButtonText: '{{__('blog.cancel_button')}}',
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type : "DELETE",
                        url : deleteUrl,
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': '<?= csrf_token() ?>'
                        },
                        success : function(response) {
                            location.reload();
                        }
                    });
                }
            })
        }
        @can('isAdmin')
        function reasonPopup(event){
            $('#modalTitle').val($(event).data('title'))
            $('#modalType').val('{{Blog::STATUS_REJECTED}}')
            $('#rejectForm').attr('action',$(event).data('url'))
            $("#reasonModal").modal('show');
        }
        $(document).on('click','#rejectBlog',function(e){
            e.preventDefault();
            blogName = $('#modalTitle').val()
            status = $('#modalType').val()
            updateUrl = $('#rejectForm').attr('action')
            rejectReason = $('#reject_reason').val()

            updateStatus(updateUrl,blogName,status,rejectReason)
        })
        function updateStatus(updateUrl,blogName,status,rejectReason = null){
            var html = "{!!__('blog.approve_description', ['blogName' => '"+blogName+"'])!!}";
            var button = "{{__('blog.approve_button')}}";
            if(status == 'rejected'){
                html = "{!!__('blog.reject_description', ['blogName' => '"+blogName+"'])!!}";
                button = "{{__('blog.reject_button')}}";
                $("#reasonModal").modal('hide');
            }
            Swal.fire({
                icon: 'warning',
                title:'{{__('blog.confirmation_title')}}',
                html: html,
                showCancelButton: true,
                confirmButtonText: button,
                cancelButtonText: '{{__('blog.cancel_button')}}',
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type : "POST",
                        url : updateUrl,
                        dataType: 'json',
                        data: {'status':status,_method: 'PATCH',reject_reason:rejectReason},
                        headers: {
                            'X-CSRF-TOKEN': '<?= csrf_token() ?>'
                        },
                        success : function(response) {
                            if(response.errors) {
                                $('#reason_error').html(response.errors[0])
                                $("#reasonModal").modal('show');
                            } else {
                                location.reload();
                            }
                        }
                    });
                }
            })
        }
        
        @endcan
        $(document).on('click','.change-status',function(){
            var blogId = $(this).attr('blog-id');
            var blogTitle = $(this).attr('blog-title');
            var updateUrl = "{{route('blogs.index')}}/"+blogId;
            button = "{{__('blog.publish_text')}}";
            html = "{!!__('blog.update_status_description', ['blogName' => '"+blogTitle+"','status'=> '"+button+"'])!!}"
            is_published = 1
            if($(this).hasClass('published')) {
                button = "{{__('blog.unpublish_text')}}";
                html = "{!!__('blog.update_status_description', ['blogName' => '"+blogTitle+"','status'=> '"+button+"'])!!}"
                is_published = 0
            }
            Swal.fire({
                icon: 'warning',
                title:'{{__('blog.confirmation_title')}}',
                html: html,
                showCancelButton: true,
                confirmButtonText: button,
                cancelButtonText: '{{__('blog.cancel_button')}}',
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type : "POST",
                        url : updateUrl,
                        dataType: 'json',
                        data: {'is_published':is_published,_method: 'PATCH'},
                        headers: {
                            'X-CSRF-TOKEN': '<?= csrf_token() ?>'
                        },
                        success : function(response) {
                            location.reload();
                        }
                    });
                }
            })
        })
    </script>
</x-app-layout>