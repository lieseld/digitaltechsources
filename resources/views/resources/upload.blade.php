@extends('layouts.app')

@section('content')
    <div class="ui main container">
        <h1 class="ui header">Upload Resource</h1>
        <div class="ui raised segment">
            <p>This will have content soon</p>
        </div>
        <h3 class="ui medium dividing header">Basic details</h3>
        <div class="ui two column grid">
            <div class="column">
                <div class="ui form">
                    <div class="field">
                        <label>Name</label>
                        <div class="ui fluid input">
                            <input type="text" placeholder="Adelaide Metro 4000 class train set">
                        </div>
                    </div>
                    <div class="field">
                        <label>Short description/tagline</label>
                        <div class="ui fluid input">
                            <input type="text" placeholder="Full modular set of the Adelaide Metro 4000 class 'A-City' EMU ">
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="ui form">
                    <div class="field">
                        <label>Thumbnail</label>
                        <p>Upload a thumbnail image for your resource to another image hosting site (e.g. imgur) and paste a URL to <b>the image file</b> here.</p>
                        <div class="ui fluid input">
                            <input type="url">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <label>Long description</label>
        <textarea id="longDescription"></textarea>
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector: '#longDescription'
            });
        </script>
        <br/>
        <div class="ui two column grid">
            <div class="column">
                <div class="ui form">
                    <div class="field">
                        <label>Category</label>
                        <div class="ui fluid search selection dropdown">
                            <input type="hidden" name="category_id">
                            <i class="dropdown icon"></i>
                            <div class="default text">Select Category</div>
                            <div class="menu">
                                @php
                                $categories = \App\ResourceCategory::all();
                                @endphp
                                @foreach ($categories as $category)
                                    <div class="item" data-value="{{$category->id}}">
                                        {{$category->name}}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <script>
                            $('.ui.dropdown')
                                .dropdown()
                            ;
                        </script>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="ui form">
                    <div class="field">
                        <label>Platform (e.g. Unity, Maya)</label>
                        <div class="ui fluid input">
                            <input type="text" placeholder="Unity 5">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <div class="ui form">
            <div class="inline fields">
                <div class="field">
                    <div class="ui toggle checkbox">
                        <input tabindex="0" class="hidden" type="checkbox">
                        <label>Private resource</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui toggle checkbox">
                        <input tabindex="0" class="hidden" type="checkbox">
                        <label>18+ Adult Only</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui toggle checkbox">
                        <input tabindex="0" class="hidden" type="checkbox">
                        <label>Comments disabled</label>
                    </div>
                </div>
            </div>
        </div>
        <h3 class="ui medium dividing header">Files</h3>
    </div>
@endsection
