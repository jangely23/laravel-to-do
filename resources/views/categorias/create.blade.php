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