@if ($messages->isNotEmpty())
    <script type="text/javascript">
        @foreach ($messages as $key => $message)
            // console.log([
            //     "{{ $message->type }}",
            //     "{{ $message->message }}",
            //     "{{ $message->title }}",
            //     {{ $message->important ? 'true' : 'false' }}
            // ]);
            //
            whisper['{{ $message->type }}']('{{ $message->message }}', '{{ $message->title }}');
        @endforeach
    </script>
@endif
