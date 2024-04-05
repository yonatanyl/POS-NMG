<div class="input-group d-flex justify-content-center">
    <input wire:model="jmlkg.{{ $cart_item->id }}" style="min-width: 40px;max-width: 90px;" type="number" class="form-control" value="{{ $cart_item->options->jmlkg }}" min="1" step="0.01" name="jmlkg">
</div>
