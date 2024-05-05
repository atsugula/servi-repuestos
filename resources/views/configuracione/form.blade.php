<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-12 col-md-4">
                <!-- File para el logo del proyecto -->
                <div class="form-group">
                    <label for="input-logo">{{__('Edit your icon')}}:</label>
                    <div class="card img-logo">
                        <input type="file" name="icono" class="input-img-logo" id="input-icono" value="{{$configuracione->logo_auth ?? 'img/config/logo.png'}}"/>
                        <img id="img-icono" src="{{asset($configuracione->icono ?? 'img/config/favicon.ico')}}" />
                        <div class="icon-wrapper">
                            <i class="fa fa-upload fa-5x"></i>
                        </div>
                    </div>
                    {!! $errors->first('icono', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-4">
                <!-- File para el logo del proyecto -->
                <div class="form-group">
                    <label for="input-logo">{{__("Edit your user's logo")}}:</label>
                    <div class="card img-logo">
                        <input type="file" name="logo_auth" class="input-img-logo" id="input-logo_auth" value="{{$configuracione->logo_auth ?? 'img/config/logo.png'}}"/>
                        <img id="img-logo_auth" src="{{asset($configuracione->logo_auth ?? 'img/config/logo.png')}}" />
                        <div class="icon-wrapper">
                            <i class="fa fa-upload fa-5x"></i>
                        </div>
                    </div>
                    {!! $errors->first('logo_auth', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-4">
                <!-- File para el logo del proyecto -->
                <div class="form-group">
                    <label for="input-logo">{{__('Edit your logo of proyect')}}:</label>
                    <div class="card img-logo">
                        <input type="file" name="img_auth" class="input-img-logo" id="input-img_auth" value="{{$configuracione->logo_auth ?? 'img/config/logo.png'}}"/>
                        <img id="img-img_auth" src="{{asset($configuracione->img_auth ?? 'img/config/logo.png')}}" />
                        <div class="icon-wrapper">
                            <i class="fa fa-upload fa-5x"></i>
                        </div>
                    </div>
                    {!! $errors->first('img_auth', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <hr>
        <a class="btn btn-danger btn-block text-white" href="{{ route('backup') }}"><i class="fa fa-download"></i> <strong>{{__('Generate backup')}}</strong></a>
        <hr>
    </div>
    @include('layouts.btn-submit')
</div>
