@extends('layouts.app')

@section('content')
    <div class="container" ng-controller="PostController">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <button class="btn btn-primary btn-xs pull-right" ng-click="initPost()">Add Post</button>
                        Posts
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif


                        <table class="table table-bordered table-striped" ng-if="posts.length > 0">
                            <tr>
                                <th>No.</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Category</th>
                                <th>Tags</th>
                                <th>Action</th>
                            </tr>
                            <tr ng-repeat="(index, posts) in posts">
                                <td>
                                    @{{ index + 1 }}
                                </td>
                                <td>@{{ posts.title }}</td>
                                <td>@{{ posts.slug }}</td>
                                <td>@{{ posts.content }}</td>
                                <td>@{{  }}</td>
                                <td>
                                    <button class="btn btn-default btn-xs" ng-click="initEdit(index)">Edit</button>
                                    <a class="btn btn-default btn-xs" href="{{url('/')}}">View</a>
                                    <button class="btn btn-primary btn-xs" ng-click="deletePost(index)" >Delete</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    @include('modals.add_post')
    @include('modals.edit_post')
    </div>
@endsection