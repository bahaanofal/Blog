<div class="form-floating" style="margin-bottom: 20px;">
    <textarea type="text" class="form-control @error('comment') is-invalid @enderror" placeholder=" " name='comment' style="height: 12rem">{{ old('comment', $comment->comment ?? null) }}</textarea>
    <label for="">Comment</label>
    @error('comment')
    <p class="invalid-feedback">{{ $message }}</p>
    @enderror
</div>

<button class="btn btn-primary text-uppercase" type="submit">{{ $button }}</button>