@extends('layouts.app')

@section('content')
    <div class="ui main container">
        <h2 class="ui header">User Groups</h2>
        <div class="ui grid">
            <div class="four wide column">
                @include('includes.adminsidebar')
            </div>
            <div class="twelve wide column">
                <h3 style="color: {{$group->colour}}">
                    <i class="{{$group->colour}} circle icon"></i>
                    {{$group->name}}
                </h3>
                <div class="ui divider"></div>
                <div class="ui grid">
                    <div class="six wide column">
                        <h4>Details</h4>
                        <div class="ui list">
                            <div class="item">
                                <div class="content">
                                    <div class="header">Short Name</div>
                                    <div class="description">{{$group->short_name}}</div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="content">
                                    <div class="header">Description</div>
                                    <div class="description">{{$group->description}}</div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="content">
                                    <div class="header">Colour</div>
                                    <div class="description">
                                        <i class="{{$group->colour}} circle icon"></i>
                                        {{ucfirst($group->colour)}}
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="content">
                                    <div class="header">Access Private Categories/Files</div>
                                    <div class="description">
                                        @if ($group->access_priv_resource_categories)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="content">
                                    <div class="header">Created</div>
                                    <div class="description">{{$group->created_at}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="six wide column">
                        <h4>Members</h4>
                        <table id="membersTable" class="ui celled table">
                            <thead>
                            <th>Name</th>
                            <th>View</th>
                            </thead>
                            <tbody>
                            @foreach ($members as $member)
                                <tr>
                                    <td>{{$member->name}}</td>
                                    <td>
                                        <a href="{{route('admin.users.view', $member->id)}}">
                                            <i class="eye icon"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <script>
                            $(document).ready(function() {
                                $('#membersTable').DataTable({
                                    "scrollY": "200px",
                                    "scrollCollapse": true,
                                    "paging": false
                                });
                            } );
                        </script>
                    </div>
                </div>
                <div class="ui divider"></div>
                <a href="#" id="editGroupB" class="ui blue small button">Edit Group</a>
                <script>
                    $(document).on("click", "#editGroupB", function(){
                        $('#editGroupModal')
                            .modal('show')
                        ;
                    });
                </script>
            </div>
        </div>
    </div>
    <div class="ui small modal" id="editGroupModal">
        <i class="close icon"></i>
        <div class="header">
            Edit user group
        </div>
        <div class="content">
            <form id="addForm" class="ui form">
                @csrf
                <div class="field">
                    <label>Name</label>
                    <div class="ui input">
                        <input name="name" value="{{$group->name}}" type="text" placeholder="Primary Students">
                    </div>
                </div>
                <div class="field">
                    <label>Short Name (max 15 char)</label>
                    <div class="ui input">
                        <input value="{{$group->short_name}}" name="short_name" maxlength="15" type="text" placeholder="PrimStudent">
                    </div>
                </div>
                <div class="field">
                    <label>Description</label>
                    <div class="ui input">
                        <textarea name="name" placeholder="Primary Students">{{$group->description}}</textarea>
                    </div>
                </div>
                <div class="field">
                    <label>Colour</label>
                    <div class="ui selection dropdown">
                        <input type="hidden" value="{{$group->colour}}" name="colour">
                        <i class="dropdown-icon"></i>
                        <div class="default text">Select one..</div>
                        <div class="menu">
                            <div class="item" data-value="grey">
                                <i class="grey circle icon"></i>None (Grey)
                            </div>
                            <div class="item" data-value="red">
                                <i class="red circle icon"></i>Red
                            </div>
                            <div class="item" data-value="orange">
                                <i class="orange circle icon"></i>Orange
                            </div>
                            <div class="item" data-value="yellow">
                                <i class="yellow circle icon"></i>Yellow
                            </div>
                            <div class="item" data-value="olive">
                                <i class="olive circle icon"></i>Olive
                            </div>
                            <div class="item" data-value="green">
                                <i class="green circle icon"></i>Green
                            </div>
                            <div class="item" data-value="teal">
                                <i class="teal circle icon"></i>Teal
                            </div>
                            <div class="item" data-value="blue">
                                <i class="blue circle icon"></i>Blue
                            </div>
                            <div class="item" data-value="violet">
                                <i class="violet circle icon"></i>Violet
                            </div>
                            <div class="item" data-value="purple">
                                <i class="purple circle icon"></i>Purple
                            </div>
                            <div class="item" data-value="pink">
                                <i class="pink circle icon"></i>Pink
                            </div>
                            <div class="item" data-value="brown">
                                <i class="brown circle icon"></i>Brown
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <div class="ui toggle checkbox">
                        <input checked="{{$group->access_priv_resource_categories}}" name="access_priv_resource_categories" type="checkbox">
                        <label>Can access private categories</label>
                    </div>
                </div>
                <script>
                    $('.ui.dropdown')
                        .dropdown()
                    ;
                </script>
                <a onclick="submit()" id="submitB" class="ui green left icon button">
                    <i class="save icon"></i> Edit Group
                </a>
            </form>
            <div class="ui hidden message" id="errorMsg"></div>
            <script type="text/javascript">
                function submit() {
                    $('#submitB').addClass('loading');
                    var name = $("input[name=name").val();
                    var short_name = $("input[name=short_name").val();
                    var description = $("input[name=description").val();
                    var colour = $("input[name=colour").val();
                    var access_priv_resoruce_categories = $("input[name=access_priv_resoruce_categories").val();

                    $.ajax({
                        type: 'POST',
                        url: '{{ route('admin.users.edit', 1) }}',
                        data: {name: name, short_name: short_name, description: description, colour: colour, access_priv_resoruce_categories: access_priv_resoruce_categories},
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            $('#submitB').removeClass('loading').addClass('disabled').text('Added!');
                            window.location.href = data.redirect;
                        },
                        error: function(xhr, status, error) {
                            $('#submitB').removeClass('loading').addClass('red disabled').text('Failed');
                            $('#errorMsg').removeClass('hidden').addClass('error').html(
                                "<b>" + xhr.status + " " + xhr.statusText + "</b><br>" + error
                            );
                        }
                    })
                }
            </script>
        </div>
    </div>
@endsection
