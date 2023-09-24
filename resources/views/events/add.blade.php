{!! Form::open(['method'=>'POST', 'action'=>'EventController@store']) !!}
		@csrf
        <div class="form-group">
            {!! Form::label('first_name', 'First Name:') !!}
            {!! Form::text('first_name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('last_name', 'Last Name:') !!}
            {!! Form::text('last_name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('event_title', 'Event Title:') !!}
            {!! Form::text('event_title', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('start_date', 'Start Date:') !!}
            {!! Form::text('start_date', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('end_date', 'End Date:') !!}
            {!! Form::text('end_date', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create Event', ['class'=>'form-control']) !!}
        </div>

    {!! Form::close() !!}