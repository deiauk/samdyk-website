<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            {{ Form::open(['onsubmit' => 'return false']) }}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Sukurti naują įrašą</h4>
                {{ Form::label('title', 'Temos pavadinimas:') }}
                {{ Form::text('title', null, array('class' => 'form-control', 'required'=> '', 'maxlength' => '100', 'id' => 'theme')) }}
            </div>
            <div class="modal-body">
                {{ Form::label('bodytext', 'Aprašymas') }}
                {{ Form::textarea('bodytext', null, array('class' => 'form-control', 'required'=> '', 'id' => 'description', 'minlength' => '10')) }}
            </div>
            <div class="modal-footer">
                {{--<button type="button" class="btn btn-success btn-lg btn-block save">Išsaugoti</button>--}}
                {{Form::submit('Išsaugoti', array('class' => 'btn btn-success btn-lg btn-block save', null))}}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>