@php (($fieldEnabled == true ? $disabled='' : $disabled='disabled'))
<div class="card" style="margin-bottom: 20px; width: 50%;
margin-left: auto; margin-right:auto;">
    <div class="card-body">

      <!-- text input:file -->
      <div class="form-group">
        <input type="hidden" id="image" name="image" value="{{ $viewModel->data->image }}">
        <input type="hidden" id="toggleRemoveImage" name="toggleRemoveImage" value="false">
        <input type="hidden" id="imageTemp" name="imageTemp" value="{{ session('imageTemp') }}">

        @if ($fieldEnabled == true)
          <label>Image</label>
          <div class="box full-width-sm">
              @if (session('imageTemp'))
                <img id="imageViewer" src="{{ Arins\Facades\Filex::image(session('imageTemp')) }}" alt="">
              @else
                <img id="imageViewer" src="{{ Arins\Facades\Filex::image($viewModel->data->image) }}" alt="">
              @endif

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

                  @if ($errors->any())
                    {{ ($item->id == old('activitytype_id') ? $selected = 'selected' : $selected = '') }}
                  @else
                    {{ ( $item->id == $viewModel->data->activitytype_id ) ? $selected = 'selected' : $selected = '' }}
                  @endif
                  <option {{ $selected }} value="{{ $item->id }}">{{ $item->name }}</option>
                  
                @endforeach
            </select>
        @else
          <input type="hidden" name="activitytype_id" value="{{ $viewModel->data->activitytype_id }}" readonly>
          <div class="form-group">
              <input disabled type="text" value="{{ $viewModel->data->activitytype->name }}" class="form-control">
          </div>
        @endif
        <p class="text-red">{{ $errors->first('activitytype_id') }}</p>

      </div>

      <div class="row">
        <div class="col-sm-12 col-md-6">
          <!-- text input:text -->
          <div class="form-group">
            <label>Mulai</label>
            <input {{ $disabled }} type="text" id="startdt" name="startdt" class="form-control date" placeholder=""
              value="{{ ( $errors->any() ? old('startdt') : \Arins\Facades\Formater::datetime($viewModel->data->startdt) ) }}">
            <p class="text-red">{{ $errors->first('startdt') }}</p>
          </div>
        </div>

        <div class="col-sm-12 col-md-6">
          <!-- text input:text -->
          <div class="form-group">
            <label>Selesai</label>
            <input {{ $disabled }} type="text" id="enddt" name="enddt" class="form-control date" placeholder=""
              value="{{ ( $errors->any() ? old('enddt') : \Arins\Facades\Formater::datetime($viewModel->data->enddt) ) }}">
            <p class="text-red">{{ $errors->first('enddt') }}</p>
          </div>
        </div>
      </div>

      <!-- textarea -->
      <div class="form-group">
        <label>Deskripsi</label>
        <textarea {{ $disabled }} id="description" name="description" class="form-control" rows="3" placeholder="">{{ ( $errors->any() ? old('description') : $viewModel->data->description ) }}</textarea>
        <p class="text-red">{{ $errors->first('description') }}</p>
      </div>
    </div>
</div>


