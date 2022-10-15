<x-home-front-layout pgTitle="Update Post" pgSubTitle="update an existing post in a blog">

    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <p>Want to create a Post? <br>You can fill in the following fields to create a new blog post</p>
                    <div class="my-5">
                        <form action="{{ route('posts.update', [$post->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="put">
                            
                            <x-postForm :post="$post" button="update" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

</x-home-front-layout>