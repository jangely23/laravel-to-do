<form action="{{ route($routeName, $routeParams) }}" method="{{ $methodForm }}" id="myForm-{{$name}}">
    @method($methodController)
    @csrf
    <select name="{{ $name }}" class="form-select border-none w-full" id="{{ $name }}" {{($disabled=='true')?'disabled':''}}>
        {{ $slot }}
    </select>
</form>
    
<script>
    document.getElementById('{{ $name }}').addEventListener('change', function() {
        document.getElementById('myForm-{{$name}}').submit();
    });
</script>

