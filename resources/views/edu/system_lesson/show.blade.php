@extends('edu.layouts.master')
@section('content')
    <div class="container {{route_class()}} mt-5">
        <div class="alert alert-light text-secondary" role="alert">
            通过系统课程的学习，你可以轻松掌握一门语言。每个视频都有测试题，验证你的学习结果。
        </div>
        <div class="row">
            <div class="col-sm-9">
                @foreach($lessons as $lesson)
                    <div class="card bg-light mb-5">
                        <div class="card-header">{{$lesson['title']}}</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-10">
                                    <p class="card-text">
                                        {{$lesson['description']}}
                                    </p>
                                </div>
                                <div class="col-sm-2">
                                    <h3 class="float-right">
                                        <span class="badge badge-light text-muted">80%</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                @if($lesson['video_num']>0)
                                    <a href="#" class="btn btn-soft-instagram btn-xs">开始学习</a>
                                @else
                                    <button type="button" disabled="" class="btn btn-soft-instagram btn-xs">即将发布
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-sm-3">
                @include('edu.layouts._learning_dynamic',['row'=>10])
            </div>
        </div>
    </div>
@endsection