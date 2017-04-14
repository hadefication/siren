@if ($messages->isNotEmpty())
    <script type="text/javascript">
        @foreach ($messages as $key => $message)
            console.log([
                "{{ $message->type }}",
                "{{ $message->message }}",
                "{{ $message->title }}",
                {{ $message->important ? 'true' : 'false' }}
            ]);
        @endforeach
    </script>
@endif
