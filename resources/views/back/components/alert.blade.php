@if(session('error'))
    <div style="border-radius: 0" class="alert alert-danger alert-dismissible">
        <i class="icon fa fa-ban"></i>
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
@elseif(session('success'))
    <div style="border-radius: 0;" class="alert alert-success alert-dismissible">
        <i class="icon fa fa-check"></i>
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
@elseif(session('info'))
    <div style="border-radius: 0" class="alert alert-info alert-dismissible">
        <i class="icon fa fa-info"></i>
        {{ session('info') }}
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
@elseif(session('warning'))
    <div style="border-radius: 0" class="alert alert-warning alert-dismissible">
        <i class="icon fa fa-warning"></i>
        {{ session('warning') }}
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
@endif
