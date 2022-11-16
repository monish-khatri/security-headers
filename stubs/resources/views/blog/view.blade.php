<x-app-layout>
    <div class="py-12">
        <div class="container">
            <div class="col-md-12 content">
                <h3>{!!__('blog.view_blog_title',['blogName' => $blog->title])!!}</h3>
                <span class="badge badge-pill badge-primary"><i class="fa fa-eye"></i> {{$counter}}</span>
                <a href="{{ route('blogs.index') }}" class="btn btn-danger float-right">{{__('blog.back_button')}}</a>
                <table class="center">
                    <tbody>
                        <tr>
                            <td>{{__('blog.title')}}:</td>
                            <td><strong><?= $blog->title; ?></strong></td>
                        </tr>
                        <tr>
                            <td>{{__('blog.description')}}:</td>
                            <td><strong><?= $blog->description; ?></strong></td>
                        </tr>
                        <tr>
                            <td>{{__('blog.blog_owner')}}:</td>
                            <td><strong><?= $blog->user->name; ?></strong></td>
                        </tr>
                        <tr>
                            <td><label>{{__('blog.image')}}:</label></td>
                            <td><img src="@empty($blog->image)https://upload.wikimedia.org/wikipedia/commons/7/75/No_image_available.png @else {{ asset('storage/blog/'.$blog->image) }} @endempty" alt="{{$blog->image}}" height="200px" width="200px"></td>
                        </tr>
                        <tr>
                            <td>{{__('blog.published')}}:</td>
                            <td>
                                @if ($blog->is_published)
                                    <span class="badge badge-success">{{__('blog.published')}}</span>
                                @else
                                    <span class="badge badge-danger">{{__('blog.not_published')}}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>{{__('blog.tags')}}:</td>
                            <td>
                                @forelse($blog->tags as $tag)
                                    <span class="badge badge-pill badge-primary">{{ $tag->name }}</span>
                                @empty
                                    <span class="badge badge-pill badge-secondary">{{__('blog.no_tags')}}</span>
                                @endforelse
                            </td>
                        </tr>
                        <tr>
                            <td>{{__('blog.blog_status')}}:</td>
                            <td>
                                @if ($blog->status == Blog::STATUS_PENDING)
                                    <span class="badge badge-warning" blog-id="{{$blog->slug}}" blog-title="{{$blog->title}}">{{__('blog.pending_tooltip')}}</span>
                                @elseif($blog->status == Blog::STATUS_APPROVE)
                                    <span class="badge badge-success" blog-id="{{$blog->slug}}" blog-title="{{$blog->title}}">{{__('blog.approve_tooltip')}}</span>
                                @elseif($blog->status == Blog::STATUS_DRAFT)
                                    <span class="badge badge-info" blog-id="{{$blog->slug}}" blog-title="{{$blog->title}}">{{__('blog.on_action_tooltip')}}</span>
                                @else
                                    <p><span class="badge badge-danger mr-1" blog-id="{{$blog->slug}}" blog-title="{{$blog->title}}">{{__('blog.reject_tooltip')}}</span>[<strong>{{__('blog.reject_modal_title')}}</strong> {{$blog->reject_reason}}]</p>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>{{__('blog.created_date')}}:</td>
                            <td><strong><?= $blog->created_at->format('d M Y H:i A') ; ?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @if($blog->is_published && $blog->status == Blog::STATUS_APPROVE)
            <div class="col-md-12 content comment-div">
                <h3>{{__('comment.comments_title')}}</h4>
                @include('blog.commentsDisplay', ['comments' => $blog->comments, 'blog' => $blog])
                <form method="post" action="{{ route('comments.store') }}">
                    @csrf
                    <div class="form-group">
                        <textarea placeholder="{{__('comment.add_comment')}}" class="form-control appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="body_"></textarea>
                        @error('body_')
                            <div class="text-red">{{ $message }}</div>
                        @enderror
                        <input type="hidden" name="blog_id" value="{{ $blog->id }}" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary-color" value="{{__('comment.add_comment')}}" />
                    </div>
                </form>
            </div>
        @endif
        </div>
    </div>
     <script>
        function removeComment(deleteUrl){
            $.ajax({
                type : "DELETE",
                url : deleteUrl,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': '<?= csrf_token() ?>'
                },
                success : function(response) {
                    refreshComments();
                }
            });
        }
        function pinComment(url,type){
            $.ajax({
                type : "POST",
                url : url,
                dataType: 'json',
                data: {type:type},
                headers: {
                    'X-CSRF-TOKEN': '<?= csrf_token() ?>'
                },
                success : function(response) {
                    refreshComments();
                }
            });
        }
        function refreshComments() {
            var oldData = $(".comment-div").html();

            $.ajax({
                type : "GET",
                url : "{{route('blogs.show',['blog'=>$blog])}}",
                dataType: 'html',
                success : function(response) {
                    var $htmlResponse = $(response);
                    data = $htmlResponse.find('.comment-div').html()
                    $(".comment-div").html(data);
                }
            });
        }
        setInterval(refreshComments,10000);
    </script>
</x-app-layout>