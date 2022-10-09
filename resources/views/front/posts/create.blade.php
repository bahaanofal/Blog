<x-home-front-layout pgTitle="Create Post" pgSubTitle="create a new post in a blog">

    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <p>Want to create a Post? <br>You can fill in the following fields to create a new blog post</p>
                    <div class="my-5">
                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <x-postForm :post="$post" button="create" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-home-front-layout>