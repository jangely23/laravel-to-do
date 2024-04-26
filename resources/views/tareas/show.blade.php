<x-template-one-column>     
    <x-forms.view-show :title="'Mis tareas'"
    :routeName="'update-todos'"  :routeParams="$tarea->id" :methodForm="'POST'" :methodController="'PATCH'">

        <x-forms.input-field :name="'title'" :type="'text'" :value="$tarea->title"  required>
            {{ __('Título tarea') }}
        </x-forms.input-field>

        <x-forms.select-field name="category_id" id="category_id" label="Categoria"  required>
            @foreach ($categorias as $categoria )
                <option value="{{ $categoria->id }}" {{ ($categoria->id == $tarea->category_id) ? 'selected' : '' }}
                >
                    {{ $categoria->name }}
                </option>
            @endforeach 
        </x-forms.select-field>

        <x-forms.select-field name="priority_id" id="priority_id" label="Prioridad"  required>
            @foreach ($prioridades as $prioridad)
                <option value="{{ $prioridad->id }}" {{ ($prioridad->id == $tarea->priority_id) ? 'selected' : '' }}>
                    {{ $prioridad->name }}
                </option>
            @endforeach
        </x-forms.select-field>
        
        <x-buttons.button-primary >{{ __('Actualizar tarea') }}</x-buttons.button-primary>
            
    </x-forms.view-show>
</x-template-one-column> 

