@props(['paginator'])
@if($paginator->hasPages())
    <div class="text-center mt-4">
        {{ $paginator->onEachSide(1)->links() }}
    </div>
@endif