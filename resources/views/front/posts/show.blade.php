<x-home-front-layout pgTitle="{{$post->title}}" pgSubTitle="{{$post->sub_title}}" image="/assets/front/assets/img/post-bg.jpg"  heading="post-heading" username="{{ $post->user->name }}">
    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <h2>{{ $post->sub_title }}</h2>
                    <p>{{ $post->paragraph }}</p>
                    <h2 class="section-heading">The Final Frontier</h2>
                    <p></p>
                    <img class="img-fluid" src="{{$post->image_path}}" alt="..." />
                    <p>{{ $post->image_description }}</p>
                </div>
                <span class="caption text-muted">created by <a href="#"><span style="text-decoration: underline;"> {{ $post->user->name }} </span></a>, at {{ $post->created_at->format('d:m:y h:m:s a') }}</span>
            </div>
        </div>
    </article>
</x-home-front-layout>