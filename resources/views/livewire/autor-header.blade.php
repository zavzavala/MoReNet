<div>
  <br><br>
<div class="page-header">
  <div class="row align-items-center">
    <div class="col-auto">
      <span class="avatar avatar-md" style="background-image: url({{$autor->picture}})"></span>
    </div>
    <div class="col-md-8">
      <h2 class="page-title">{{ $autor->name}}</h2>
      <div class="page-subtitle">
        <div class="row">
          <div class="col-auto">
            <!-- Download SVG icon from http://tabler-icons.io/i/building-skyscraper -->
            <!-- SVG icon code -->
            <a href="#" class="text-reset">@ {{ $autor->username}} | {{ $autor->autorType->name}}</a>
          </div>
          
        </div>
      </div>
    </div>
    <div class="col-auto d-none d-md-flex">
      <input type="file" name="file" id="changeProfilePicture" class="d-none" onchange="this.dispatchEvent(new InputEvent('input'))">
      <a href="#" class="btn btn-primary" onclick="event.preventDefault();document.getElementById('changeProfilePicture').click();">
        <!-- Download SVG icon from http://tabler-icons.io/i/message -->
        <!-- SVG icon code -->
        Alterar foto
      </a>
    </div>
  </div>
</div>
</div>
