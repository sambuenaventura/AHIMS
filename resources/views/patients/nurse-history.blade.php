@include('partials.header', ['bgColor' => 'bg-custom-51'])

<div class="container">
    <h1>Nurse History</h1>
    @if($nurseHistories->isEmpty())
        <p>No nurse history found.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Nurse</th>
                    <th>Date & Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach($nurseHistories as $history)
                    <tr>
                        <td>{{ $history->nurse->first_name }} {{ $history->nurse->last_name }}</td>
                        <td>{{ $history->created_at->format('g:i A n/j/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

@include('partials.footer')
