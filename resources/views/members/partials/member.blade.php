<li>
    {{ $member->Name }}
    @if (isset($member->children) && count($member->children) > 0)
        <br>
        <ul>
            @foreach ($member->children as $child)
                @include('members.partials.member', ['member' => $child])
            @endforeach
        </ul>
    @endif
</li>
