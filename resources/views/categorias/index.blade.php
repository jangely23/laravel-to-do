<x-template-two-columns :varContent="$categorias">
    <x-forms.view-create :name="'Mis categorias'" :action="'categorias.store'">

        @if (session('success'))
            <x-forms.success-alert id="alert-21"> 
                {{ session('success') }}
            </x-forms.success-alert>
        @endif

        @error('name' || 'color')
            <x-forms.error-alert id="alert-2" >
                    {{ $message }}
            </x-forms.error-alert>
        @enderror

        <x-forms.input-field :name="'name'" :type="'text'" required > {{ __('Nombre Categoria') }}</x-forms.input-field>

        <x-forms.input-field :name="'color'" :type="'color'" required > {{ __('Color') }}</x-forms.input-field>
 
        <x-buttons.button-primary> {{__('Crear categoria')}} </x-buttons.button-primary>

    </x-forms.view-create>

    @if ($categorias)
        <x-tables.template-table>
            <x-tables.head>
                <div >
                    <span>{{__('Color')}}</span>
                </div>

                <div >
                    <span>{{__('Categoria')}}</span>
                </div>

                <div >
                    <span>{{__('Acción')}}</span>
                </div>                        
            </x-tables.head>
            
            @foreach ( $categorias as $categoria )

                <x-tables.head-mobile>
                    <div>
                        <span>{{__('Color')}}</span>
                    </div>

                    <div>
                        <span>{{__('Categoria')}}</span>
                    </div>

                    <div>
                        <span>{{__('Acción')}}</span>
                    </div>                        
                </x-tables.head-mobile>

                <x-tables.content>
                    <div>
                        <span class="inline-flex items-center rounded-xl px-3 py-1.5 mx-3 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10" style="background-color: {{ $categoria->color }} "></span>
                    </div>
                    
                    <div>  
                        <a href="{{ route( 'categorias.show' , ['categoria' => $categoria->id ]) }}">{{ $categoria->name }}</a>  
                    </div>               
                  
                    <x-buttons.button-danger data-modal-target="modal-{{ $categoria->id }}"> {{ __('Eliminar') }} </x-buttons.button-danger>            
                </x-tables.content>
            
               
                <!-- Modal -->
                <x-modals.alert-delete :identifier="$categoria->id" :action="'¡Eliminar categoria!'" :message="'Este proceso eliminara todas las tareas realacionadas con esta categoria. ¿Desea continuar?'" >
                                
                                <x-buttons.button-danger-form :routeName="'categorias.destroy'" :routeParams="$categoria->id" :methodForm="'POST'" :methodController="'DELETE'"> 
                                    {{ __('Aceptar') }}
                                </x-buttons.button-danger-form>
                                
                                <x-buttons.button-secondary type="button"  data-close-button="modal-{{ $categoria->id }}"> {{ __('Cancelar') }} </x-buttons.button-secondary>
                            
                </x-modals.alert-delete>

            @endforeach

        </x-tables.template-table> 
    @endif

</x-template-two-columns>