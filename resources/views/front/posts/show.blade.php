<x-home-front-layout pgTitle="{{$post->title}}" pgSubTitle="{{$post->sub_title}}" image="/assets/front/assets/img/post-bg.jpg" heading="post-heading" username="{{ $post->user->name }}">
    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <h2>{{ $post->sub_title }}</h2>
                    <p>{{ $post->paragraph }}</p>
                    <h2 class="section-heading">The Final Frontier</h2>
                    <p></p>
                    @if(substr( $post->image_path, 0, 4 ) === "http")
                    <img class="img-fluid" src="{{ $post->image_path }}"  alt="...">
                    @else
                    <img class="img-fluid" src="{{ asset('storage/' . $post->image_path) }}"  alt="...">
                    @endif
                    <p>{{ $post->image_description }}</p>
                </div>
                <span class="caption text-muted">created by <a href="#"><span style="text-decoration: underline;"> {{ $post->user->name }} </span></a>, at {{ $post->created_at->format('d:m:y h:m:s a') }}</span>
            </div>
            <br>
            <hr class="my-4" />
        </div>
    </article>

    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <h3>Comments - {{$comments->count()}}</h3>
                <div class="col-md-10 col-lg-8 col-xl-7">
                    @foreach($comments as $comment)
                    <div class="post-preview">
                        <h6>
                            Comment by
                            <a href=""><span style="text-decoration: underline;">{{$comment->user->name}}</span></a>
                        </h6>
                        <div class="post-meta" style="font-size:small;">at {{ $comment->created_at->format('d M Y - h:i:s a') }}</div>
                        <p class="post-meta">{{$comment->comment}}</p>
                    </div>
                    @if(Auth::user()->id == $comment->user_id)
                    <div>
                        <div style="float:right; justify-content:center;">
                            <a href="{{ route('comments.edit', [$post->id, $comment->id]) }}">
                                <i class="fa-solid fa-file-pen"></i>
                            </a>
                        </div>
                        <div style="float:right">
                            <form action="{{ route('comments.destroy', [$post->id, $comment->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-lg deleteBtn" style="padding: 0 10px;">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                        <br>
                    </div>
                    @endif
                    <hr />
                    @endforeach
                    <div class="d-flex justify-content-end mb-4">
                        <a class="btn btn-primary text-uppercase" href="{{ route('comments.create', $post->id) }}">
                            add comment
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</x-home-front-layout>