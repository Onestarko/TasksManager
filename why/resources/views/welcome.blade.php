@extends('layouts.app')

@section('content')
    <style>
        .thumbnail{
            padding:0;
        }
        .thumbnail.caption{
            padding:0;
        }
        a{
            color:black;
        }

        .icon-bar{
            width:90%;
            background-color: #dff0d8;
            opacity: 0.7;
            list-style:none;
            z-index: 100;
            position:absolute;
            top:0;
        }

        .but{
            background:transparent;
            border:none;
            border-radius:0;
            padding:0;
        }

        li{
            float: right;
            margin-right:0;
        }

        .project-modal{
            background-color:#fff;
            border:1px dotted #ddd;
            border-radius:4px;
            display: block;
            width:268px;
            height:184px;
            line-height:1.42857;
            margin-top:30px;
            margin-bottom:20px;
            padding:4px;
            transition:bordeer 0.2s ease-in-out 0s;
        }




    </style>


<div class="container">
    <div class="row">
        <div class="row">
            @if($projects)
                @foreach($projects as $project)
                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail">

                            <ul class="icon-bar">
                                <li>
                                    @include('projects.delectForm')
                                </li>
                                <li>
                                    <button type="button" class="btn" data-toggle="modal" data-target="#editModal-{{$project->id}}">
                                        <i class="fa fa-btn fa-cog"></i>
                                    </button>
                                </li>
                            </ul>

                            <a href="{{route('projects.show',$project->name)}}">
                            <img src="{{asset('thumbnails/'.$project->thumbnail)}}" alt="{{$project->name}}">
                            </a>
                            <div class="caption">
                                <a href="{{route('projects.show',$project->name)}}">
                                    <h4 class="text-center">{{$project->name}}</h4>
                                </a>
                            </div>
                        </div>
                            @include('projects.editModal')
                    </div>
                @endforeach
            @endif <div class="project-modal col-sm-6 col-md-3">
                @include('projects/createProjectModal')
            </div>
        </div>


    </div>
</div>


@endsection

@section('customJS')
    <script>
        $(document).ready(function(){
            $('.icon-bar').hide();
            $('.thumbnail').hover(function() {
                $(this).find('.icon-bar').toggle();
            });
        });
    </script>
@endsection