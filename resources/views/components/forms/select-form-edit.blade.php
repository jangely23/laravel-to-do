@props(['routeName', 'routeParams', 'routeParam2', 'methodForm', 'name', 'methodController', 'disabled'])

<form action="{{ route($routeName, [$routeParams]) }}" method="{{ $methodForm }}" id="myForm-{{$name}}">

    @method($methodController)
    @csrf
    <select name="{{ $name }}" class="form-select bg-transparent border-none w-full" id="{{ $name }}" {{($disabled=='true')?'disabled':''}}>
        {{ $slot }}
    </select>

    @if (isset($routeParam2))
        <input type="hidden" name="categoria_id" value="{{$routeParam2}}">
    @endif
</form>
    
<script>
    document.getElementById('{{ $name }}').addEventListener('change', function() {
        document.getElementById('myForm-{{$name}}').submit();
    });
</script>

