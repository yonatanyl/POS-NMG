<div class="input-group d-flex justify-content-center">
    <input wire:model="jmlkg.{{ $cart_item->id }}" style="min-width: 40px;max-width: 90px;" type="number" class="form-control" value="{{ number_format($cart_item->kg) }}" min="1" name="jmlkg">
</div>
