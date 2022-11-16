<x-app-layout>
    <div class="py-12">
        <div class="container" style="margin:auto;">
            <div class="col-md-12 content">
                @if ($message = Session::get('success'))
                <x-alert-message type="{!! Session::get('type')!!}" message="{{$message}}" class="alert-block"/>
                @endif
                @if($blogs->isNotEmpty())
                    <a onclick="restoreAllBlog('{{route('blogs.restoreAll')}}')" href="javascript:void(0)" class="btn btn-primary-color float-right">{{__('blog.restore_all_button')}}</a>
                @endif
                <h3>{{__('blog.trash_bin_title')}}</h3>
                @if(isset($blogs))
                <table class="center">
                    <thead>
                        <tr>
                            <th>{{__('blog.sr_no')}}</th>
                            <th>@sortablelink('title',__('blog.title'))</th>
                            <th>{{__('blog.image')}}</th>
                            <th>@sortablelink('description',__('blog.description'))</th>
                            <th>@sortablelink('is_published',__('blog.published'))</th>
                            <th>@sortablelink('user.name',__('blog.blog_owner'))</th>
                            <th class="actions">{{__('blog.actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($blogs as $blog)
                        <tr @if($loop->odd) class="odd-row" @endif>
                            <td>{{ $loop->iteration + $blogs->firstItem() - 1 }}</td>
                            <td>
                                {{ $blog->title }}
                            </td>
                            <td><img src="@empty($blog->image)https://upload.wikimedia.org/wikipedia/commons/7/75/No_image_available.png @else {{ asset('storage/blog/'.$blog->image) }} @endempty" alt="{{$blog->image}}" height="100px" width="100px"></td>
                            <td>{{ Str::limit($blog->description, 100) }}</td>
                            <td>
                                @if ($blog->is_published)
                                    <span class="badge badge-success">{{__('blog.published')}}</span>
                                @else
                                    <span class="badge badge-danger">{{__('blog.not_published')}}</span>
                                @endif
                            </td>
                            <td>
                                {{$blog->user->name}}
                            </td>
                            <td>
                                <a href="javascript:void(0)" onclick="restoreBlog('{{route('blogs.restore',[$blog])}}','{{$blog->title}}')" class="btn btn-xs">
                                    <span><i class="fa fa-undo" title="{{__('blog.restore_tooltip')}}"></i></span>
                                </a>
                                <a href="javascript:void(0)" onclick="removeBlog('{{route('blogs.forceDestroy',[$blog])}}','{{$blog->title}}')" class="btn btn-xs">
                                    <span><i class="fa fa-trash" title="{{__('blog.delete_tooltip')}}"></i></span>
                                </a>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="7"><?= __('blog.no_record_found')?></td>
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
        function restoreBlog(restoreUrl,blogName){
            Swal.fire({
                icon: 'warning',
                title:'{{__('blog.confirmation_title')}}',
                html: "{!!__('blog.restore_description', ['blogName' => '"+blogName+"'])!!}",
                showCancelButton: true,
                confirmButtonText: '{{__('blog.restore_button')}}',
                cancelButtonText: '{{__('blog.cancel_button')}}',
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type : "POST",
                        url : restoreUrl,
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
        function restoreAllBlog(restoreUrl){
            Swal.fire({
                icon: 'warning',
                title:'{{__('blog.confirmation_title')}}',
                html: "{!!__('blog.restore_all_description')!!}",
                showCancelButton: true,
                confirmButtonText: '{{__('blog.restore_button')}}',
                cancelButtonText: '{{__('blog.cancel_button')}}',
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type : "POST",
                        url : restoreUrl,
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': '<?= csrf_token() ?>'
                        },
                        success : function(response) {
                            location.href = "{{route('blogs.index')}}"
                        }
                    });
                }
            })
        }
    </script>
</x-app-layout>