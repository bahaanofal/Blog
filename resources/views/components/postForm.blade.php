<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p>Want to create a Post? <br>You can fill in the following fields to create a new blog post</p>
                <div class="my-5">
                    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating" style="margin-bottom: 20px;">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name='title' id="title" placeholder=" " value="{{ old('title', $post->title ?? null) }}">
                            <label for="title">Title</label>
                            @error('title')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating" style="margin-bottom: 20px;">
                            <input type="text" class="form-control @error('sub_title') is-invalid @enderror" name='sub_title' id="sub_title" placeholder=" " value="{{ old('sub_title', $post->sub_title ?? null) }}">
                            <label for="sub_title">Sub Title</label>
                            @error('sub_title')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating" style="margin-bottom: 20px;">
                            <textarea type="text" class="form-control @error('paragraph') is-invalid @enderror" placeholder=" " name='paragraph' style="height: 12rem">{{ old('paragraph', $post->paragraph ?? null) }}</textarea>
                            <label for="">Paragraph</label>
                            @error('paragraph')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div style="margin-bottom: 20px;">
                            <input type="file" class="form-control @error('image_path') is-invalid @enderror" name='image_path' id="image_path" value="{{ old('image_path', $post->image_path ?? null) }}">
                            @error('image_path')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating" style="margin-bottom: 20px;">
                            <textarea type="text" class="form-control @error('image_description') is-invalid @enderror" placeholder=" " name='image_description' style="height: 12rem">{{ old('image_description', $post->image_description ?? null) }}</textarea>
                            <label for="">Image Description</label>
                            @error('image_description')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <br />
                        <button class="btn btn-primary text-uppercase" type="submit">{{$button}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>