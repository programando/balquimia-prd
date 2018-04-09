<!DOCTYPE html>
<html>
  <head>
        @include('templates.metas')
        @include('templates.css')
  </head>
  <body>

    <div class="page login-page">
      <div class="container d-flex align-items-center">

        <div class="form-holder has-shadow">
          <div class="row">

            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1>BALQUIMIA ADMINISTRADOR DE PRODUCTOS</h1>
                  </div>
                    <br>
                    @section('ContenidoFrase')
                      <p>{{ $Frase }}</p>
                      @if ( isset( $Usuario ) && strlen($Usuario)> 0 )
                        <div class="text-right">
                             <p>
                                {{ $Autor }} <small><br>  {{ trans('_app.frase_user_lbl') }}  {{ $Usuario }} </small>
                              </p>
                          </div>
                        @else
                        <div class="text-right">
                            <p>
                                {{ $Autor }}
                            </p>
                        </div>
                      @endif
                    @show
                </div>
              </div>
            </div>



            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">

              <div class="form d-flex align-items-center">
                <div class="content">
                  <div class="text-danger">
                  {{ Session()->get('LoginError')}}
                  </div>

                  {!! Form::open( ['url'=> route('login'),  ] ) !!}

                    {{-- Campo Email  =====================================================================================--}}
                    <div class="form-group">
                      {!! Form::text('email', null,
                        [
                          'class'       => $errors->has('email') ? 'input-material form-control is-invalid' : 'input-material',
                          'required',
                        ])
                      !!}

                      @if ( $errors->has('email') )
                          <div class="invalid-feedback"><i class='fa fa-exclamation-circle'></i> {{ $errors->first('email') }} </div>
                      @endif

                      <label for="login-username" class="label-material">{{ trans('_app.email_lbl')}}</label>

                   </div>
                  {{-- /Campo Email =====================================================================================--}}


                    {{-- Campo Password =====================================================================================--}}
                    <div class="form-group">
                      {!! Form::password('password',
                        [
                          'class'       => $errors->has('password') ? 'input-material form-control is-invalid' : 'input-material',
                        ])
                      !!}
                      @if ( $errors->has('password') )
                          <div class="invalid-feedback"><i class='fa fa-exclamation-circle'></i> {{ $errors->first('password') }} </div>
                      @endif
                      <label for="login-password" class="label-material">{{ trans('_app.passw_lbl') }}</label>
                    </div>
                    {{-- /Campo Password =====================================================================================--}}


                    {{-- Check Box Mantenerme conectado =====================================================================================--}}
                    {!! Form::checkbox('remember_me',1,'true', [ 'class'=> 'checkbox-template' ]) !!}
                    <label for="checkboxCustom2">{{ trans('_app.sesion_chk_lbl') }}</label><br>
                    {{-- /Check Box --}}

                    {{--Botón Submit =====================================================================================--}}
                      <button type ="submit" class="btn btn-primary">
                          {{ trans('_app.btn_ingresar_sys') }}
                      </button>
                    {{-- /Botón Submit ===================================================================================== --}}

               {!! Form::close() !!}


                </div> {{-- / Clase Content --}}
              </div>   {{-- /form d-flex align-items-center --}}
            </div>     {{-- /col-lg-6 bg-white --}}
          </div>       {{-- /row --}}
        </div>         {{-- /form-holder has-shadow --}}
      </div>           {{-- /container d-flex align-items-center --}}
    </div>            {{-- /page login-page --}}

   @include('templates.js')
  </body>
</html>
