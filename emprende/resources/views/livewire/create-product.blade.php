<div class="contenedor-menu-info ms-2">
    <h1 class="mb-3 mt-4 fw-semibold" style="font-size: 18px;font-weight: 350;">¿El producto tiene oferta?</h1>
    <select class="col-lg-6 form-control" id="seleccionSiNo" name="opcOferta">
        <option value="" disabled selected>Seleccione una opción</option>
        <option value="si">Si</option>
        <option value="no">No</option>
    </select>
    <div class="mt-4">
    <div id="camposInformacion" class="">
        <div class="row">
        <div class="col-lg-6 mb-3">
        <label class="form-label fw-semibold">Indique el descuento</label>
        <input type="text" placeholder="" class="form-control" name="descuento" required="">
        </div>
        <div class=" col-lg-6 mb-3 fw-semibold">
            <label class="form-label">Valor Total</label>
            <input type="text" placeholder="" class="form-control" name="valorTotal" required="">
        </div>
        </div>
    </div>
    </div>
</div>

<input type="hidden" name="vendedor_id" value="{{ Auth::user()->id }}">
    <div class="text-center">
        <button type="submit" class="btn btn-success my-4 fw-semibold">Crear Producto</button>
    </div>