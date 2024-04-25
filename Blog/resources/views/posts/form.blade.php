<div class="row">
    <div class="col">
        <div class="form-floating mb-3 position-relative">
            <input type="text" value="{{ old('title', $post['title']) }}"
                   class="form-control border-0 border-bottom shadow" name="title"
                   placeholder="enter your title" aria-label="title"
                   aria-describedby="title" required>
            <label for="title">Title</label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="form-floating mb-3 position-relative">
            <textarea class="form-control border-0 border-bottom shadow" placeholder="enter a description here" name="description" id="description" style="height: 100px" cols="30" rows="10">{{ old('description', $post['description']) }}</textarea>
            <label for="description">Description</label>
        </div>
    </div>
</div>


<div class="row">
    <div class="col">
        <div class="form-floating mb-3 position-relative">
            <select class="form-select border-0 border-bottom shadow" name="status" aria-label="Select Category" required>
                <option value="" disabled>Select Status</option>
                <option value="Available" @if($post['status'] == 'Available') selected @endif>Available</option>
                <option value="Not Available" @if($post['status'] == 'Not Available') selected @endif>Not Available</option>
            </select>
            <label for="status">Status</label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class=" mb-3">
            <input type="file" value="{{ old('cover', $post['cover']) }}"
                   class="form-control border-0 border-bottom shadow" name="cover"
                   placeholder="enter your cover" aria-label="cover"
                   aria-describedby="cover" required>
        </div>
    </div>
</div>

<input name="user_id" hidden value="{{ \Illuminate\Support\Facades\Auth::id() }}">
