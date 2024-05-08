<x-template-one-column >

    <x-text.title-buttom :title="'Categorias'">
        <x-buttons.button-primary>
            <a href="{{route('categorias.create')}}" >{{ __('Nueva categoria') }}</a>
        </x-buttons.button-primary>
    </x-text.title-buttom>

    @if ($categorias)
        <div class="md:w-4/5  mx-auto w-full">
            <x-tables.template-table :class="'md:grid-cols-3 md:gap-2'">
            
                @foreach ( $categorias as $categoria )

                    <x-cards.card :colorhex="$categoria->color">
                        <div class="mb-3">  
                            <a class="text-white drop-shadow-md" href="{{ route( 'categorias.show' , ['categoria' => $categoria->id ]) }}">{{ $categoria->name }}</a>  
                        </div>               
                    
                        <div class="w-full flex justify-end">
                            <x-buttons.button-close-circle :dataModalTarget="$categoria->id"> {{ __('X') }} </x-buttons.button-close-circle>            
                        </div>
                    </x-cards.card>
                
                
                    <!-- Modal -->
                    <x-modals.alert-delete :identifier="$categoria->id" :action="'¡Eliminar categoria!'" :message="'Este proceso borrara todas las tareas realacionadas con esta categoria. ¿Desea continuar?'" >
                                    
                                    <x-buttons.button-danger-form :routeName="'categorias.destroy'" :routeParams="$categoria->id" :methodForm="'POST'" :methodController="'DELETE'"> 
                                        {{ __('Aceptar') }}
                                    </x-buttons.button-danger-form>
                                    
                                    <x-buttons.button-secondary type="button"  data-close-button="{{ $categoria->id }}"> {{ __('Cancelar') }} </x-buttons.button-secondary>
                                
                    </x-modals.alert-delete>

                @endforeach
            
            </x-tables.template-table> 
        </div>
    @endif

</x-template-one-column>