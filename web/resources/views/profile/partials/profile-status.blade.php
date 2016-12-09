
<br><h3 class="ui dividing header">{{ $user->username }}'s статус</h3>


    <div class="row">
        <div class="col-sm-8 col-lg-6">
            <br>
            <form role="form" action="{{ route('status.post') }}" method="post">
                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                    <div class="ui form">
                        <div class="field">
                            <textarea placeholder="Статус бичих..." name="status" class="form-control" rows="4"></textarea>
                            @if($errors->has('status'))
                                <span class="help-block">{{ $errors->first('status') }}</span>
                            @endif
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-default">Бодлоо бичих</button>
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                </div>
            </form>
            <hr>
        </div>
    </div>


<div class="row">
    <div class="col-sm-8 col-lg-6">
        @if (!$statuses->count())
            <p>Хоосон {{ $user->username }}'s .</p>
        @else
            @foreach($statuses as $status)
                <div class="media">
                    @foreach ($user->Profilephotos as $photo)
                        <div class="ui comments" id="Public-ui-comments">
                            <div class="comment">
                                <a class="avatar">
                                    <img alt="" src="/travel/{{ $photo->thumbnail_path }}">
                                </a>
                            </div>
                        </div>
                    @endforeach
                    <div class="media-body" id="Public-media-body">
                        <h4 class="media-heading">{{ $status->user->username }}</h4>
                        <p>{{ $status->body }}</p>
                        <ul class="list-inline">
                            <li>{{ $status->created_at->diffForHumans() }}</li>
                            <li>
                                <a href="{{ route('status.like', ['statusId' => $status->id])}}" id="thumbs-like-popup">
                                    <i class="thumbs outline up icon small"></i> {{ $status->likes->count() }}
                                </a>
                            </li>
                        </ul>

                        @foreach ($status->replies as $reply)
                            <div class="media" id="Public-media">
                                @foreach ($reply->user->Profilephotos as $photo)
                                    <div class="ui comments" id="Public-ui-comments">
                                        <div class="comment">
                                            <a class="avatar">
                                                <img alt="" src="/travel/{{ $photo->thumbnail_path }}">
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="media-body" id="Public-media-body">
                                    <h5 class="media-heading">{{ $reply->user->username }}</h5>
                                    <p>{{ $reply->body }}</p>
                                    <ul class="list-inline">
                                        <li>{{ $reply->created_at->diffForHumans() }}</li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach


                            <form role="form" action="{{ route('status.reply', ['statusId' => $status->id]) }}" method="post"  id="Public-reply-form">
                                <div class="form-group{{ $errors->has("reply-{$status->id}") ? ' has-error' : '' }}">
                                    <div class="ui form">
                                        <div class="field">
                                            <textarea name="reply-{{ $status->id }}" class="form-control" rows="3" placeholder="Өөрийнхөө статусд хариулах"></textarea>
                                            @if($errors->has("reply-{$status->id}"))
                                                <span class="help-block">{{ $errors->first("reply-{$status->id}") }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-default">Хариулах</button>
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                            </form>

                    </div>
                </div>
            @endforeach
            {!! $statuses->render() !!}
        @endif

    </div>
</div>

