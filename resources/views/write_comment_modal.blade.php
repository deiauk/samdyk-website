<div id="write_comment_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            {{ Form::open(['onsubmit' => 'return false']) }}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                {{ Form::label('comment', 'Komentaras') }}
                {{ Form::textarea('comment', null, array('class' => 'form-control', 'required'=> '', 'id' => 'comment-field', 'minlength' => '10')) }}
            </div>
            <div class="modal-footer" data-usr="{{$data['id']}}">
                {{Form::submit('Išsaugoti', array('class' => 'btn btn-success btn-lg btn-block post_comment', null))}}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>