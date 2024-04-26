<x-template-one-column>
    <x-forms.view-create :name="'Mis tareas'" :action="'tareas.store'">

        @if (session('success'))
            <x-forms.success-alert id="alert-21"> 
                {{ session('success') }}
            </x-forms.success-alert>
        @endif

        @error('title' || 'category_id' || 'priority_id')
            <x-forms.error-alert id="alert-2" >
                    {{ $message }}
            </x-forms.error-alert>
        @enderror

        <input type="hidden" name="user_id" value="{{ $user->id }}">
        
        <div class="flex md:flex-row flex-col">
            <x-forms.input-field :name="'title'" :type="'text'"> {{ __('Título tarea') }}</x-forms.input-field>
            
            <x-forms.select-field name="category_id" label="Categoria"  required>
                @foreach ($categorias as $categoria )
                <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                @endforeach 
            </x-forms.select-field>
        
            <x-forms.select-field name="priority_id" label="Prioridad"  required>
                @foreach ($prioridades as $prioridad)
                <option value="{{ $prioridad->id }}">{{ $prioridad->name }}</option>
                @endforeach
            </x-forms.select-field>
        </div>
         
        <x-forms.textarea-field :name="'description'"> {{ __('Descripción') }}</x-forms.textarea-field>
    
        <x-buttons.button-primary> {{__('Guardar nueva tarea')}} </x-buttons.button-primary>
        
    </x-forms.view-create>
</x-template-one-column>