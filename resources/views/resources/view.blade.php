@extends('layouts.app')

@section('content')
    <div class="ui main container">
        <div class="ui two column grid">
            <div class="column">
                <h1 class="ui header">
                    {{$resource->name}}<br/>
                    @if ($resource->adult_only)
                        <div class="ui red label"><i class="exclamation circle icon"></i>18+ Adult Only</div>
                    @endif
                    @if ($resource->private)
                        <div class="ui purple label"><i class="lock icon"></i>Private</div>
                    @endif
                </h1>
                <img class="ui top attached fluid rounded image" src="{{$resource->thumbnail_url}}">
                <div class="ui bottom attached borderless fluid card">
                    <div class="content">
                        @if (Auth::check())
                        <a onclick="upvoteResource('{{$resource->id}}', '{{ Auth::id()}}')" class="left floated">
                            <i class="upvote-sect up arrow icon"></i>
                            <span class="upvote-sect" id="resource-upvote-count-{{$resource->id}}">{{$resource->upvotes}}</span>
                        </a>
                        @else
                            <div class="left floated">
                                <i class="upvote-sect up arrow icon"></i>
                                <span id="resource-upvote-count-{{$resource->id}}">{{$resource->upvotes}}</span>
                            </div>
                        @endif
                    </div>
                </div>
                <h2 class="ui medium header">
                    {{$resource->short_description}}
                </h2>
                <p>{!! html_entity_decode($resource->long_description) !!}</p>
                <hr class="ui divider">
                <h2 class="ui medium header">Comments</h2>
                <div class="ui threaded comments">
                @foreach ($resource->comments as $comment)
                <div class="comment">
                    <a name={{$comment->id}}>
                    <a class="avatar">
                    <img src="{{$comment->user->avatar}}">
                    </a>
                    <div class="content">
                    <a class="author">
                        @if ($comment->user->alias)
                        {{$comment->user->alias}}
                        @else
                        {{$comment->user->name}}
                        @endif
                        </a>
                    <div class="metadata">
                        @if ($comment->user->group)
                        <div class="meta">
                            <div class="{{$comment->user->group->colour}} text" style="margin-top: 0;">
                                <i class="{{$comment->user->group->colour}} circle icon"></i>
                                {{$comment->user->group->name}}
                            </div>
                        </div>
                            @endif
                        <span class="date">{{$comment->posted_at}}</span>
                    </div>
                    <div class="text">
                        {{$comment->content}}
                    </div>
                    <div class="actions">
                        <a class="reply">Reply</a>
                    </div>
                    </div>
                </div>
                @endforeach
                {{-- <div class="comment">
                    <a class="avatar">
                    <img src="/images/avatar/small/elliot.jpg">
                    </a>
                    <div class="content">
                    <a class="author">Elliot Fu</a>
                    <div class="metadata">
                        <span class="date">Yesterday at 12:30AM</span>
                    </div>
                    <div class="text">
                        <p>This has been very useful for my research. Thanks as well!</p>
                    </div>
                    <div class="actions">
                        <a class="reply">Reply</a>
                    </div>
                    </div>
                    <div class="comments">
                        <div class="comment">
                            <a class="avatar">
                            <img src="/images/avatar/small/jenny.jpg">
                            </a>
                            <div class="content">
                            <a class="author">Jenny Hess</a>
                            <div class="metadata">
                                <span class="date">Just now</span>
                            </div>
                            <div class="text">
                                Elliot you are always so right :)
                            </div>
                            <div class="actions">
                                <a class="reply">Reply</a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                @if ($resource->comments_locked == false)
                <form id="topLevelCommentForm" class="ui reply form">
                    <div class="field">
                    <textarea id="topLevelCommentContent"></textarea>
                    <small>Please ensure your comment complies with the Content Guildlines.</small>
                    </div>
                    <div id="addTopLevelCommentButton" class="ui blue labeled submit icon button">
                    <i class="icon edit"></i> Comment
                    </div>
                </form>
                <script>
                    $(document).on('click', '#addTopLevelCommentButton', function () {
                        let content = $('#topLevelCommentContent').val();
                        $('#addTopLevelCommentButton').addClass('disabled');
                        $.ajax({
                            type: 'POST',
                            url: '{{route('resources.social.toplevelcomment')}}',
                            data: {content: content, user_id: {{Auth::id()}}, resource_id: {{$resource->id}}},
                            dataType: 'json',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            success: function(data) {
                                $('#addTopLevelCommentButton').removeClass('disabled');
                                window.location.href += "#"+data.id;
                                location.reload();                            
                            },
                            error: function(xhr, status, error) {
                                alert('An error occured while processing your comment. Please send the following details to an administrator: ' + xhr.status + ' ' + xhr.statusText + ' ' + error);
                            }
                            });
                    });
                </script>
                @else
                <div class="ui orange message">
                    <p>Comments locked by the user or a moderator.</p>
                </div>
                @endif
                </div>
            </div>
            <div class="column">
                <div class="ui card">
                    <a class="image" href="#" style="height: 200px; background-size: cover; background-repeat: no-repeat; background-image: url('https://www.abc.net.au/dat/news/elections/federal/2019/guide/photos/MissingCandidate.jpg');">
                    </a>
                    <div class="content">
                        <div class="ui sub header">Created by</div>
                        <a class="header" href="#">
                            @if ($resource->user->alias)
                            {{$resource->user->alias}}
                            @else
                            {{$resource->user->name}}
                            @endif
                        </a>
                        @if ($resource->user->group)
                        <div class="meta">
                            <div class="{{$resource->user->group->colour}} text" style="margin-top: 0;">
                                <i class="{{$resource->user->group->colour}} circle icon"></i>
                                {{$resource->user->group->name}}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="ui card">
                    <div class="content">
                        @if ($resource->downloadable)
                        <a href="#" role="button" class="ui fluid blue button"><i class="download icon"></i>Download</a>
                        @else
                        <p style="text-align: center;">Downloads Disabled</p>
                        @endif
                    </div>
                </div>
                <div class="ui card">
                    <div class="content">
                        <h1 class="ui medium header">Metadata</h1>
                        <div class="ui list">
                            <div class="item">
                                <i class="calendar icon"></i>
                                <div class="content">
                                <div class="description">Uploaded At</div>
                                <div class="header">{{$resource->uploaded_at}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ui card">
                    <div class="content">
                        <div class="ui list">
                            <div class="item">
                                <a href="#" data-toggle="modal" id="sharemodalb" class="ui green small fluid button"><i class="share icon"></i>Share Resource</a>
                                <script>
                                    $(document).on("click", "#sharemodalb", function(){
                                        $('#shareModal')
                                            .modal('show')
                                        ;
                                    });
                                </script>
                            </div>
                            <div class="item">
                                <a href="#" id="reportB" class="ui red small fluid button"><i class="exclamation circle icon"></i>Report Resource</a>
                                <script>
                                    $(document).on("click", "#reportB", function(){
                                        $('#reportModal')
                                            .modal('show')
                                        ;
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ui card">
                    <div class="content">
                        <h1 class="ui medium header">Moderation</h1>
                        <div class="ui list">
                            <div class="item">
                                <div class="ui toggle checkbox">
                                    <input name="public" type="checkbox">
                                    <label>Lock comments</label>
                                </div>
                            </div>
                            <div class="item">
                                <div class="ui toggle checkbox">
                                    <input type="checkbox" name="mod_private">
                                    <label>Private</label>
                                </div>
                            </div>
                            <div class="item">
                                <div class="ui toggle checkbox">
                                    <input type="checkbox" name="mod_adult_only">
                                    <label>Adult only</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ui small modal" id="shareModal">
        <i class="close icon"></i>
        <div class="header">
            Share {{$resource->name}}
        </div>
        <div class="content">
            <h3 class="ui small header">Share via URL</h3>
            <div class="ui fluid action input">
                <input id="shareUrl" type="text" readonly value="{{route('resources.view', $resource->id)}}">
                <button id="copyShareUrlB" href="#" class="ui green button"><i class="copy icon"></i>&nbsp;Copy</button>
            </div>
            <script>
                $(document).on('click', '#copyShareUrlB', function () {
                    let url = document.getElementById('shareUrl');
                    url.select();
                    document.execCommand('copy');
                    $('#copyShareUrlB').text('Copied!');
                });
            </script>
            <h2 class="ui small header">Tweet this</h2>
            <a href="https://twitter.com/intent/tweet?text={{route('resources.view', $resource->id)}}" class="ui blue button">
                <i class="twitter icon"></i>
                Tweet
            </a>
        </div>
    </div>
    <div class="ui small modal" id="reportModal">
        <i class="close icon"></i>
        <div class="header">
            Report {{$resource->name}}
        </div>
        <div class="content" id="reportModalC">
            <p>If this content does not comply with the Content Guidelines, please let us know.</p>
            @if ($resource->adult_only)
                <div class="ui message">
                    <div class="content">Please note that this content is marked as <b>18+ Adult Only</b>, which means the content
                    is only available to those who have verified their age as 18 years or over.</div>
                </div>
            @endif
            <form class="ui form">
                <div class="field">
                    <label>What is wrong with the content?</label>
                    <div class="ui selection dropdown">
                        <input type="hidden" name="issue">
                        <i class="dropdown-icon"></i>
                        <div class="default text">Select one..</div>
                        <div class="menu">
                            <div class="item" data-value="0">
                                Sexual content
                            </div>
                            <div class="item" data-value="0">
                                Violent or repulsive content
                            </div>
                            <div class="item" data-value="0">
                                Hateful or abusive content
                            </div>
                            <div class="item" data-value="0">
                                Harmful dangerous acts
                            </div>
                            <div class="item" data-value="0">
                                Child abuse
                            </div>
                            <div class="item" data-value="0">
                                Promotes terrorism
                            </div>
                            <div class="item" data-value="0">
                                Spam or misleading
                            </div>
                            <div class="item" data-value="0">
                                Infringes my rights (copyright)
                            </div>
                        </div>
                    </div>
                    <script>
                        $('.ui.dropdown')
                            .dropdown()
                        ;
                    </script>
                </div>
                <div class="field">
                    <label>Explain in detail</label>
                    <div class="ui input">
                        <textarea name="issue_description"></textarea>
                    </div>
                </div>
                <a href="#" id="submitReportB" onclick="submitReport()" class="ui button blue">Send Report</a>
            </form>
        </div>
        <script>
            function submitReport() {
                $('#submitReportB').addClass('loading');
                var issue = $('input[name=issue]').val();
                var issue_description = $('textarea[name=issue_description]').val();
                $.ajax({
                    type: 'POST',
                    url: '{{route('moderation.submitcontentreport')}}',
                    data: {content_url: window.location.href, issue: issue, issue_description: issue_description, user_id: {{Auth::id()}}},
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        $('#reportModalC').html('Thank you for submitting your report. A moderator will respond to it in due course.');
                    },
                    error: function(xhr, status, error) {
                        $('#reportModalC').html('Sorry, but your report could not be processed due to a server error. Please manually submit your report to a moderator via email.');
                    }
                });
            }
        </script>
    </div>
@endsection
