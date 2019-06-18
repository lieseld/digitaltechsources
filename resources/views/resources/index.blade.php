@extends('layouts.app')

@section('content')
    <div class="ui main container">
        <h1 class="ui header">Resources</h1>
        <h3 class="ui top attached inverted header">
            Featured
        </h3>
        <div class="ui attached segment" style="padding: 0;">
            <div class="ui items" style="padding: 0; margin: 0;">
                <div class="ui divided items">
                    <div class="item">
                        <div class="ui medium image">
                            <img src="https://previews.123rf.com/images/gstockstudio/gstockstudio1502/gstockstudio150200424/36811165-choosing-the-best-ingredient-for-his-meal-thoughtful-young-african-chef-in-white-uniform-holding-bro.jpg">
                        </div>
                        <div class="content" style="padding: 20px;">
                            <h1 class="ui header">12 Years a Slave</h1>
                            <div class="meta">
                                <span class="cinema">Union Square 14</span>
                            </div>
                            <div class="description">
                                <p>asdasds</p>
                            </div>
                            <div class="extra">
                                <div class="ui label">IMAX</div>
                                <div class="ui label"><i class="globe icon"></i> Additional Languages</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <div class="ui two column grid">
            <div class="column">
                <h2 class="ui header">New Releases</h2>
                <div class="ui cards">
                @foreach($resources as $resource)
                <div class="ui card">
                    <div class="ui fluid image">
                        <img src="{{$resource->thumbnail_url}}">
                    </div>
                    <div class="content">
                        <div class="header">{{$resource->name}}</div>
                        <div class="meta">
                            <span class="right floated time">{{$resource->uploaded_at}}</span>
                            <span class="category">{{$resource->category->name}}</span>
                        </div>
                        <div class="description">
                            <p>{{$resource->short_description}}</p>
                        </div>
                    </div>
                    <div class="extra content">
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
                        <a class="right floated">
                          <i class="eye icon"></i>
                          View
                        </a>
                    </div>
                </div>
                @endforeach
                </div>
            </div>
            <div class="column">
                <h2 class="ui header">Search by Category</h2>
                <div class="ui fluid category search">
                    <div class="ui icon input">
                        <input class="prompt" type="text" placeholder="Search...">
                        <i class="search icon"></i>
                    </div>
                    <div class="results"></div>
                </div>
                <div class="ui middle aligned selection list">
                    <div class="item">
                        <img class="ui avatar image" src="/images/avatar/small/helen.jpg">
                        <div class="content">
                            <div class="header">Helen</div>
                        </div>
                    </div>
                    <div class="item">
                        <img class="ui avatar image" src="/images/avatar/small/christian.jpg">
                        <div class="content">
                            <div class="header">Christian</div>
                        </div>
                    </div>
                    <div class="item">
                        <img class="ui avatar image" src="/images/avatar/small/daniel.jpg">
                        <div class="content">
                            <div class="header">Daniel</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
