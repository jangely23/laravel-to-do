<x-template-one-column>  
    
    <x-text.title-buttom :title="'Tareas'">    
        <x-buttons.button-primary>
            <a href="{{route('tareas.create')}}" >{{ __('Nueva tarea') }}</a>
        </x-buttons.button-primary>
    </x-text.title-buttom>

    @if (count($tareas))
        <x-tables.template-table>
            
            <x-tables.head>
                <div >
                    <span>{{__('Prioridad')}}</span>
                </div>

                <div >
                    <span>{{__('Tarea')}}</span>
                </div>

                <div >
                    <span>{{__('Estado')}}</span>
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

                    <div >
                        <span>{{__('Estado')}}</span>
                    </div>

                    <div>
                        <span>{{__('Categoria')}}</span>
                    </div>

                    <div>
                        <span>{{__('Acción')}}</span>
                    </div>                        
                </x-tables.head-mobile>

                <x-tables.content>

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
                            :methodForm="'POST'" 
                            :methodController="'PATCH'"
                            :disabled="$disabled"
                        > 
                            <option value="Pendiente"  {{ ($tarea->status == 'Pendiente') ? 'selected' : '' }}   >{{ __('Pendiente') }}</option>
                            <option value="En proceso" {{ ($tarea->status == 'En proceso') ? 'selected' : '' }}  >{{ __('En proceso') }}</option>
                            <option value="Completada" {{ ($tarea->status == 'Completada') ? 'selected' : '' }}  >{{ __('Completada') }}</option>
                        </x-forms.select-form-edit>    
                    </div>

                    <div>
                        <span class="text-xs text-wrap text-white px-2 py-1 rounded-md" style="background-color: {{ $tarea->categorias->color }}">{{ __($tarea->categorias->name) }}</span>
                    </div>
                    
                    <x-buttons.button-danger :dataModalTarget="$tarea->id" > {{ __('Eliminar') }} </x-buttons.button-danger>                    
                        
                </x-tables.content>

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
               
    @else
        <div class="flex justify-center items-center">
            <div class="w-80 my-5">
                <x-forms.info-alert >{{  __('Aún no hay tareas creadas')}}</x-forms.info-alert>   
            </div>
        </div>
    @endif
</x-template-one-column>

