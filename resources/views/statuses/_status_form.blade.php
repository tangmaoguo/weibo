<form action="{{ route('statuses.store') }}" method="post">
    @include('layouts._errors')
    @csrf
    <textarea name="content" id="" cols="3" rows="5" class="form-control">
        {{ old('content') }}
    </textarea>
    <button type="submit" class="btn btn-primary mt-3">发布</button>
</form>