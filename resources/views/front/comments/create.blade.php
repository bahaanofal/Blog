<x-home-front-layout pgTitle="Create comment" pgSubTitle="create a new comment for this post">

    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <h3>Post Title</h3>
                    <h5>{{ $post->title }}</h5>
                    <h3>Post Sub-Title</h3>
                    <h5>{{ $post->sub_title }}</h5>
                    <p>Want to create a Comment? <br>You can fill in the following field to create a new comment</p>
                    <div class="my-5">
                        <form action="{{ route('comments.store', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <x-commentForm :comment="$comment" button="create" />

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-home-front-layout>