<div class="contenedor-menu-info ms-2">
    <h1 class="mb-3 mt-4 fw-semibold" style="font-size: 18px;font-weight: 350;">¿El producto tiene oferta?</h1>
    <select class="form-control" wire:model="opcOferta">
        <option value="no">No</option>
        <option value="si">Sí</option>
    </select>

    @if($opcOferta == 'si')
        <div class="mt-4">
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <label class="form-label fw-semibold">Indique el descuento (%)</label>
                    <input type="number" placeholder="" class="form-control" wire:model="descuento" wire:change="calculateValorFinal">
                </div>

                <div class="col-lg-6 mb-3 fw-semibold">
                    <label class="form-label">Valor Total</label>
                    <input type="number" placeholder="" class="form-control" wire:model="valor_final" readonly wire:change="calculateValorFinal">
                </div>
            </div>
        </div>
    @endif
</div>