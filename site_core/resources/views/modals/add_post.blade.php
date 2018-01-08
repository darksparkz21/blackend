{{--Pop up Modal--}}
<div class="modal fade" tabindex="-1" role="dialog" id="add_new_post">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Post</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" ng-if="errors.length > 0">
                    <ul>
                        <li ng-repeat="error in errors">@{{ error }}</li>
                    </ul>
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" ng-model="posts.title">
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" class="form-control" ng-model="posts.slug">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" rows="5" class="form-control"
                        ng-model="posts.content"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" ng-click="addPost()">Submit</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->