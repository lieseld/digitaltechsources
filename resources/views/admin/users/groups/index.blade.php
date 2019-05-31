@extends('layouts.app')

@section('content')
    <div class="ui main container">
        <h2 class="ui header">User Groups</h2>
        <div class="ui grid">
            <div class="four wide column">
                @include('includes.adminsidebar')
            </div>
            <div class="twelve wide column">`
                <h4>Groups</h4>
                <table id="dataTable" class="ui celled table">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Short Name</th>
                        <th>View</th>
                    </thead>
                    <tbody>
                        @foreach ($groups as $group)
                            <tr>
                                <td>{{$group->id}}</td>
                                <td>{{$group->name}}</td>
                                <td>{{$group->short_name}}</td>
                                <td>
                                    <a href="{{route('admin.users.groups.view', $group->id)}}">
                                        <i class="eye icon"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="#" id="addGroupB" class="ui blue small button">Add Group</a>
                <script>
                    $(document).on("click", "#addGroupB", function(){
                        $('#changeEmailModal')
                            .modal('show')
                        ;
                    });
                </script>
            </div>
            <script>
                $(document).ready(function() {
                    $('#dataTable').DataTable();
                } );
            </script>
        </div>
    </div>
    <div class="ui small modal" id="changeEmailModal">
        <i class="close icon"></i>
        <div class="header">
            Add user group
        </div>
        <div class="content">
            <form id="addForm" class="ui form">
                @csrf
                <div class="field">
                    <label>Name</label>
                    <div class="ui input">
                        <input name="name" type="text" placeholder="Primary Students">
                    </div>
                </div>
                <div class="field">
                    <label>Short Name (max 15 char)</label>
                    <div class="ui input">
                        <input name="short_name" maxlength="15" type="text" placeholder="PrimStudent">
                    </div>
                </div>
                <div class="field">
                    <label>Description</label>
                    <div class="ui input">
                        <textarea name="name" placeholder="Primary Students"></textarea>
                    </div>
                </div>
                <div class="field">
                    <label>Colour</label>
                    <div class="ui selection dropdown">
                        <input type="hidden" name="colour">
                        <i class="dropdown-icon"></i>
                        <div class="default text">Select one..</div>
                        <div class="menu">
                            <div class="item" data-value="0">
                                <i class="grey circle icon"></i>None
                            </div>
                            <div class="item" data-value="0">
                                <i class="red circle icon"></i>Red
                            </div>
                            <div class="item" data-value="0">
                                <i class="orange circle icon"></i>Orange
                            </div>
                            <div class="item" data-value="0">
                                <i class="yellow circle icon"></i>Yellow
                            </div>
                            <div class="item" data-value="0">
                                <i class="olive circle icon"></i>Olive
                            </div>
                            <div class="item" data-value="0">
                                <i class="green circle icon"></i>Green
                            </div>
                            <div class="item" data-value="0">
                                <i class="teal circle icon"></i>Teal
                            </div>
                            <div class="item" data-value="0">
                                <i class="blue circle icon"></i>Blue
                            </div>
                            <div class="item" data-value="0">
                                <i class="violet circle icon"></i>Violet
                            </div>
                            <div class="item" data-value="0">
                                <i class="purple circle icon"></i>Purple
                            </div>
                            <div class="item" data-value="0">
                                <i class="pink circle icon"></i>Pink
                            </div>
                            <div class="item" data-value="0">
                                <i class="brown circle icon"></i>Brown
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <div class="ui toggle checkbox">
                        <input name="access_priv_resoruce_categories" type="checkbox">
                        <label>Can access private categories</label>
                    </div>
                </div>
                <script>
                    $('.ui.dropdown')
                        .dropdown()
                    ;
                </script>
                <a onclick="submit()" id="submitB" class="ui green left icon button">
                    <i class="plus icon"></i> Add Group
                </a>
            </form>
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

                        },
                        error: function(data) {
                            $('#submitB').removeClass('loading').addClass('red').text('Failed');
                            alert(data.responseJSON);
                        }
                    })
                }
            </script>
        </div>
    </div>
@endsection
