<x-home-front-layout pgTitle="All Posts" pgSubTitle="A Blog created by Bahaa" image="/assets/front/assets/img/about-bg.jpg" heading="site-heading">

    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div style="display: flex; justify-content: space-between;">
                    <div><a class="btn btn-primary text-uppercase" href="{{ route('posts.create') }}">Create Post</a></div>
                    <div>Number of Posts: {{ $postsNumber }}</div>
                </div>
                <br>
                <hr class="my-4" />
                    <!-- Post preview-->
                @foreach ($users as $user)
                @foreach ($user->posts as $post)
                <div class="post-preview">
                    <a href="{{ route('posts.show', [$post->id]) }}">
                        <h2 class="post-title">{{$post->title}}</h2>
                        <h3 class="post-subtitle">{{$post->sub_title}}</h3>
                    </a>
                    <p class="post-meta">
                        Posted by
                        <a href="">{{$user->name}}</a>
                        on {{ $post->created_at->format('d M Y - h:i:s a') }}
                    </p>
                </div>
                @if(Auth::user()->id == $user->id)
                <div>
                    <div style="float:right; justify-content:center;">
                        <a href="{{ route('posts.edit', [$post->id]) }}">
                            <i class="fa-solid fa-file-pen"></i>
                        </a>
                    </div>
                    <div style="float:right">
                        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-lg deleteBtn" style="padding: 0 10px;">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
                @endif
                <!-- Divider-->
                <br>
                <hr class="my-4" />
                @endforeach
                @endforeach
            </div>
        </div>
    </div>
</x-home-front-layout>