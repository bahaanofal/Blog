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
    <input type="file" class="form-control @error('image') is-invalid @enderror" name='image' id="image" value="{{ old('image', $post->image_path ?? null) }}">
    @error('image')
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
<button class="btn btn-primary text-uppercase" type="submit">{{ $button }}</button>