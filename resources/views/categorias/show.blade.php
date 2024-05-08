<x-template-two-columns :varContent="$categoria->todos->count()" :colorhex="$categoria->color">

    <x-buttons.button-primary :dataShowForm="'edit-form'" :class="'md:hidden'"> Editar categoria </x-buttons.button-primary> 

    <x-forms.view-show 
        :title="'Editar categoria'"
        :routeName="'categorias.update'"  
        :routeParams="$categoria->id" 
        :methodForm="'POST'" 
        :methodController="'PATCH'"
        :class="'hidden md:inline-block'"
        :id="'edit-form'"
    >

        @if (session('success'))
            <x-forms.success-alert id="alert-1"> 
                {{ session('success') }}
            </x-forms.success-alert>
        @endif

        @error('name' || 'color')
            <x-forms.error-alert id="alert-2" >
                    {{ $message }}
            </x-forms.error-alert>
        @enderror

        <x-forms.input-field :name="'name'" :type="'text'" :value="$categoria->name"  required>
            {{ __('Nombre') }}
        </x-forms.input-field>

        <x-forms.input-field :name="'color'" :type="'color'" :value="$categoria->color"  required>
            {{ __('Color') }}
        </x-forms.input-field>
      
        
        <x-buttons.button-primary >{{ __('Actualizar') }}</x-buttons.button-primary>
        <x-buttons.button-secondary :class="'md:hidden'" :dataHideForm="'edit-form'"> Cancelar </x-buttons.button-secondary>
    
    </x-forms.view-show>
             
  
    @if ($categoria->todos->count() > 0)
        <x-tables.template-table>
                
            @foreach ( $categoria->todos as $tarea )

                <x-tables.content :colorhex="'#FFFFFF'">
                    
                    <div class="font-semibold" style="color: {{ $tarea->priorities->color }}">
                        <span>{{__( $tarea->priorities->name )}}</span>
                    </div>
                    
                    <div>  
                        <a href="{{ route('tareas.show', ['tarea' => $tarea->id ]) }}" >{{ __($tarea->title) }}</a>    
                    </div>

                    <div class="w-full">
                        @php
                          $disabled = ($tarea->status == 'Completada')?'true':'false';
                        @endphp
                        <x-forms.select-form-edit 
                            :name="'status'" 
                            :routeName="'tareas.update'"  
                            :routeParams="$tarea->id"
                            :routeParam2="$categoria->id" 
                            :methodForm="'POST'" 
                            :methodController="'PATCH'"
                            :disabled="$disabled"
                        > 
                            <option value="Pendiente"  {{ ($tarea->status == 'Pendiente') ? 'selected' : '' }}   >{{ __('Pendiente') }}</option>
                            <option value="En proceso" {{ ($tarea->status == 'En proceso') ? 'selected' : '' }}  >{{ __('En proceso') }}</option>
                            <option value="Completada" {{ ($tarea->status == 'Completada') ? 'selected' : '' }}  >{{ __('Completada') }}</option>
                        </x-forms.select-form-edit>    
                    </div>
                    
                    <x-buttons.button-danger :dataModalTarget="$tarea->id" > {{ __('Eliminar') }} </x-buttons.button-danger>                    
                </x-tables.content >

                <!-- Modal Alerta Delete -->
                <x-modals.alert-delete :identifier="$tarea->id" 
                    :action="'¡Eliminar tarea!'" :message="'Este proceso borrara de forma permanente la tarea seleccionada, sin opción de recuperación. ¿Desea continuar?'" >
                                    
                    <x-buttons.button-danger-form :routeName="'tareas.destroy'" :routeParams="$tarea->id" :methodForm="'POST'" :methodController="'DELETE'"> 
                        {{ __('Aceptar') }}
                    </x-buttons.button-danger-form>
                    
                    <x-buttons.button-secondary type="button"  data-close-button="{{ $tarea->id }}"> {{ __('Cancelar') }} </x-buttons.button-secondary>
                
                </x-modals.alert-delete>
            
            @endforeach
        
        </x-tables.template-table>

     @endif

</x-template-two-columns>

