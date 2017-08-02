{{--{{ Form::label('title', 'Temos pavadinimas:') }}--}}
{{--{{ Form::text('title', null, array('class' => 'form-control', 'required'=> '', 'maxlength' => '100', 'id' => 'theme')) }}--}}
{{--</div>--}}
{{--<div class="modal-body">--}}
    {{--{{ Form::label('bodytext', 'Aprašymas') }}--}}
    {{--{{ Form::textarea('bodytext', null, array('class' => 'form-control', 'required'=> '', 'id' => 'description', 'minlength' => '10')) }}--}}
<div id="edit-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            {{ Form::open(['onsubmit' => 'return false']) }}
            <div class="modal-header" >
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Redaguoti profilį</h4>
            </div>

            <div class="modal-body">
                <div class="fileUpload btn btn-primary text-center">
                    <span>Keisti nuotrauką</span>
                    <input type="file" class="upload">
                </div>
                <br>

                <div class="row">
                    <div class="skill-list clearfix">
                        <div class="skill-input">
                            <div class="col-md-9">
                                {{ Form::input('text', 'skill_name[]', null, array('class' => 'form-control input-sm skill-name', 'required'=> '', 'maxlength' => '100')) }}
                                {{--<input type="text" class="form-control input-sm skill-name" name=""/>--}}
                            </div>
                            <div class="col-md-2">
                                {!! Form::number('skill_val[]', null , ['min' => '1', 'max' => '100','class' => 'form-control input-sm skill-percent', 'id' => 'number_count','required']) !!}
                                {{--{{ Form::number('number', 'skill_val[]', null, array('class' => 'form-control input-sm skill-percent', 'required'=> '', 'maxlength' => '100')) }}--}}
                                {{--<input type="number" class="form-control input-sm skill-percent" min="1" max="100" name="skill_val[]"><br>--}}
                            </div>
                            <div class="col-md-1 delete">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="pull-right add-skill">
                        <a href="#" class="js-add-skill">Prideti</a>
                    </div>
                </div>

                {{ Form::label('bodytext', 'Aprašymas') }}
                {{ Form::textarea('bodytext', null, array('class' => 'form-control', 'required'=> '', 'id' => 'description-user', 'minlength' => '10')) }}
            </div>
            <div class="modal-footer">
                {{--<button type="button" class="btn btn-success btn-lg btn-block save">Išsaugoti</button>--}}
                {{Form::submit('Išsaugoti', array('class' => 'btn btn-success btn-lg btn-block js-save-user-profile', null))}}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>