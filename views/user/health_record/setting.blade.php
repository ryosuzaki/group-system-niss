@extends('template')

@section('content')

<div class="card">
    <div class="card-body">
        <h3 class="text-center mb-4">健康記録の設定</h3>

        <form method="POST" action="{{ route('niss.health_record.update_setting',$info->index) }}">
            @csrf
            @method('PUT')

            <div>                    
                <p>回答しない項目</p>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="not_use_items[]" value="feeling" @if(in_array("feeling", $not_use_items)) checked @endif>
                        調子を回答しない
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>

                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="not_use_items[]" value="syokuyoku" @if(in_array("syokuyoku", $not_use_items)) checked @endif>
                        食欲を回答しない
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                    </div>
            
                    <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="not_use_items[]" value="otuzi" @if(in_array("otuzi", $not_use_items)) checked @endif>
                        お通じを回答しない
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                    </div>
                
                    <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="not_use_items[]" value="taion" @if(in_array("taion", $not_use_items)) checked @endif>
                        体温を回答しない
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                    </div>
                
                    <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="not_use_items[]" value="taiju" @if(in_array("taiju", $not_use_items)) checked @endif>
                        体重を回答しない
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                    </div>
                
                    <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="not_use_items[]" value="ketuatu" @if(in_array("ketuatu", $not_use_items)) checked @endif>
                        血圧を回答しない
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                    </div>
                
                    <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="not_use_items[]" value="warui_bui" @if(in_array("warui_bui", $not_use_items)) checked @endif>
                        症状を回答しない
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                    </div>
                
                    <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="not_use_items[]" value="comment" @if(in_array("comment", $not_use_items)) checked @endif>
                        コメントを回答しない
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                    </div>
            </div>
            
            <div class="form-group mb-0 mt-5">
                <button type="submit" class="btn btn-primary btn-block">
                設定
                </button>
            </div>
        </form>        

    </div>
</div>

@endsection