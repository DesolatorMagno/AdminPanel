@if (session('message'))
    <div id="message-div" class="alert alert-{{ session('message_type') }}">
        <h3>{{ session('message') }}</h3>
    </div>
    @push('scripts')
    <script>
        function clearMessage() {
            document.getElementById('message-div').setAttribute('hidden', true)
        }
        setTimeout(clearMessage, 4000)
    </script>
    @endpush
@endif
