<x-home-front-layout pgTitle="Update comment" pgSubTitle="update an existing comment on a post">

    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <h3>Post Title</h3>
                    <h5>{{ $post->title }}</h5>
                    <h3>Post Sub-Title</h3>
                    <h5>{{ $post->sub_title }}</h5>
                    <p>Want to edit a comment? <br>You can edit the following field to edit this comment.</p>
                    <div class="my-5">
                        <form action="{{ route('comments.update', [$post->id, $comment->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="put">
                            <x-commentForm :comment="$comment" button="update" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

</x-home-front-layout>