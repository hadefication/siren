@if (siren()->messages()->any())
    <script type="text/javascript">
        @foreach (siren()->messages()->all() as $key => $message)
            siren['{{ $message->type }}']('{{ $message->message }}', '{{ $message->title }}');
        @endforeach
    </script>
@endif
