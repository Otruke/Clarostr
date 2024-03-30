@if ($descendant->allDescendants->isNotEmpty())
    <div class="generation-children">
        @foreach ($descendant->allDescendants as $child)
            <div class="generation-node" style="margin-left: {{ $level * 20 }}px;">
                <p>{{ $child->username }}</p>
                @include('referrals.partials.descendants', ['descendant' => $child, 'level' => $level + 1])
            </div>
        @endforeach
    </div>
@endif