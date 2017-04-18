@if ($messages->isNotEmpty())
    <script type="text/javascript">
        @foreach ($messages as $key => $message)
            siren['{{ $message->type }}']('{{ $message->message }}', '{{ $message->title }}');
        @endforeach
    </script>
@endif
