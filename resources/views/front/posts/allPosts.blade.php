<x-home-front-layout pgTitle="All Posts" pgSubTitle="A Blog created by Bahaa" image="/assets/front/assets/img/about-bg.jpg" heading="site-heading">

    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="d-flex justify-content-end mb-4">Number of Posts: {{ $postsNumber }}</div>
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
                            <!-- Divider-->
                            <hr class="my-4" />
                        @endforeach
                    @endforeach
            </div>
        </div>
    </div>
</x-home-front-layout>