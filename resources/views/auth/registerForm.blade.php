<!-- Nombre -->
 <div class="input-group">
     <span class="input-group-addon">
         <i class="now-ui-icons users_circle-08"></i>
     </span>
     {!! Form::text('name',old('name'),array('class' => 'form-control', 'placeholder' => 'Nombre...')) !!}
     @if ($errors->has('name'))
         <span class="help-block">
             <strong>{{ $errors->first('name') }}</strong>
         </span>
     @endif
 </div>
 <!-- Email -->
 <div class="input-group">
     <span class="input-group-addon">
         <i class="now-ui-icons ui-1_email-85"></i>
     </span>
     {!! Form::email('email', old('email'), array('class' => 'form-control', 'placeholder' => 'E-mail')) !!}
     @if ($errors->has('email'))
         <span class="help-block">
             <strong>{{ $errors->first('email') }}</strong>
         </span>
     @endif
 </div>
 <!-- Password -->
 <div class="input-group">
     <span class="input-group-addon">
         <i class="now-ui-icons ui-1_lock-circle-open"></i>
     </span>
     {!! Form::password('password',array('class' => 'form-control','placeholder' => 'Contraseña')) !!}
     @if ($errors->has('password'))
         <span class="help-block">
             <strong>{{ $errors->first('password') }}</strong>
         </span>
     @endif
 </div>
 <!-- Confirmación Password -->
 <div class="input-group">
     <span class="input-group-addon">
         <i class="now-ui-icons ui-1_lock-circle-open"></i>
     </span>
     {!! Form::password('password_confirmation',array('class' => 'form-control','placeholder' => 'Confirma Password')) !!}
     @if ($errors->has('password'))
         <span class="help-block">
             <strong>{{ $errors->first('password') }}</strong>
         </span>
     @endif
 </div>
 <!-- Añadir un checkbox -->
 {{-- <div class="form-check">
     <label class="form-check-label">
         <input class="form-check-input" type="checkbox">
         <span class="form-check-sign"></span>
         Estoy de acuerdo con
         <a href="#something">términos y condiciones</a>.
     </label>
 </div> --}}
 <div class="card-footer text-center">
     <button type="submit" class="btn btn-primary btn-round btn-lg">Registrar</button>
 </div>
</form>
