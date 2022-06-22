@php (($fieldEnabled == true ? $disabled='' : $disabled='disabled'))
<div class="card" style="margin-bottom: 20px; width: 50%;
margin-left: auto; margin-right:auto;">
    <div class="card-body">

        <div class="form-group">
            <label>Requester</label>
            <select name="enduser_id" class="form-control select2">
                @foreach ($enduser as $key => $item)

                @if ($errors->any())
                    {{ ($item->id == old('enduser_id') ? $selected = 'selected' : $selected = '') }}
                @else
                    {{ ( $item->id == $viewModel->data->enduser_id ) ? $selected = 'selected' : $selected = '' }}
                @endif
                <option {{ $selected }} value="{{ $item->id }}">{{ $item->name }}</option>
                
                @endforeach
            </select>
            <p class="text-red">{{ $errors->first('enduser_id') }}</p>

        </div>

        <div class="form-group">
            <label>Teknisi</label>
            <select name="technician_id" class="form-control select2">
                @foreach ($technician as $key => $item)

                    @if ($new == true)
                        {{ ( $item->id == Auth::user()->id ) ? $selected = 'selected' : $selected = '' }}
                    @else

                        @if ($errors->any())
                        {{ ($item->id == old('technician_id') ? $selected = 'selected' : $selected = '') }}
                        @else
                        {{ ( $item->id == $viewModel->data->technician_id ) ? $selected = 'selected' : $selected = '' }}
                        @endif

                    @endif


                    <option {{ $selected }} value="{{ $item->id }}">{{ $item->name }}</option>
                    
                @endforeach
            </select>
            <p class="text-red">{{ $errors->first('technician_id') }}</p>

        </div>

        <div class="form-group">
            <label>Jenis Pengaduan</label>
            @if ($fieldEnabled == true)
            <select name="activitysubtype_id" class="form-control select2">
                    @foreach ($activitysubtype as $key => $item)

                    @if ($errors->any())
                        {{ ($item->id == old('activitysubtype_id') ? $selected = 'selected' : $selected = '') }}
                    @else
                        {{ ( $item->id == $viewModel->data->activitysubtype_id ) ? $selected = 'selected' : $selected = '' }}
                    @endif
                    <option {{ $selected }} value="{{ $item->id }}">{{ $item->name }}</option>
                    
                    @endforeach
                </select>
            @else
            <input type="hidden" name="activitysubtype_id" value="{{ $viewModel->data->activitysubtype_id }}" readonly>
            <div class="form-group">
                <input disabled type="text" value="{{ $viewModel->data->activitysubtype->name }}" class="form-control">
            </div>
            @endif
            <p class="text-red">{{ $errors->first('activitysubtype_id') }}</p>

        </div>

        <div class="form-group">
            <label>Kategori</label>
            @if ($fieldEnabled == true)
            <select id="tasktype_id" name="tasktype_id" class="form-control select2">
                    @foreach ($tasktype as $key => $item)

                    @if ($errors->any())
                        {{ ($item->id == old('tasktype_id') ? $selected = 'selected' : $selected = '') }}
                    @else
                        {{ ( $item->id == $viewModel->data->tasktype_id ) ? $selected = 'selected' : $selected = '' }}
                    @endif
                    <option {{ $selected }} value="{{ $item->id }}">{{ $item->name }}</option>
                    
                    @endforeach
                </select>
            @else
            <input type="hidden" name="tasktype_id" value="{{ $viewModel->data->tasktype_id }}" readonly>
            <div class="form-group">

                @if ($viewModel->data->tasktype_id != null)
                    <input disabled type="text" value="{{ $viewModel->data->tasktype->name }}" class="form-control">
                @else
                    <input disabled type="text" value="{{ $viewModel->data->tasktype->name }}" class="form-control">
                @endif


            </div>
            @endif
            <p class="text-red">{{ $errors->first('tasktype_id') }}</p>

        </div>

        <div class="form-group">
            <label>Sub Kategori</label>
            @if ($fieldEnabled == true)
                <select id="tasksubtype1_id" name="tasksubtype1_id" class="form-control select2">
                </select>
            @else
                <input type="hidden" name="tasksubtype1_id" value="{{ $viewModel->data->tasksubtype1_id }}" readonly>
                <div class="form-group">
                    @if ($viewModel->data->tasksubtype1_id != null)
                    <input disabled type="text" value="{{ $viewModel->data->tasksubtype1->name }}" class="form-control">
                    @else
                    <input disabled type="text" class="form-control">
                    @endif
                </div>
            @endif
            <p class="text-red">{{ $errors->first('tasksubtype1_id') }}</p>
        </div>

        <div class="form-group">
            <label>item</label>
            @if ($fieldEnabled == true)
            <select id="tasksubtype2_id" name="tasksubtype2_id" class="form-control select2">
            </select>
            @else
            <input type="hidden" name="tasksubtype2_id" value="{{ $viewModel->data->tasksubtype2_id }}" readonly>
            <div class="form-group">
                @if ($viewModel->data->tasksubtype2 != null)
                    <input disabled type="text" value="{{ $viewModel->data->tasksubtype2->name }}" class="form-control">
                @else
                    <input disabled type="text" class="form-control">
                @endif
            </div>
            @endif
            <p class="text-red">{{ $errors->first('tasksubtype2_id') }}</p>

        </div>

        <hr>

        <!-- text input -->
        <div class="form-group">
            <label>Subject</label>
            <input {{ $disabled }} type="text" id="subject" name="subject" class="form-control" value="{{ ( $errors->any() ? old('subject') : $viewModel->data->subject ) }}">
            <p class="text-red">{{ $errors->first('subject') }}</p>
        </div>

        <!-- textarea -->
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea {{ $disabled }} id="description" name="description" class="form-control" rows="3" placeholder="">{{ ( $errors->any() ? old('description') : $viewModel->data->description ) }}</textarea>
            <p class="text-red">{{ $errors->first('description') }}</p>
        </div>
    </div>
</div>


