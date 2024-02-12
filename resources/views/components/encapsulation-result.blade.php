<div>
  <div class="row align-items-center">
    <div class="col-3">
      <p class="m-0">🤫 Secret</p>
    </div>
    <div class="col">
      <input type="text" readonly class="form-control-plaintext" value="{{ $encapsulationResult->secret }}">
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-3">
      <p class="m-0">❔ Ciphertext</p>
    </div>
    <div class="col">
      <textarea class="form-control" readonly>{{ $encapsulationResult->ciphertext }}</textarea>
    </div>
  </div>
</div>
