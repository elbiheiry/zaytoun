@foreach ($comments as $comment)
    <div class="item-list gray">
        <div class="item-content">
            {{ $comment->comment }}
            <br />
            <span> <i class="fa fa-clock"></i> {{ $comment->created_at->diffForHumans() }} </span>
            <span> <i class="fa fa-info"></i> {{ $comment->name }} </span>
            <span> <i class="fa fa-envelope"></i> {{ $comment->email }} </span>
        </div>
        <button class="icon-btn red-bc delete-btn"
            data-url="{{ route('admin.article.comment.delete', ['id' => $comment->id]) }}">
            <i class="fa fa-trash"></i>
        </button>
    </div>
@endforeach
