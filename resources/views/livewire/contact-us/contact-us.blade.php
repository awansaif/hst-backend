<div class="row">
    <div class="col-sm-12">
        <div class="timeline timeline-left">
            <article class="timeline-item alt">
                <div class="text-left">
                    <div class="time-show first">
                        <a href="#" class="btn btn-primary">Messages</a>
                    </div>
                </div>
            </article>
            @foreach ($messages as $message)
            <article class="timeline-item">
                <div class="timeline-desk">
                    <div class="panel">
                        <div class="timeline-box">
                            <span class="arrow"></span>
                            <span class="timeline-icon"><i class="mdi mdi-checkbox-blank-circle-outline"></i></span>
                            <p class="timeline-date text-muted">
                                <small>{{ date('d M, y h:i:s a', strtotime($message->created_at)) }}</small>
                            </p>
                            <h4>
                                {{ $message->name }}
                                (<em>
                                    <a href="mailto:{{ $message->email }}">{{ $message->email }}</a>
                                </em>)
                            </h4>
                            <p class="mt-2">
                                {{ $message->body }}
                            </p>
                            <p class="mt-4">
                                {{ $message->message }}
                            </p>

                            <button class="btn btn-sm btn-danger float-right"
                                wire:click="remove({{ $message->id }})">Remove</button>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</div>
<!-- end row -->
