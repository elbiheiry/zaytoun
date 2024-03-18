@foreach ($subscribers as $subscriber)
    <div class="item-list gray">
        <div class="item-content">
            <span> <i class="fa fa-clock"></i> {{ $subscriber->created_at->diffForHumans() }} </span>
            <span> <i class="fa fa-envelope"></i> {{ $subscriber->email }} </span>
        </div>
        <button class="icon-btn red-bc delete-btn"
            data-url="{{ route('admin.subscribers.destroy', ['subscriber' => $subscriber->id]) }}">
            <i class="fa fa-trash"></i>
        </button>
    </div>
@endforeach
