@if($errors->has('name'))
    <ul class="alert alert-danger">
        @foreach($errors->get('name') as $error)
            <li class="pull-left">{{$error}}</li>
        @endforeach
    </ul>
@endif
{!! Form::open(['route'=>['tasks.store','project'=>$project->id],'class'=>'form-inline']) !!}

{!! Form::text('name',null,['placeholder'=>'有什么要完成的任务嘛？','class'=>'form-control']) !!}

<td class="icon-cell">
<button type="submit" class="btn btn-success">
    <i class="fa fa-plus"></i>
</button>
</td>
{!! Form::close()!!}