
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
/*
require('./bootstrap');

window.Vue = require('vue');
*/
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
/*
Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});
*/

import './bootstrap';
import 'angular';

var blackend = angular.module('blackend',[]);

blackend.controller('PostController', ['$scope','$http', function($scope,$http){// Opening

    $scope.posts = [];
    // List posts
    $scope.loadPosts = function () {
        $http.get('/posts')
            .then(function success(e) {
            $scope.posts = e.data.posts;
        });
    };
    $scope.loadPosts();

    $scope.errors = [];
    
        $scope.posts = {
            title: '',
            slug: '',
            content: ''
        };
        $scope.initPost = function () {
            $scope.resetForm();
            $("#add_new_post").modal('show');
        };
    
        // Add new Post
        $scope.addPost = function () {
            $http.post('/posts', {
                title: $scope.posts.title,
                slug: $scope.posts.slug,
                content: $scope.posts.content
            }).then(function success(e) {
                $scope.resetForm();
                $scope.posts.push(e.data.posts);
                $("#add_new_post").modal('hide');
    
            }, function error(error) {
                $scope.recordErrors(error);
            });
        };
    
        $scope.recordErrors = function (error) {
            $scope.errors = [];
            if (error.data.errors.title) {
                $scope.errors.push(error.data.errors.title[0]);
            }
    
            if (error.data.errors.content) {
                $scope.errors.push(error.data.errors.content[0]);
            }
        };
    
        $scope.resetForm = function () {
            $scope.posts.title = '';
            $scope.posts.content = '';
            $scope.errors = [];
        };
    
        $scope.edit_post = {};
        // initialize update action
        $scope.initEdit = function (index) {
            $scope.errors = [];
            $scope.edit_post = $scope.posts[index];
            $("#edit_post").modal('show');
        };
    
        // update the given post
        $scope.updatePost = function () {
            $http.patch('/posts/' + $scope.edit_post.id, {
                title: $scope.edit_post.title,
                content: $scope.edit_post.content
            }).then(function success(e) {
                $scope.errors = [];
                $("#edit_post").modal('hide');
            }, function error(error) {
                $scope.recordErrors(error);
            });
        };

        // delete the given post
        $scope.deletePost = function (index) {
        
                var conf = confirm("Do you really want to delete this post?");
        
                if (conf === true) {
                    $http.delete('/posts/' + $scope.posts[index].id)
                        .then(function success(e) {
                            $scope.posts.splice(index, 1);
                        });
                }
            };

}]); //Closing