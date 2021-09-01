<div class="card" style="margin-bottom: 20px; width: 50%;
margin-left: auto; margin-right:auto;">
    <div class="card-body">

      <!-- text input:file -->
      <div class="form-group">
        <input type="hidden" id="image" name="image" value="{{ $viewModel->data->image }}">
        <input type="hidden" id="toggleRemoveImage" name="toggleRemoveImage" value="false">
        @if ($fieldEnabled == true)
          <label>Image</label>
          <div class="box full-width-sm">
              
              <img id="imageViewer" src="{{ Arins\Facades\Filex::image($viewModel->data->image) }}" alt="">

              @if ($viewModel->data->image)
                <span class="control control-widebox">
                  <a onclick="event.preventDefault(); document.getElementById('upload').click();" href="#"><i class="fas fa-lg fa-edit"></i></a>
                  <a onclick="event.preventDefault(); removeImage('upload', 'imageViewer', 'toggleRemoveImage');" href="#"><i class="fas fa-lg fa-trash"></i></a>
                </span>
              @else
                <span class="control control-box">
                  <a id="controlAdd" onclick="event.preventDefault(); document.getElementById('upload').click();" href="#"><i class="fas fa-lg fa-plus"></i></a>
                  <a id="controlRemove" onclick="event.preventDefault(); removeImage('upload', 'imageViewer', 'toggleRemoveImage');" href="#" class="hide" ><i class="fas fa-lg fa-trash"></i></a>
                </span>
              @endif
          </div>
          <input onchange="previewImage('upload', 'imageViewer', 'toggleRemoveImage');" style="display:none;" type="file" id="upload" name="upload" class="form-control" accept="image/*">
        @else
          <label>Image</label>
          <div class="box full-width-sm">
              <img src="{{ Arins\Facades\Filex::image($viewModel->data->image) }}" alt="">
          </div>
        @endif
      </div>

      <!-- text input:text -->
      <div class="form-group">
        <label>Jenis Pekerjaan</label>
        @if ($fieldEnabled == true)
          <select name="activitytype_id" class="form-control">
                @foreach ($activitytype as $key => $item)
                <option value="{{ $item->id }}" {{ ( $viewModel->data->activitytype_id == $item->id) ? 'selected' : '' }}>{{ $item->name }}</option>
                @endforeach
            </select>
        @else
          <input type="hidden" name="activitytype_id" value="{{ $viewModel->data->activitytype_id }}" readonly>
          <div class="form-group">
              <input disabled type="text" value="{{ $viewModel->data->activitytype->name }}" class="form-control">
          </div>
        @endif
        <strong>{{ $errors->first('activitytype_id') }}</strong>

      </div>

      <div class="row">
        <div class="col-sm-12 col-md-6">
          <!-- text input:text -->
          <div class="form-group">
            <label>Mulai</label>
            @if ($fieldEnabled == true)
              <input type="text" id="startdt" name="startdt" class="form-control date" placeholder=""
              value="{{ \Arins\Facades\Formater::datetime($viewModel->data->startdt) }}">
            @else
              <input disabled type="text" id="startdt" name="startdt" class="form-control" placeholder=""
              value="{{ \Arins\Facades\Formater::datetime($viewModel->data->startdt) }}">
            @endif
            <strong>{{ $errors->first('startdt') }}</strong>
          </div>
        </div>

        <div class="col-sm-12 col-md-6">
          <!-- text input:text -->
          <div class="form-group">
            <label>Selesai</label>
            @if ($fieldEnabled == true)
              <input type="text" id="enddt" name="enddt" class="form-control date" placeholder=""
              value="{{ \Arins\Facades\Formater::datetime($viewModel->data->enddt) }}">
            @else
              <input disabled type="text" id="enddt" name="enddt" class="form-control" placeholder=""
              value="{{ \Arins\Facades\Formater::datetime($viewModel->data->enddt) }}">
            @endif
            <strong>{{ $errors->first('enddt') }}</strong>
          </div>
        </div>
      </div>

      <!-- textarea -->
      <div class="form-group">
        <label>Deskripsi</label>
        @if ($fieldEnabled == true)
          <textarea id="description" name="description" class="form-control" rows="3" placeholder="">{{ $viewModel->data->description }}</textarea>
        @else
          <textarea disabled name="description" class="form-control" rows="3" placeholder="">{{ $viewModel->data->description }}</textarea>
        @endif
        <strong>{{ $errors->first('description') }}</strong>
      </div>
    </div>
</div>


