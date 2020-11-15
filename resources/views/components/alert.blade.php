<div class="text-center">
    @if(session()->has('message'))
        <div class="py-4 px-2 bg-green-400">{{session()->get('message')}}</div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger">{{session()->get('error')}}</div>
    @endif
    {{$slot}}

    @if ($errors->any())
        <div class="bg-red-300">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>