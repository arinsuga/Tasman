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

      <!-- input text -->
      <div class="form-group">
        <label>NIK</label>
        <input type="text" {{ $disabled }} id="nik" name="nik" class="form-control" placeholder="">
        <p class="text-red">{{ $errors->first('nik') }}</p>
      </div>

      <!-- input text -->
      <div class="form-group">
        <label>Nama</label>
        <input type="text" {{ $disabled }} id="name" name="name" class="form-control" placeholder="">
        <p class="text-red">{{ $errors->first('name') }}</p>
      </div>

      <!-- text input:text -->
      <div class="form-group">
        <label>Jabatan</label>
        @if ($fieldEnabled == true)
          <select name="job_id" class="form-control">
                @foreach ($job as $key => $item)

                  @if ($errors->any())
                    {{ ($item->id == old('job_id') ? $selected = 'selected' : $selected = '') }}
                  @else
                    {{ ( $item->id == $viewModel->data->job_id ) ? $selected = 'selected' : $selected = '' }}
                  @endif
                  <option {{ $selected }} value="{{ $item->id }}">{{ $item->name }}</option>
                  
                @endforeach
            </select>
        @else
          <input type="hidden" name="job_id" value="{{ $viewModel->data->job_id }}" readonly>
          <div class="form-group">
              <input disabled type="text" value="{{ $viewModel->data->activitytype->name }}" class="form-control">
          </div>
        @endif
        <p class="text-red">{{ $errors->first('job_id') }}</p>

      </div>
      
    </div>
</div>


