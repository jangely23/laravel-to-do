<x-template-two-columns :varContent='$tareas'>
    <x-forms.view-create :name="'Mis tareas'" :action="'nombre-todos'">

        @if (session('success'))
            <x-forms.success-alert id="alert-21"> 
                {{ session('success') }}
            </x-forms.success-alert>
        @endif

        @error('title')
            <x-forms.error-alert id="alert-2" >
                    {{ $message }}
            </x-forms.error-alert>
        @enderror

        <input type="hidden" name="user_id" value="{{ $user->id }}">

        <x-forms.input-field :name="'title'" :type="'text'"> {{ __('Título tarea') }}</x-forms.input-field>

        <x-forms.select-field name="category_id" id="category_id" label="Categoria"  required>
            @foreach ($categorias as $categoria )
                <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
            @endforeach 
        </x-forms.select-field>

        <x-forms.select-field name="priority_id" id="priority_id" label="Prioridad"  required>
            @foreach ($prioridades as $prioridad)
                <option value="{{ $prioridad->id }}">{{ $prioridad->name }}</option>
            @endforeach
        </x-forms.select-field>

        <x-buttons.button-primary> {{__('Guardar nueva tarea')}} </x-buttons.button-primary>
                
    </x-forms.view-create>
            
    @if ($tareas)
        <x-tables.template-table>
            <x-tables.head>
                <div >
                    <span>{{__('Prioridad')}}</span>
                </div>

                <div >
                    <span>{{__('Tarea')}}</span>
                </div>

                <div >
                    <span>{{__('Categoria')}}</span>
                </div>

                <div >
                    <span>{{__('Acción')}}</span>
                </div>                        
            </x-tables.head>
        
            @foreach ( $tareas as $tarea )
            
                <x-tables.head-mobile>
                    <div>
                        <span>{{__('Prioridad')}}</span>
                    </div>

                    <div>
                        <span>{{__('Tarea')}}</span>
                    </div>

                    <div>
                        <span>{{__('Categoria')}}</span>
                    </div>

                    <div>
                        <span>{{__('Acción')}}</span>
                    </div>                        
                </x-tables.head-mobile>

                <x-tables.content>

                    <div class="text-xs font-semibold" style="color: {{ $tarea->priorities->color }}">
                        <span>{{__( $tarea->priorities->name )}}</span>
                    </div>
                    
                    <div>  
                        <a href="{{ route('show-todos', ['id' => $tarea->id ]) }}" >{{ __($tarea->title) }}</a>    
                    </div>

                    <div>
                        <span class="text-xs text-wrap text-white px-2 py-1 rounded-md" style="background-color: {{ $tarea->categorias->color }}">{{ __($tarea->categorias->name) }}</span>
                    </div>
                    
                    <x-buttons.button-danger data-modal-target="modal-{{ $tarea->id }}"> {{ __('Eliminar') }} </x-buttons.button-danger>                    
                        
                </x-tables.content>

                <!-- Modal Alerta Delete -->
                <x-modals.alert-delete :identifier="$tarea->id" 
                    :action="'¡Eliminar tarea!'" :message="'Este proceso borrara de forma permanente la tarea seleccionada, sin opción de recuperación. ¿Desea continuar?'" >
                                    
                    <x-buttons.button-danger-form :routeName="'destroy-todos'" :routeParams="$tarea->id" :methodForm="'POST'" :methodController="'DELETE'"> 
                        {{ __('Aceptar') }}
                    </x-buttons.button-danger-form>
                    
                    <x-buttons.button-secondary type="button"  data-close-button="modal-{{ $tarea->id }}"> {{ __('Cancelar') }} </x-buttons.button-secondary>
                
                </x-modals.alert-delete>
            
            @endforeach
            
        </x-tables.template-table>
    @endif
</x-template-two-columns>

