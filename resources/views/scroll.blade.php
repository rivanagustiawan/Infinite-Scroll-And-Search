
@foreach($posts as $post)

            <div class="col-md-4 mb-3">
            <div class="card">
                <img src="https://source.unsplash.com/500x500?{{ $post->category->name }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title  }}</h5>
                        <p class="card-text">{{ $post->excerpt }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach